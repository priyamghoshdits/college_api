<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoginResource;
use App\Http\Resources\MemberResource;
use App\Http\Resources\PayrollDeductionResource;
use App\Http\Resources\PayrollEarningResource;
use App\Http\Resources\StudentResource;
use App\Models\AssignSemesterTeacher;
use App\Models\GeneratedPayroll;
use App\Models\Holiday;
use App\Models\Leave;
use App\Models\LeaveType;
use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\PayrollDeduction;
use App\Models\PayrollEarnings;
use App\Models\StaffAttendance;
use App\Models\StudentDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;

class MemberController extends Controller
{
    public function get_all_members(Request $request)
    {
        $member = User::select('*', 'member_details.id as members_id', 'users.id as id')
            ->leftjoin('member_details', 'member_details.user_id', '=', 'users.id')
            ->whereNotIn('user_type_id',[3,1])
            ->where('users.franchise_id',$request->user()->franchise_id)
            ->get();
        return response()->json(['success'=>1,'data'=> $member], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_members_by_user_type_id($user_type_id, $month, $year)
    {
        $members = User::select('*','users.id as id','designations.name as designation_name', 'departments.name as department_name' ,'member_details.id as member_details_id')->whereUserTypeId(2)
            ->join('member_details', 'member_details.user_id', '=', 'users.id')
            ->join('designations', 'designations.id', '=', 'member_details.designation_id')
            ->join('departments', 'departments.id', '=', 'member_details.department_id')
            ->get();
        foreach ($members as $member){
            $member->no_of_days =Carbon::now()->month($month)->daysInMonth;
            $member->total_holidays = Holiday::whereMonth('date',$month)->count();
            $member->generated = (GeneratedPayroll::where('month',$month)->where('year',$year)->whereStaffId($member['id'])->first())? (GeneratedPayroll::where('month',$month)->where('year',$year)->whereStaffId($member['id'])->first())->status: 0;
            $member->total_present = StaffAttendance::whereUserTypeId($user_type_id)->whereUserId($member['id'])->whereMonth('date', $month)->whereAttendance('present')->count();
            $member->total_absent = $member->no_of_days - $member->total_present - $member->total_holidays;
            $member->total_approved_leave = (Leave::select(DB::raw('ifnull(sum(total_days), 0) as total_days'))
                ->whereUserId($member['id'])
                ->whereMonth('created_at',$month)
                ->whereApproved(1)->first())->total_days;
            $member->total_non_approved_leave = (Leave::select(DB::raw('ifnull(sum(total_days), 0) as total_days'))
                ->whereUserId($member['id'])
                ->whereMonth('created_at',$month)
                ->whereApproved(0)->first())->total_days;
            $member->payroll = ($member->generated!=0)?GeneratedPayroll::where('month',$month)->where('year',$year)->whereStaffId($member['id'])->first():null;
            $member->earnings = ($member->generated!=0)? PayrollEarningResource::collection(PayrollEarnings::wherePayrollId($member->payroll->id)->get()): null;
            $member->deductions = ($member->generated!=0)? PayrollDeductionResource::collection(PayrollDeduction::wherePayrollId($member->payroll->id)->get()): null;
        }

        return response()->json(['success'=>1,'data'=> $members], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_teachers(Request $request)
    {
        $member = User::select('*', 'member_details.id as members_id', 'users.id as id')
            ->leftjoin('member_details', 'member_details.id', '=', 'users.id')
            ->where('users.franchise_id',$request->user()->franchise_id)
            ->whereUserTypeId(2)->get();
        return response()->json(['success'=>1,'data'=>MemberResource::collection($member)], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_students(Request $request)
    {
        $member = User::select('*','student_details.id as student_details_id','users.id as id')
            ->leftjoin('student_details', 'users.id', '=', 'student_details.student_id')
            ->whereUserTypeId(3)
            ->where('users.franchise_id',$request->user()->franchise_id)
            ->get();

        return response()->json(['success'=>1,'data'=> StudentResource::collection($member)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function change_student_status($id){
        $data = User::find($id);
        $data->status = ($data->status==1)?0:1;
        $data->update();

        $member = User::select('*','student_details.id as student_details_id','users.id as id')
            ->leftjoin('student_details', 'users.id', '=', 'student_details.student_id')
            ->where('users.id',$data->id)
            ->first();

        return response()->json(['success'=>1,'data'=>new StudentResource($member)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_teacher_by_course_and_semester($course_id, $semester_id){
        $data = DB::select("SELECT teacher_id,users.first_name,users.middle_name,users.last_name FROM `assign_semester_teachers`
            inner join users on assign_semester_teachers.teacher_id = users.id
            where course_id = ? and semester_id = ?",[$course_id,$semester_id]);
        return response()->json(['success'=>1,'data'=> $data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function check_id($id){
        $data = User::whereIdentificationNo($id)->first();
        if($data){
            return response()->json(['success'=>0], 200,[],JSON_NUMERIC_CHECK);
        }
        return response()->json(['success'=>1], 200,[],JSON_NUMERIC_CHECK);
    }

    public function mail_communication(Request $request)
    {
        $data = (object)$request->json()->all();
        $subject = $data->subject;
        $message = $data->message;
        foreach ($data->user_type as $userType){
            $users = User::whereUserTypeId($userType['id'])->get();
            foreach($users as $user){
                $data = array('body'=>$message);
                $email_id = $user['email'];
                Mail::send('welcome',$data , function ($message) use($email_id, $subject) {
                    $message->from('priyamghosh.dits@gmail.com');
                    $message->to($email_id);
                    $message->subject($subject);
                });

            }
        }

        return response()->json(['success'=>1,'data'=> $data], 200,[],JSON_NUMERIC_CHECK);

    }

    public function delete_member($id)
    {
        $user = User::find($id);
        if($user->user_type_id == 3){
            $details = StudentDetail::whereStudentId($user->id)->first();
            if($details){
                $details->delete();
            }
            $user->delete();
            return response()->json(['success'=>1,'data'=>new StudentResource($user)], 200,[],JSON_NUMERIC_CHECK);
        }
        $user->delete();
        return response()->json(['success'=>1,'data'=>new MemberResource($user)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function member_status($id){
        $user = User::find($id);
        $user->status = $user->status == 1 ? 0 : 1;
        $user->update();
        return response()->json(['success'=>1,'data'=>new MemberResource($user)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function upload_file(Request $request)
    {
        if($request->p_image != 'null'){
            $user = User::find($request->p_image);
            if($user != null){
                if (file_exists(public_path().'/user_image/'.$user->image)) {
                    File::delete(public_path().'/user_image/'.$user->image);
                }
            }
            if ($files = $request->file('image')) {
                // Define upload path
                $destinationPath = public_path('/user_image/'); // upload path
                // Upload Orginal Image
                $profileImage1 = $files->getClientOriginalName();
                $files->move($destinationPath, $profileImage1);
                $user->image = $files->getClientOriginalName();
                $user->update();
            }
            return response()->json(['success'=>1,'data'=>$user], 200,[],JSON_NUMERIC_CHECK);
        }
        if ($files = $request->file('image')) {
            // Define upload path
            $destinationPath = public_path('/user_image/'); // upload path
            // Upload Orginal Image
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
        }else{
            return response()->json(['success'=>1,'data'=>0], 200,[],JSON_NUMERIC_CHECK);
        }
        return 1;
    }

    public function promote_students(Request $request){
        $data = $request->json()->all();
        foreach ($data as $list){
            $students = StudentDetail::whereStudentId($list['id'])->first();
            $students->current_semester_id = $list['promote_semester_id'];
            $students->session_id = $list['promote_session_id'];
            $students->update();
        }
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function upload_profile_picture(Request $request){

        $user = User::find($request['user_id']);
//        return response()->json(['success'=>$request['id']], 200,[],JSON_NUMERIC_CHECK);
        if (file_exists(public_path() . '/user_image/' . $user->image)) {
            File::delete(public_path() . '/user_image/' . $user->image);
        }
        $user->image = $request['file_name'];
        $user->update();

        if ($files = $request->file('file')) {
            // Define upload path
            $destinationPath = public_path('/user_image/'); // upload path
            // Upload Orginal Image
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
        }
        $user->token = request()->bearerToken();
        return response()->json(['success'=>1, 'data' => new LoginResource($user)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function testUser(){
        $month = 02;
        $user_type_id = 02;
        $members = User::select('*','users.id as id', 'member_details.id as member_details_id')->whereUserTypeId(2)
            ->join('member_details', 'member_details.user_id', '=', 'users.id')
            ->get();
        foreach ($members as $member){
            $member->no_of_days =Carbon::now()->month($month)->daysInMonth;
            $member->no_of_days_present = StaffAttendance::whereUserTypeId($user_type_id)->whereUserId($member['id'])->whereMonth('date', $month)->whereAttendance('present')->count();
            $member->no_of_days_absent = StaffAttendance::whereUserTypeId($user_type_id)->whereUserId($member['id'])->whereMonth('date', $month)->whereAttendance('absent')->count();;
            $member->leaves = LeaveType::get();
            foreach ($member->leaves as $leaves){
                $leaves->total_approved_leave = (Leave::select(DB::raw('ifnull(sum(total_days), 0) as total_days'))
                    ->whereUserId($member['id'])
                    ->whereLeaveTypeId($leaves['id'])
                    ->whereApproved(1)->first())->total_days;
                $leaves->total_non_approved_leave =  (Leave::select(DB::raw('ifnull(sum(total_days), 0) as total_days'))
                    ->whereUserId($member['id'])
                    ->whereLeaveTypeId($leaves['id'])
                    ->whereApproved(0)->first())->total_days;
            }
        }

        return response()->json(['success'=>1, 'data' => $members], 200,[],JSON_NUMERIC_CHECK);
    }
}
