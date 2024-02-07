<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoginResource;
use App\Http\Resources\MemberResource;
use App\Http\Resources\StudentResource;
use App\Models\Member;
use App\Models\MemberDetails;
use App\Models\StudentDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravel\Sanctum\PersonalAccessToken;

class UserController extends Controller
{

    public function login(Request $request){
        $requestData = (object)$request->json()->all();
        $user= User::whereEmail($requestData->email)->whereStatus(1)->first();
        if (!$user || !Hash::check($requestData->password, $user->password)) {
            return response()->json(['success'=>0,'data'=>null, 'message'=>'Wrong credential or user disabled'], 200,[],JSON_NUMERIC_CHECK);
        }
        $token = $user->createToken('my-app-token')->plainTextToken;
        $user->token = $token;
        return response()->json(['success'=>1,'data'=>new LoginResource($user), $token => $token], 200,[],JSON_NUMERIC_CHECK);
    }

    public function create_user(Request $request){
        $requestData = (object)$request->json()->all();
        $user = new User();
        $user->first_name = $requestData->first_name;
        $user->last_name =$requestData->last_name;
        $user->gender =$requestData->gender;
        $user->franchise_id = $requestData->franchise_id;
        $user->category_id = 5;
        $user->dob =$requestData->dob;
        $user->user_type_id = 1;
        $user->email =$requestData->email;
        $user->password =$requestData->password;
        $user->save();

        return response()->json(['success'=>1,'data'=>$user], 200,[],JSON_NUMERIC_CHECK);
    }

    public function reset_password(Request $request){
        $requestData = (object)$request->json()->all();
        $user_id = $request->user()->id;
        $user = User::find($user_id);
        $user->password = $requestData->new_password;
        $user->update();
        return response()->json(['success'=>1,'data'=>$user], 200,[],JSON_NUMERIC_CHECK);
    }

    public function forgot_password($email_id){
        $pass = rand(100000,999999);

        $data = User::whereEmail($email_id)->first();
        $data->password = $pass;
        $data->update();

        dispatch(function () use($data,$pass,$email_id){
            Mail::send('forgot_password',array('name'=>$data->first_name." ".$data->middle_name." ".$data->last_name
            , 'password' => $pass) , function ($message) use($email_id) {
                $message->from('rudkarsh@rgoi.in');
                $message->to($email_id);
                $message->subject('Forgot Passowrd');
            });
        })->afterResponse();
        return response()->json(['success'=>$pass,'data'=>"Please check your mail"], 200,[],JSON_NUMERIC_CHECK);
    }

    public function logout(Request $request){
        return response()->json(['success'=>1,'data'=>$request->user()->currentAccessToken()->delete()], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_personal_access_token(){
        return PersonalAccessToken::where('last_used_at', '<=', Carbon::now()->subDays(1))->delete();
    }

    public function test_api(Request $request){
        return response()->json(['success'=>1,'data'=>$request->user()->franchise_id], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_student(Request $request)
    {
        $data = (object)$request->json()->all();

        DB::beginTransaction();
        try {

            $pass = rand(100000,999999);

            $user = new User();
            $user->identification_no = $data->identification_no ;
            $user->first_name = $data->first_name ;
            $user->middle_name = $data->middle_name ?? null ;
            $user->last_name = $data->last_name ;
            $user->gender = $data->gender ;
            $user->dob = $data->dob ;
            $user->category_id  = $data->category_id  ;
            $user->religion = $data->religion ;
            $user->mobile_no = $data->mobile_no ;
            $user->image = $data->image ?? null ;
            $user->blood_group = $data->blood_group ;
            $user->user_type_id  = 3 ;
            $user->franchise_id  = $request->user()->franchise_id ;
            $user->email  = $data->email ;
            $user->password =  $pass;
            $user->status = 1 ;
            $user->save();

            $email_id = $data->email;

            $student_details = new StudentDetail();
            $student_details->student_id  = $user->id ;
            $student_details->course_id  = $data->course_id ;
            $student_details->semester_id  = $data->semester_id ;
            $student_details->agent_id  = $data->agent_id ;
            $student_details->current_semester_id  = $data->semester_id ;
            $student_details->session_id = $data->session_id ;
            $student_details->admission_date = $data->admission_date ;
            $student_details->father_name = $data->father_name ;
            $student_details->father_occupation = $data->father_occupation ;
            $student_details->father_phone = $data->father_phone ;
            $student_details->mother_name = $data->mother_name ;
            $student_details->mother_occupation = $data->mother_occupation ;
            $student_details->material_status = $data->material_status ;
            $student_details->guardian_name = $data->guardian_name ;
            $student_details->guardian_phone = $data->guardian_phone ;
            $student_details->guardian_email = $data->guardian_email ;
//        $student_details->admission_status = $data->admission_status ;
            $student_details->admission_status = 1 ;
            $student_details->emergency_phone_number = $data->emergency_phone_number ;
            $student_details->current_address = $data->current_address ;
            $student_details->permanent_address = $data->permanent_address ;
            $student_details->mother_phone = $data->mother_phone ;
            $student_details->guardian_relation = $data->guardian_relation ;
            $student_details->guardian_address = $data->guardian_address ;
            $student_details->guardian_occupation = $data->guardian_occupation ;
            $student_details->save();

            DB::commit();

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 200);
        }

        $member = User::select('*', 'users.id as id')
            ->leftjoin('student_details', 'users.id', '=', 'student_details.student_id')
            ->whereUserTypeId(3)
            ->where('users.id',$user->id)
            ->first();

        dispatch(function () use($data,$pass,$email_id){
            Mail::send('welcome_password',array('name'=>$data->first_name." ".$data->middle_name." ".$data->last_name
            , 'password' => $pass) , function ($message) use($email_id) {
                $message->from('rudkarsh@rgoi.in');
                $message->to($email_id);
                $message->subject('Test mail');
            });
        })->afterResponse();

        return response()->json(['success'=>1,'data'=>new StudentResource($member)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_student(Request $request)
    {
        $data = (object)$request->json()->all();

        $user = User::find($data->id);
        $user->identification_no = $data->identification_no ;
        $user->first_name = $data->first_name ;
        $user->middle_name = $data->middle_name ?? null ;
        $user->last_name = $data->last_name ;
        $user->gender = $data->gender ;
        $user->dob = $data->dob ;
        $user->category_id  = $data->category_id  ;
        $user->religion = $data->religion ;
        $user->mobile_no = $data->mobile_no ;
        $user->image = $data->image ?? null ;
        $user->blood_group = $data->blood_group ;
        $user->user_type_id  = 3 ;
        $user->franchise_id  = $request->user()->franchise_id ;
        $user->email  = $data->email ;
        $user->password = $data->password ;
        $user->status = 1 ;
        $user->update();

        $student_details = StudentDetail::whereStudentId($data->id)->first();
        if($student_details){
            $student_details->student_id  = $user->id ;
            $student_details->course_id  = $data->course_id ;
            $student_details->semester_id  = $data->semester_id ;
            $student_details->current_semester_id  = $data->semester_id ;
            $student_details->agent_id  = $data->agent_id ;
            $student_details->session_id = $data->session_id ;
            $student_details->admission_date = $data->admission_date ;
            $student_details->father_name = $data->father_name ;
            $student_details->father_occupation = $data->father_occupation ;
            $student_details->father_phone = $data->father_phone ;
            $student_details->mother_name = $data->mother_name ;
            $student_details->mother_occupation = $data->mother_occupation ;
            $student_details->material_status = $data->material_status ;
            $student_details->guardian_name = $data->guardian_name ;
            $student_details->guardian_phone = $data->guardian_phone ;
            $student_details->guardian_email = $data->guardian_email ;
            $student_details->admission_status = 1 ;
            $student_details->emergency_phone_number = $data->emergency_phone_number ;
            $student_details->current_address = $data->current_address ;
            $student_details->permanent_address = $data->permanent_address ;
            $student_details->mother_phone = $data->mother_phone ;
            $student_details->guardian_relation = $data->guardian_relation ;
            $student_details->guardian_address = $data->guardian_address ;
            $student_details->guardian_occupation = $data->guardian_occupation ;
            $student_details->update();
        }else{
            $student_details = new StudentDetail();
            $student_details->student_id  = $user->id ;
            $student_details->course_id  = $data->course_id ;
            $student_details->semester_id  = $data->semester_id ;
            $student_details->agent_id  = $data->agent_id ;
            $student_details->current_semester_id  = $data->semester_id ;
            $student_details->session_id = $data->session_id ;
            $student_details->admission_date = $data->admission_date ;
            $student_details->father_name = $data->father_name ;
            $student_details->father_occupation = $data->father_occupation ;
            $student_details->father_phone = $data->father_phone ;
            $student_details->mother_name = $data->mother_name ;
            $student_details->mother_occupation = $data->mother_occupation ;
            $student_details->material_status = $data->material_status ;
            $student_details->guardian_name = $data->guardian_name ;
            $student_details->guardian_phone = $data->guardian_phone ;
            $student_details->guardian_email = $data->guardian_email ;
            $student_details->admission_status = 1 ;
            $student_details->emergency_phone_number = $data->emergency_phone_number ;
            $student_details->current_address = $data->current_address ;
            $student_details->permanent_address = $data->permanent_address ;
            $student_details->mother_phone = $data->mother_phone ;
            $student_details->guardian_relation = $data->guardian_relation ;
            $student_details->guardian_address = $data->guardian_address ;
            $student_details->guardian_occupation = $data->guardian_occupation ;
            $student_details->save();
        }


        $member = User::select('*', 'users.id as id')
            ->leftjoin('student_details', 'users.id', '=', 'student_details.student_id')
            ->whereUserTypeId(3)
            ->where('users.id',$user->id)
            ->first();

        return response()->json(['success'=>1,'data'=>new StudentResource($member)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_member(Request $request){
        $data = (object)$request->json()->all();
        $user = new User();
        $user->identification_no = $data->identification_no ;
        $user->first_name = $data->first_name ;
        $user->middle_name = $data->middle_name ?? null ;
        $user->last_name = $data->last_name ;
        $user->gender = $data->gender ;
        $user->dob = $data->dob ;
        $user->category_id  = $data->category_id  ;
        $user->religion = $data->religion ;
        $user->mobile_no = $data->mobile_no ;
        $user->image = $data->image ?? null ;
        $user->blood_group = $data->blood_group ;
        $user->user_type_id  = $data->user_type_id ;
        $user->franchise_id  = $request->user()->franchise_id ;
        $user->email  = $data->email ;
        $user->password = $data->password ;
        $user->status = 1 ;
        $user->save();

        $member_details = new MemberDetails();
        $member_details->user_id = $user->id;
        $member_details->date_of_joining = $data->date_of_joining;
        $member_details->department_id = $data->department_id;
        $member_details->designation_id = $data->designation_id;
        $member_details->epf_number = $data->epf_number;
        $member_details->basic_salary = $data->basic_salary;
        $member_details->emergency_phone_number = $data->emergency_phone_number;
        $member_details->location = $data->location;
        $member_details->contract_type = $data->contract_type;
        $member_details->bank_account_number = $data->bank_account_number;
        $member_details->bank_name = $data->bank_name;
        $member_details->ifsc_code = $data->ifsc_code;
        $member_details->bank_branch_name = $data->bank_branch_name;
        $member_details->material_status = $data->material_status;
        $member_details->work_experience = $data->work_experience;
        $member_details->qualification = $data->qualification;
        $member_details->current_address = $data->current_address;
        $member_details->permanent_address = $data->permanent_address;
        $member_details->save();

        return response()->json(['success'=>1,'data'=> new MemberResource($user)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_member(Request $request){
        $data = (object)$request->json()->all();
        $user = User::find($data->id);
        $user->identification_no = $data->identification_no ;
        $user->first_name = $data->first_name ;
        $user->middle_name = $data->middle_name ?? null ;
        $user->last_name = $data->last_name ;
        $user->gender = $data->gender ;
        $user->dob = $data->dob ;
        $user->category_id  = $data->category_id  ;
        $user->religion = $data->religion ;
        $user->mobile_no = $data->mobile_no ;
        $user->image = $data->image ?? null ;
        $user->blood_group = $data->blood_group ;
        $user->user_type_id  = $data->user_type_id ;
        $user->franchise_id  = $request->user()->franchise_id ;
        $user->email  = $data->email;
        $user->password = $data->password ?? $data->password;
        $user->status = $data->status ?? 1 ;
        $user->update();

        $member_details = MemberDetails::whereUserId($data->id)->first();
        if($member_details){
            $member_details->date_of_joining = $data->date_of_joining ?? $member_details->date_of_joining;
            $member_details->department_id = $data->department_id ?? $member_details->department_id;
            $member_details->designation_id = $data->designation_id ?? $member_details->designation_id;
            $member_details->epf_number = $data->epf_number ?? $member_details->epf_number;
            $member_details->basic_salary = $data->basic_salary ?? $member_details->basic_salary;
            $member_details->emergency_phone_number = $data->emergency_phone_number ?? $member_details->emergency_phone_number;
            $member_details->location = $data->location ?? $member_details->location;
            $member_details->contract_type = $data->contract_type ?? $member_details->contract_type;
            $member_details->bank_account_number = $data->bank_account_number ?? $member_details->bank_account_number;
            $member_details->bank_name = $data->bank_name ?? $member_details->bank_name;
            $member_details->ifsc_code = $data->ifsc_code ?? $member_details->ifsc_code;
            $member_details->bank_branch_name = $data->bank_branch_name ?? $member_details->bank_branch_name;
            $member_details->material_status = $data->material_status ?? $member_details->material_status;
            $member_details->work_experience = $data->work_experience ?? $member_details->work_experience;
            $member_details->qualification = $data->qualification ?? $member_details->qualification;
            $member_details->current_address = $data->current_address ?? $member_details->current_address;
            $member_details->permanent_address = $data->permanent_address ?? $member_details->permanent_address;
            $member_details->update();
        }else{
            $member_details = new MemberDetails();
            $member_details->user_id = $user->id;
            $member_details->date_of_joining = $data->date_of_joining;
            $member_details->department_id = $data->department_id;
            $member_details->epf_number = $data->epf_number;
            $member_details->basic_salary = $data->basic_salary;
            $member_details->emergency_phone_number = $data->emergency_phone_number;
            $member_details->location = $data->location;
            $member_details->contract_type = $data->contract_type;
            $member_details->bank_account_number = $data->bank_account_number;
            $member_details->bank_name = $data->bank_name;
            $member_details->ifsc_code = $data->ifsc_code;
            $member_details->bank_branch_name = $data->bank_branch_name;
            $member_details->material_status = $data->material_status;
            $member_details->work_experience = $data->work_experience;
            $member_details->qualification = $data->qualification;
            $member_details->current_address = $data->current_address;
            $member_details->permanent_address = $data->permanent_address;
            $member_details->save();
        }


        return response()->json(['success'=>1,'data'=> new MemberResource($user)], 200,[],JSON_NUMERIC_CHECK);
    }


}
