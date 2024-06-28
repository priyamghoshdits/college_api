<?php

namespace App\Http\Controllers;

use App\Http\Resources\AchivementResource;
use App\Http\Resources\BookPublicationResource;
use App\Http\Resources\JournalPublicationResource;
use App\Http\Resources\LoginResource;
use App\Http\Resources\ManualFeesResource;
use App\Http\Resources\ManualScholarshipResource;
use App\Http\Resources\MemberResource;
use App\Http\Resources\PayrollDeductionResource;
use App\Http\Resources\PayrollEarningResource;
use App\Http\Resources\PayslipUploadResource;
use App\Http\Resources\PlacementResource;
use App\Http\Resources\StaffEducationResource;
use App\Http\Resources\StaffExperienceResource;
use App\Http\Resources\StudentResource;
use App\Models\Achivement;
use App\Models\AssignSemesterTeacher;
use App\Models\BookPublication;
use App\Models\CautionMoney;
use App\Models\EducationQualification;
use App\Models\GeneratedPayroll;
use App\Models\Holiday;
use App\Models\JournalPublication;
use App\Models\Leave;
use App\Models\LeaveType;
use App\Models\ManualFees;
use App\Models\ManualScholarship;
use App\Models\PayrollDeduction;
use App\Models\PayrollEarnings;
use App\Models\PayslipUpload;
use App\Models\PlacementDetails;
use App\Models\StaffAttendance;
use App\Models\StaffEducation;
use App\Models\StaffExperience;
use App\Models\StudentDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class MemberController extends Controller
{
    public function get_all_members(Request $request)
    {
        $member = User::select('*', 'member_details.id as members_id', 'users.id as id')
            ->leftjoin('member_details', 'member_details.user_id', '=', 'users.id')
            ->whereNotIn('user_type_id', [3, 1])
            ->where('users.franchise_id', $request->user()->franchise_id)
            ->get();

        return response()->json(['success' => 1, 'data' => MemberResource::collection($member)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function get_staff_for_payslips($course_id, $month)
    {
        $teacher_id_payslip = [];
        $teacher_id = [];
        $assignSemesterTeacher = AssignSemesterTeacher::whereCourseId($course_id)->get();
        foreach ($assignSemesterTeacher as $temp) {
            $teacher_id[] = $temp['teacher_id'];
        }
        $payslip = PayslipUpload::whereIn('id',$teacher_id)->where('month', $month)->get();
        foreach ($payslip as $temp) {
            $teacher_id_payslip[] = $temp['staff_id'];
        }
        $user = User::select(DB::raw('id as staff_id, null as month, null as file_name'))->whereIn('id', $teacher_id)->get();
        $user1 = collect($user)->whereNotIn('staff_id', $teacher_id_payslip);

        $return_data = $user1->merge($payslip);

        return response()->json(['success' => $payslip, 'data' => PayslipUploadResource::collection($return_data)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function upload_payslip(Request $request)
    {
        $payslip = PayslipUpload::whereStaffId($request['staff_id'])->where('month', $request['month'])->first();
        if ($payslip) {
            if ($files = $request->file('file')) {
                if (file_exists(public_path() . '/manual_payslips/' . $payslip->file_name)) {
                    File::delete(public_path() . '/manual_payslips/' . $payslip->file_name);
                }
                $payslip->file_name = $files->getClientOriginalName();
                $payslip->update();
            }
        } else {
            if ($files = $request->file('file')) {
                // Define upload path
                $destinationPath = public_path('/manual_payslips/'); // upload path
                // Upload Orginal Image
                $fileName = $files->getClientOriginalName();
                $files->move($destinationPath, $fileName);

                $payslip = new PayslipUpload();
                $payslip->staff_id = $request['staff_id'];
                $payslip->month = $request['month'];
                $payslip->file_name = $fileName;
                $payslip->save();
            }
        }
        return response()->json(['success' => 1, 'data' => $payslip], 200, [], JSON_NUMERIC_CHECK);
    }

    public function get_member_full_details($id){
        $member_details = new MemberResource(User::leftjoin('member_details', 'member_details.user_id', '=', 'users.id')
            ->where('users.id',$id)
            ->first());

        $educational_qualification = StaffEducationResource::collection(StaffEducation::whereStaffId($id)->get());

        $staff_experience = StaffExperienceResource::collection(StaffExperience::whereStaffId($id)->get());

        $journal_publication = JournalPublicationResource::collection(JournalPublication::whereStaffId($id)->get());

        $book_publication = BookPublicationResource::collection(BookPublication::whereStaffId($id)->get());

        return response()->json([
            'success' => 1,
            'member_data' => $member_details,
            'educational_qualification' => $educational_qualification,
            'staff_experience' => $staff_experience,
            'journal_publication' => $journal_publication,
            'book_publication' => $book_publication,
        ], 200, [], JSON_NUMERIC_CHECK);
    }

    public function get_student_full_details($id)
    {
        $student_details = new StudentResource(User::leftjoin('student_details', 'student_details.student_id', '=', 'users.id')
            ->leftjoin('registrations', 'registrations.student_id', '=', 'users.id')
            ->where('users.id',$id)
            ->first());
        $education_details = EducationQualification::whereStudentId($id)->first();
        $achievement = AchivementResource::collection(Achivement::whereStudentId($id)->get());
        $placement = PlacementResource::collection(PlacementDetails::whereUserId($id)->get());
        $feesDetails = ManualFeesResource::collection(ManualFees::whereStudentId($id)->get());
        $scholarship = ManualScholarshipResource::collection(ManualScholarship::whereStudentId($id)->get());

        return response()->json([
            'success' => 1,
            'student_data' => $student_details,
            'achievement' => $achievement,
            'placement' => $placement,
            'education_qualification' => $education_details,
            'fees_details' => $feesDetails,
            'scholarship' => $scholarship
        ], 200, [], JSON_NUMERIC_CHECK);
    }

    public function get_members_by_user_type_id($user_type_id, $month, $year)
    {
        $members = User::select('*', 'users.id as id', 'designations.name as designation_name', 'departments.name as department_name', 'member_details.id as member_details_id')->whereUserTypeId(2)
            ->join('member_details', 'member_details.user_id', '=', 'users.id')
            ->join('designations', 'designations.id', '=', 'member_details.designation_id')
            ->join('departments', 'departments.id', '=', 'member_details.department_id')
            ->get();
        foreach ($members as $member) {
            $member->no_of_days = Carbon::now()->month($month)->daysInMonth;
            $member->total_holidays = Holiday::whereMonth('date', $month)->count();
            $member->generated = (GeneratedPayroll::where('month', $month)->where('year', $year)->whereStaffId($member['id'])->first()) ? (GeneratedPayroll::where('month', $month)->where('year', $year)->whereStaffId($member['id'])->first())->status : 0;
            $member->total_present = StaffAttendance::whereUserTypeId($user_type_id)->whereUserId($member['id'])->whereMonth('date', $month)->whereAttendance('present')->count();
            $member->total_absent = $member->no_of_days - $member->total_present - $member->total_holidays;
            $member->total_approved_leave = (Leave::select(DB::raw('ifnull(sum(total_days), 0) as total_days'))
                ->whereUserId($member['id'])
                ->whereMonth('created_at', $month)
                ->whereApproved(1)->first())->total_days;
            $member->total_non_approved_leave = (Leave::select(DB::raw('ifnull(sum(total_days), 0) as total_days'))
                ->whereUserId($member['id'])
                ->whereMonth('created_at', $month)
                ->whereApproved(0)->first())->total_days;
            $member->payroll = ($member->generated != 0) ? GeneratedPayroll::where('month', $month)->where('year', $year)->whereStaffId($member['id'])->first() : null;
            $member->earnings = ($member->generated != 0) ? PayrollEarningResource::collection(PayrollEarnings::wherePayrollId($member->payroll->id)->get()) : null;
            $member->deductions = ($member->generated != 0) ? PayrollDeductionResource::collection(PayrollDeduction::wherePayrollId($member->payroll->id)->get()) : null;
        }

        return response()->json(['success' => 1, 'data' => $members], 200, [], JSON_NUMERIC_CHECK);
    }

    public function get_teachers(Request $request)
    {
        $member = User::select('*', 'member_details.id as members_id', 'users.id as id')
            ->leftjoin('member_details', 'member_details.id', '=', 'users.id')
            ->where('users.franchise_id', $request->user()->franchise_id)
            ->whereUserTypeId(2)->get();
        return response()->json(['success' => 1, 'data' => MemberResource::collection($member)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function get_students(Request $request)
    {
        $member = User::select('*', 'student_details.id as student_details_id', 'users.id as id')
            ->leftjoin('student_details', 'users.id', '=', 'student_details.student_id')
            ->leftjoin('pre_admission_payments', 'pre_admission_payments.id', '=', 'student_details.pre_admission_payment_id')
            ->leftjoin('caution_money', 'caution_money.user_id', '=', 'users.id')
            ->whereUserTypeId(3)
            ->where('users.franchise_id', $request->user()->franchise_id)
            ->get();

        return response()->json(['success' => 1, 'data' => StudentResource::collection($member)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function get_students_for_caution_money(Request $request)
    {
        $data = (object)$request->json()->all();
        $member = User::select('*', 'student_details.id as student_details_id', 'users.id as id')
            ->leftjoin('student_details', 'users.id', '=', 'student_details.student_id')
            ->leftjoin('pre_admission_payments', 'pre_admission_payments.id', '=', 'student_details.pre_admission_payment_id')
            ->leftjoin('caution_money', 'caution_money.user_id', '=', 'users.id')
            ->whereCourseId($data->course_id)
            ->whereSemesterId($data->semester_id)
            ->whereSessionId($data->session_id)
            ->whereUserTypeId(3)
            ->where('users.franchise_id', $request->user()->franchise_id)
            ->get();

        return response()->json(['success' => 1, 'data' => StudentResource::collection($member)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function refund_caution_money(Request $request)
    {
        $data = (object)$request->json()->all();
        $cautionMoney = CautionMoney::whereUserId($data->user_id)->first();
        $cautionMoney->caution_money_deduction = $data->caution_money_deduction;
        $cautionMoney->refund_payment_date = $data->refund_payment_date;
        $cautionMoney->refund_mode_of_payment = $data->refund_mode_of_payment;
        $cautionMoney->refund_transaction_id = $data->refund_transaction_id;
        $cautionMoney->refunded_amount = ($cautionMoney->caution_money - $data->caution_money_deduction);
        $cautionMoney->caution_money_refund = 1;
        $cautionMoney->update();
        return response()->json(['success' => 1], 200, [], JSON_NUMERIC_CHECK);
    }

    public function revert_caution_money($user_id)
    {
        $cautionMoney = CautionMoney::whereUserId($user_id)->first();
        $cautionMoney->caution_money_deduction = null;
        $cautionMoney->refund_payment_date = null;
        $cautionMoney->refund_mode_of_payment = null;
        $cautionMoney->refund_transaction_id = null;
        $cautionMoney->refunded_amount = 0;
        $cautionMoney->caution_money_refund = 0;
        $cautionMoney->update();
        return response()->json(['success' => 1], 200, [], JSON_NUMERIC_CHECK);
    }

    public function get_students_by_session(Request $request)
    {
        $data = (object)$request->json()->all();
        $member = User::select('*', 'student_details.id as student_details_id', 'users.id as id')
            ->leftjoin('student_details', 'users.id', '=', 'student_details.student_id')
            ->leftjoin('pre_admission_payments', 'pre_admission_payments.id', '=', 'student_details.pre_admission_payment_id')
            ->leftjoin('caution_money', 'caution_money.user_id', '=', 'users.id')
            ->whereUserTypeId(3)
            ->whereCourseId($data->course_id)
            ->whereCurrentSemesterId($data->semester_id)
            ->whereSessionId($data->session_id)
            ->where('users.franchise_id', $request->user()->franchise_id)
            ->get();

        return response()->json(['success' => 1, 'data' => StudentResource::collection($member)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function change_student_status($id)
    {
        $data = User::find($id);
        $data->status = ($data->status == 1) ? 0 : 1;
        $data->update();

        $member = User::select('*', 'student_details.id as student_details_id', 'users.id as id')
            ->leftjoin('student_details', 'users.id', '=', 'student_details.student_id')
            ->leftjoin('pre_admission_payments', 'pre_admission_payments.id', '=', 'student_details.pre_admission_payment_id')
            ->leftjoin('caution_money', 'caution_money.user_id', '=', 'users.id')
            ->where('users.id', $data->id)
            ->first();

        return response()->json(['success' => 1, 'data' => new StudentResource($member)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function get_teacher_by_course_and_semester($course_id, $semester_id)
    {
        $data = DB::select("SELECT teacher_id,users.first_name,users.middle_name,users.last_name FROM `assign_semester_teachers`
            inner join users on assign_semester_teachers.teacher_id = users.id
            where course_id = ? and semester_id = ?", [$course_id, $semester_id]);
        return response()->json(['success' => 1, 'data' => $data], 200, [], JSON_NUMERIC_CHECK);
    }

    public function check_id($id)
    {
        $data = User::whereIdentificationNo($id)->first();
        if ($data) {
            return response()->json(['success' => 0], 200, [], JSON_NUMERIC_CHECK);
        }
        return response()->json(['success' => 1], 200, [], JSON_NUMERIC_CHECK);
    }

    public function mail_communication(Request $request)
    {
        $data = (object)$request->json()->all();
        $subject = $data->subject;
        $message = $data->message;
        foreach ($data->user_type as $userType) {
            $users = User::whereUserTypeId($userType['id'])->get();
            foreach ($users as $user) {
                $data = array('body' => $message);
                $email_id = $user['email'];
                Mail::send('welcome', $data, function ($message) use ($email_id, $subject) {
                    $message->from('priyamghosh.dits@gmail.com');
                    $message->to($email_id);
                    $message->subject($subject);
                });

            }
        }

        return response()->json(['success' => 1, 'data' => $data], 200, [], JSON_NUMERIC_CHECK);

    }

    public function delete_member($id)
    {
        $user = User::find($id);
        if ($user->user_type_id == 3) {
            $details = StudentDetail::whereStudentId($user->id)->first();
            if ($details) {
                $details->delete();
            }
            $user->delete();
            return response()->json(['success' => 1, 'data' => new StudentResource($user)], 200, [], JSON_NUMERIC_CHECK);
        }
        $user->delete();
        return response()->json(['success' => 1, 'data' => new MemberResource($user)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function member_status($id)
    {
        $user = User::find($id);
        $user->status = $user->status == 1 ? 0 : 1;
        $user->update();
        return response()->json(['success' => 1, 'data' => new MemberResource($user)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function upload_file(Request $request)
    {
        if ($request->p_image != 'null') {
            $user = User::find($request->p_image);
            if ($user != null) {
                if (file_exists(public_path() . '/user_image/' . $user->image)) {
                    File::delete(public_path() . '/user_image/' . $user->image);
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
            return response()->json(['success' => 1, 'data' => $user], 200, [], JSON_NUMERIC_CHECK);
        }
        if ($files = $request->file('image')) {
            // Define upload path
            $destinationPath = public_path('/user_image/'); // upload path
            // Upload Orginal Image
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
        } else {
            return response()->json(['success' => 1, 'data' => 0], 200, [], JSON_NUMERIC_CHECK);
        }
        return 1;
    }

    public function promote_students(Request $request)
    {
        $data = $request->json()->all();
        foreach ($data as $list) {
            $students = StudentDetail::whereStudentId($list['id'])->first();
            $students->current_semester_id = $list['promote_semester_id'];
            $students->session_id = $list['promote_session_id'];
            $students->update();
        }
        return response()->json(['success' => 1, 'data' => $data], 200, [], JSON_NUMERIC_CHECK);
    }

    public function upload_profile_picture(Request $request)
    {

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
        return response()->json(['success' => 1, 'data' => new LoginResource($user)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function testFile()
    {
        // Path to the public directory or any other directory you want to explore
        $path = public_path('/aadhaar_card_proof/New folder');

        // Get all files and directories
        $allFiles = File::allFiles($path);
        $directories = File::directories($path);

        // Prepare an array to hold the result
        $result = [
            'directories' => [],
            'files' => []
        ];

        // Process directories
        foreach ($directories as $directory) {
            $result['directories'][] = basename($directory);
        }

        // Process files
        foreach ($allFiles as $file) {
            $result['files'][] = $file->getFilename();
        }

        // Return the list of files and directories (for demonstration purposes, we're just returning a JSON response)
        return response()->json($result);

//        $directories = File::directories(public_path('/aadhaar_card_proof'));
//
//        // Prepare directory names
//        $directoryNames = array_map(function($dir) {
//            return basename($dir);
//        }, $directories);
//
//        // Return the list of directories (for demonstration purposes, we're just returning a JSON response)
//        return response()->json($directoryNames);
    }

    public function testUser()
    {
        $month = 02;
        $user_type_id = 02;
        $members = User::select('*', 'users.id as id', 'member_details.id as member_details_id')->whereUserTypeId(2)
            ->join('member_details', 'member_details.user_id', '=', 'users.id')
            ->get();
        foreach ($members as $member) {
            $member->no_of_days = Carbon::now()->month($month)->daysInMonth;
            $member->no_of_days_present = StaffAttendance::whereUserTypeId($user_type_id)->whereUserId($member['id'])->whereMonth('date', $month)->whereAttendance('present')->count();
            $member->no_of_days_absent = StaffAttendance::whereUserTypeId($user_type_id)->whereUserId($member['id'])->whereMonth('date', $month)->whereAttendance('absent')->count();;
            $member->leaves = LeaveType::get();
            foreach ($member->leaves as $leaves) {
                $leaves->total_approved_leave = (Leave::select(DB::raw('ifnull(sum(total_days), 0) as total_days'))
                    ->whereUserId($member['id'])
                    ->whereLeaveTypeId($leaves['id'])
                    ->whereApproved(1)->first())->total_days;
                $leaves->total_non_approved_leave = (Leave::select(DB::raw('ifnull(sum(total_days), 0) as total_days'))
                    ->whereUserId($member['id'])
                    ->whereLeaveTypeId($leaves['id'])
                    ->whereApproved(0)->first())->total_days;
            }
        }

        return response()->json(['success' => 1, 'data' => $members], 200, [], JSON_NUMERIC_CHECK);
    }

    public function test_migration()
    {
        Artisan::call('migrate:refresh --seed');
    }
}
