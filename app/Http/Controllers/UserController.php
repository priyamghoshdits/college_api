<?php

namespace App\Http\Controllers;

use App\Http\Resources\AchivementResource;
use App\Http\Resources\ApiScoreResource;
use App\Http\Resources\BookPublicationResource;
use App\Http\Resources\JournalPublicationResource;
use App\Http\Resources\LoginResource;
use App\Http\Resources\ManualFeesResource;
use App\Http\Resources\MemberResource;
use App\Http\Resources\PgPhdGuideResource;
use App\Http\Resources\PlacementResource;
use App\Http\Resources\StaffEducationResource;
use App\Http\Resources\StaffExperienceResource;
use App\Http\Resources\StudentResource;
use App\Models\Achivement;
use App\Models\ApiScore;
use App\Models\Attendance;
use App\Models\BookPublication;
use App\Models\CautionMoney;
use App\Models\EducationQualification;
use App\Models\JournalPublication;
use App\Models\ManualFees;
use App\Models\ManualScholarship;
use App\Models\MemberDetails;
use App\Models\PgPhdGuide;
use App\Models\PlacementDetails;
use App\Models\PreAdmissionPayment;
use App\Models\Registration;
use App\Models\StaffEducation;
use App\Models\StaffExperience;
use App\Models\StudentDetail;
use App\Models\User;
use App\Models\UserLog;
use App\Models\UserType;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\PersonalAccessToken;

class UserController extends Controller
{

    public function get_all_user()
    {
        $user = User::get();
        foreach ($user as $item) {
            $item->img_url = asset('public/user_image/');
        }
        return response()->json(['success' => 1, 'data' => $user], 200);
    }

    public function save_student_manual_fees(Request $request)
    {
        $manualFees = ManualFees::find($request['id']);
        if ($manualFees) {
            $manualFees->course_id = $request['course_id'];
            $manualFees->semester_id = $request['semester_id'];
            $manualFees->student_id = $request->user()->id;
            $manualFees->date_of_payment = $request['date_of_payment'];
            $manualFees->amount = $request['amount'];

            if ($files = $request->file('file')) {
                if (file_exists(public_path() . '/manual_fees/' . $manualFees->file_name)) {
                    File::delete(public_path() . '/manual_fees/' . $manualFees->file_name);
                }
                $destinationPath = public_path('/manual_fees/');
                $profileImage1 = $files->getClientOriginalName();
                $files->move($destinationPath, $profileImage1);
                $manualFees->file_name = $profileImage1;
            }

            $manualFees->update();
        } else {
            $manualFees = new ManualFees();
            $manualFees->course_id = $request['course_id'];
            $manualFees->semester_id = $request['semester_id'];
            $manualFees->student_id = $request->user()->id;
            $manualFees->date_of_payment = $request['date_of_payment'];
            $manualFees->amount = $request['amount'];

            if ($files = $request->file('file')) {
                $destinationPath = public_path('/manual_fees/');
                $profileImage1 = $files->getClientOriginalName();
                $files->move($destinationPath, $profileImage1);
                $manualFees->file_name = $profileImage1;
            }

            $manualFees->save();
        }

        $manualFees = ManualFees::whereStudentId($request->user()->id)->get();
        return response()->json(['success' => 1, 'data' => ManualFeesResource::collection($manualFees)], 200);
    }

    public function login(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $user = User::whereEmail($requestData->email)->whereStatus(1)->first();
        if (!$user || !Hash::check($requestData->password, $user->password)) {
            return response()->json(['success' => 0, 'data' => null, 'message' => 'Wrong credential or user disabled'], 200, [], JSON_NUMERIC_CHECK);
        }
        $userLog = new UserLog();
        $userLog->email = $requestData->email;
        $userLog->role = $user ? UserType::find($user->user_type_id)->name : null;
        $userLog->ip_address = $request->getClientIp();
        $userLog->media = $request->header('User-Agent');
        $userLog->login_time = Carbon::now();
        $userLog->save();
        Cache::forget('get_user_log');
        $token = $user->createToken('my-app-token')->plainTextToken;
        $user->token = $token;

        $user->img_url = asset('public/user_image/');

        return response()->json(['success' => 1, 'data' => new LoginResource($user), 'full_data' => $user, $token => $token], 200, [], JSON_NUMERIC_CHECK);
    }

    public function create_user(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $user = new User();
        $user->first_name = $requestData->first_name;
        $user->last_name = $requestData->last_name;
        $user->gender = $requestData->gender;
        $user->franchise_id = 1;
        $user->category_id = 5;
        $user->dob = $requestData->dob;
        $user->user_type_id = 1;
        $user->email = $requestData->email;
        $user->password = $requestData->password;
        $user->save();

        return response()->json(['success' => 1, 'data' => $user], 200, [], JSON_NUMERIC_CHECK);
    }

    public function reset_password(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $user_id = $request->user()->id;
        $user = User::find($user_id);
        $user->password = $requestData->new_password;
        $user->update();
        return response()->json(['success' => 1, 'data' => $user], 200, [], JSON_NUMERIC_CHECK);
    }

    public function send_login_credentials($id)
    {
        $pass = rand(100000, 999999);
        $data = User::find($id);
        $data->password = $pass;
        $data->update();

        dispatch(function () use ($data, $pass) {
            Mail::send('welcome_password', array(
                'name' => $data->first_name . " " . $data->middle_name . " " . $data->last_name,
                'password' => $pass
            ), function ($message) use ($data) {
                $message->from('rudkarsh@rgoi.in');
                $message->to($data->email);
                $message->subject('Password Resend');
            });
        })->afterResponse();
        return response()->json(['success' => 1, 'message' => "Mail Sent"], 200, [], JSON_NUMERIC_CHECK);
    }

    public function forgot_password($email_id)
    {
        $pass = rand(100000, 999999);

        $data = User::whereEmail($email_id)->first();
        $data->password = $pass;
        $data->update();

        dispatch(function () use ($data, $pass, $email_id) {
            Mail::send('forgot_password', array(
                'name' => $data->first_name . " " . $data->middle_name . " " . $data->last_name,
                'password' => $pass
            ), function ($message) use ($email_id) {
                $message->from('rudkarsh@rgoi.in');
                $message->to($email_id);
                $message->subject('Forgot Passowrd');
            });
        })->afterResponse();
        return response()->json(['success' => 1, 'data' => "Please check your mail"], 200, [], JSON_NUMERIC_CHECK);
    }

    public function logout(Request $request)
    {
        return response()->json(['success' => 1, 'data' => $request->user()->currentAccessToken()->delete()], 200, [], JSON_NUMERIC_CHECK);
    }

    public function get_user_data(Request $request)
    {
        if ($request->user()->user_type_id == 3) {
            $member = User::select('*', 'student_details.id as student_details_id', 'users.id as id')
                ->leftjoin('student_details', 'users.id', '=', 'student_details.student_id')
                ->leftjoin('registrations', 'registrations.student_id', '=', 'users.id')
                ->where('users.id', $request->user()->id)
                ->first();
            $education_details = EducationQualification::whereStudentId($request->user()->id)->first();
            $achievement = Achivement::whereStudentId($request->user()->id)->get();
            $placement = PlacementDetails::whereUserId($request->user()->id)->get();
            $manualFeesList = ManualFees::whereStudentId($request->user()->id)->get();
            $manualScholarshipList = ManualScholarship::whereStudentId($request->user()->id)->get();

            return response()->json([
                'success' => 1,
                'data' => new StudentResource($member),
                'education_details' => $education_details,
                'achievement' => AchivementResource::collection($achievement),
                'placement' => PlacementResource::collection($placement),
                'manualFeesList' => ManualFeesResource::collection($manualFeesList),
                'manualScholarshipList' => $manualScholarshipList
            ], 200, [], JSON_NUMERIC_CHECK);
        }
        $member = User::select('*')
            ->leftjoin('member_details', 'users.id', '=', 'member_details.user_id')
            ->where('users.id', $request->user()->id)
            ->first();

        $educations = StaffEducation::whereStaffId($request->user()->id)->get();
        $publications = BookPublication::whereStaffId($request->user()->id)->get();
        $experience = StaffExperience::whereStaffId($request->user()->id)->get();
        $journls = JournalPublication::whereStaffId($request->user()->id)->get();
        $pg_phd = PgPhdGuide::whereStaffId($request->user()->id)->get();
        $apiScoreList = ApiScore::whereStaffId($request->user()->id)->get();

        return response()->json(
            [
                'success' => 1,
                'data' => new MemberResource($member),
                'educations' => StaffEducationResource::collection($educations),
                'publications' => BookPublicationResource::collection($publications),
                'experience' => StaffExperienceResource::collection($experience),
                'journal' => JournalPublicationResource::collection($journls),
                'pgPhd' => PgPhdGuideResource::collection($pg_phd),
                'apiScoreList' => ApiScoreResource::collection($apiScoreList)
            ],
            200,
            [],
            JSON_NUMERIC_CHECK
        );
    }

    public function get_user_attendance(Request $request)
    {
        $today = Carbon::now();
        $year = count(Attendance::whereUserId($request->user()->id)->whereYear('date', $today->year)->get());
        $month = count(Attendance::whereUserId($request->user()->id)->whereMonth('date', $today->month)->get());
        $total_teacher = count(User::whereUserTypeId(2)->get());
        return response()->json(['success' => 1, 'year' => $year, 'month' => $month, 'teacher' => $total_teacher], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_personal_access_token()
    {
        return PersonalAccessToken::where('last_used_at', '<=', Carbon::now()->subDays(1))->delete();
    }

    public function test_api(Request $request)
    {
        return response()->json(['success' => 1, 'data' => $request->user()->franchise_id], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_student(Request $request)
    {
        // return "form id: " . $request->user_id;

        Log::info($request['admission_status']);
        Log::info($request['form_id']);
        $pass = rand(100000, 999999);
        $return_type = 1;
        $user_id = '';
        $admission_status = $request['admission_status'] ?? 1;

        DB::beginTransaction();
        try {

            switch ($admission_status) {
                case 0:
                    $user = new User();

                    if ($image = $request->file('image')) {
                        // Define upload path
                        $destinationPath = public_path('/user_image/'); // upload path
                        // Upload Orginal Image
                        $file_name = $image->getClientOriginalName();
                        $image->move($destinationPath, $file_name);
                        $user->image = $file_name;
                    }

                    $user->identification_no = $this->sanitizeInput($request['identification_no'] ?? null);
                    $user->first_name = $this->sanitizeInput($request['first_name']);
                    $user->middle_name = $this->sanitizeInput($request['middle_name'] ?? null);
                    $user->last_name = $this->sanitizeInput($request['last_name']);
                    $user->gender = $this->sanitizeInput($request['gender'] ?? null);
                    $user->dob = $this->sanitizeInput($request['dob'] ?? null);
                    $user->mobile_no = $this->sanitizeInput($request['mobile_no'] ?? null);
                    $user->category_id = $this->sanitizeInput($request['category_id']);
                    $user->religion = $this->sanitizeInput($request['religion'] ?? null);
                    $user->blood_group = $this->sanitizeInput($request['blood_group'] ?? null);
                    $user->user_type_id = 3;
                    $user->franchise_id = 1;
                    $user->email = $this->sanitizeInput($request['email']);
                    $user->password = $pass;
                    $user->status = 0;
                    $user->save();

                    $student_details = new StudentDetail();
                    $student_details->student_id = $user->id;
                    $student_details->course_id = $request['course_id'];
                    $student_details->semester_id = $request['semester_id'];
                    $student_details->emergency_phone_number = $request['emergency_phone_number'] ?? null;
                    $student_details->material_status = $request['material_status'] ?? null;
                    $student_details->current_address = $request['current_address'] ?? null;
                    $student_details->current_semester_id = $request['semester_id'];
                    $student_details->permanent_address = $request['permanent_address'] ?? null;
                    $student_details->session_id = $request['session_id'] ?? null;
                    $student_details->admission_status = 0;
                    $student_details->agent_id = 1;
                    $student_details->save();

                    $user_id = $user->id;

                    break;

                case 1:
                    switch ($request['form_id']) {
                        case 1:
                            $email_id = $request['email'];
                            $mobile_no = $request['mobile_no'];

                            $user = new User();
                            $user->identification_no = $this->sanitizeInput($request['identification_no'] ?? null);
                            $user->first_name = $this->sanitizeInput($request['first_name']);
                            $user->middle_name = $this->sanitizeInput($request['middle_name'] ?? null);
                            $user->last_name = $this->sanitizeInput($request['last_name']);
                            $user->gender = $this->sanitizeInput($request['gender'] ?? null);
                            $user->dob = $this->sanitizeInput($request['dob'] ?? null);
                            $user->category_id = $this->sanitizeInput($request['category_id']);
                            $user->religion = $this->sanitizeInput($request['religion'] ?? null);
                            $user->mobile_no = $this->sanitizeInput($request['mobile_no'] ?? null);
                            $user->blood_group = $this->sanitizeInput($request['blood_group'] ?? null);
                            $user->user_type_id = 3;
                            //                $user->franchise_id = $this->sanitizeInput($request['franchise_id'] == 'null' || $request['franchise_id'] == null ? $request->user()->franchise_id : $request['franchise_id']);
                            $user->franchise_id = 1;
                            $user->email = $this->sanitizeInput($request['email']);
                            $user->password = $pass;
                            $user->status = 1;
                            $user->save();

                            $user_id = $user->id;

                            $student_details = new StudentDetail();
                            $student_details->student_id = $user_id;
                            $student_details->course_id = $request['course_id'];
                            $student_details->semester_id = $request['semester_id'];
                            //                $student_details->agent_id = $request['agent_id'] == 'null' || $request['agent_id'] == null ? $request->user()->id : $request['agent_id'];
                            $student_details->agent_id = 1;
                            $student_details->current_semester_id = $request['semester_id'];
                            $student_details->session_id = $request['session_id'] ?? null;
                            $student_details->admission_date = $request['admission_date'] ?? null;
                            $student_details->abc_id = $request['abc_id'] ?? null;
                            $student_details->material_status = $request['material_status'] ?? null;
                            $student_details->admission_status = $request['admission_status'] ?? null;
                            $student_details->emergency_phone_number = $request['emergency_phone_number'] ?? null;
                            $student_details->current_address = $request['current_address'] ?? null;
                            $student_details->permanent_address = $request['permanent_address'] ?? null;

                            $student_details->ews = $request['ews'];
                            $student_details->medical_history = $request['medical_history'];
                            $student_details->medical_detail = $request['medical_detail'];

                            $student_details->save();

                            $registration = new Registration();
                            $registration->student_id = $user_id;
                            $registration->roll_no = $request['roll_no'] ?? null;
                            $registration->registration_no = $request['registration_no'] ?? null;
                            $registration->save();
                            break;

                        case 2:
                            $user_id = $request['id'];

                            $student_details = StudentDetail::where('student_id', $user_id)->first();

                            if ($father_income_proofs = $request->file('father_income_proof')) {
                                // Define upload path
                                $destinationPath = public_path('/father_income_proof/'); // upload path
                                // Upload Orginal Image
                                $file_name = $father_income_proofs->getClientOriginalName();
                                $father_income_proofs->move($destinationPath, $file_name);
                                $student_details->father_income_proof = $file_name;
                            }

                            if ($mother_income_proof = $request->file('mother_income_proof')) {
                                // Define upload path
                                $destinationPath = public_path('/mother_income_proof/'); // upload path
                                // Upload Orginal Image
                                $file_name = $mother_income_proof->getClientOriginalName();
                                $mother_income_proof->move($destinationPath, $file_name);
                                $student_details->mother_income_proof = $file_name;
                            }

                            if ($registration_proofs = $request->file('registration_proof')) {
                                // Define upload path
                                $destinationPath = public_path('/registration_proof/'); // upload path
                                // Upload Orginal Image
                                $file_name = $registration_proofs->getClientOriginalName();
                                $registration_proofs->move($destinationPath, $file_name);
                                $student_details->registration_proof = $file_name;
                            }

                            if ($abc_file = $request->file('abc_file')) {
                                // Define upload path
                                $destinationPath = public_path('/abc_file/'); // upload path
                                // Upload Orginal Image
                                $file_name = $abc_file->getClientOriginalName();
                                $abc_file->move($destinationPath, $file_name);
                                $student_details->abc_file = $file_name;
                            }
                            if ($student_signature = $request->file('student_signature')) {
                                // Define upload path
                                $destinationPath = public_path('/student_signature/'); // upload path
                                // Upload Orginal Image
                                $file_name = $student_signature->getClientOriginalName();
                                $student_signature->move($destinationPath, $file_name);
                                $student_details->student_signature = $file_name;
                            }
                            if ($admission_allotment = $request->file('admission_allotment')) {
                                // Define upload path
                                $destinationPath = public_path('/admission_allotment/'); // upload path
                                // Upload Orginal Image
                                $file_name = $admission_allotment->getClientOriginalName();
                                $admission_allotment->move($destinationPath, $file_name);
                                $student_details->admission_allotment = $file_name;
                            }

                            if ($medical_certificate = $request->file('medical_certificate')) {
                                // Define upload path
                                $destinationPath = public_path('/medical_certificate/'); // upload path
                                // Upload Orginal Image
                                $file_name = $medical_certificate->getClientOriginalName();
                                $medical_certificate->move($destinationPath, $file_name);
                                $student_details->medical_certificate = $file_name;
                            }
                            if ($ews_file = $request->file('ews_file')) {
                                // Define upload path
                                $destinationPath = public_path('/ews_file/'); // upload path
                                // Upload Orginal Image
                                $file_name = $ews_file->getClientOriginalName();
                                $ews_file->move($destinationPath, $file_name);
                                $student_details->ews_file = $file_name;
                            }
                            $student_details->update();


                            $user = User::find($user_id);

                            if ($files = $request->file('image')) {
                                // Define upload path
                                $destinationPath = public_path('/user_image/'); // upload path
                                // Upload Orginal Image
                                $file_name = $files->getClientOriginalName();
                                $files->move($destinationPath, $file_name);
                                $user->image = $file_name;
                            }

                            if ($aadhaar_card_proofs = $request->file('aadhaar_card_proof')) {
                                // Define upload path
                                $destinationPath = public_path('/aadhaar_card_proof/'); // upload path
                                // Upload Orginal Image
                                $file_name = $aadhaar_card_proofs->getClientOriginalName();
                                $aadhaar_card_proofs->move($destinationPath, $file_name);
                                $user->aadhaar_card_proof = $file_name;
                            }

                            if ($admission_slips = $request->file('admission_slip')) {
                                // Define upload path
                                $destinationPath = public_path('/admission_slip/'); // upload path
                                // Upload Orginal Image
                                $file_name = $admission_slips->getClientOriginalName();
                                $admission_slips->move($destinationPath, $file_name);
                                $user->admission_slip = $file_name;
                            }

                            if ($blood_group_proofs = $request->file('blood_group_proof')) {
                                // Define upload path
                                $destinationPath = public_path('/blood_group_proof/'); // upload path
                                // Upload Orginal Image
                                $file_name = $blood_group_proofs->getClientOriginalName();
                                $blood_group_proofs->move($destinationPath, $file_name);
                                $user->blood_group_proof = $file_name;
                            }

                            if ($dob_proofs = $request->file('dob_proof')) {
                                // Define upload path
                                $destinationPath = public_path('/dob_proof/'); // upload path
                                // Upload Orginal Image
                                $file_name = $dob_proofs->getClientOriginalName();
                                $dob_proofs->move($destinationPath, $file_name);
                                $user->dob_proof = $file_name;
                            }

                            $user->update();

                            break;

                        case 3:
                            $user_id = $request['id'];

                            $cautionMoney = new CautionMoney();
                            $cautionMoney->user_id = $user_id;
                            $cautionMoney->caution_money_payment_date = $request['payment_date'];
                            $cautionMoney->caution_money_mode_of_payment = $request['mode_of_payment'];
                            $cautionMoney->caution_money_transaction_id = $request['transaction_id'];
                            $cautionMoney->caution_money = $request['caution_money'];
                            $cautionMoney->caution_money_deduction = $request['deduction'] ?? null;
                            $cautionMoney->refund_payment_date = $request['refund_payment_date'] ?? null;
                            $cautionMoney->refund_mode_of_payment = $request['refund_mode_of_payment'] ?? null;
                            $cautionMoney->refund_transaction_id = $request['refund_transaction_id'] ?? null;
                            $cautionMoney->caution_money_refund = 0;
                            $cautionMoney->save();

                            break;

                        case 4:
                            $user_id = $request['id'];

                            if ($request['admission_status'] == 0) {
                                $preAdmissionPayment = new PreAdmissionPayment();
                                $preAdmissionPayment->user_id = $user_id;
                                if (isset($request['payment_date'])) {
                                    $preAdmissionPayment->payment_date = $request['payment_date'];
                                    $preAdmissionPayment->mode_of_payment = $request['mode_of_payment'];
                                    $preAdmissionPayment->transaction_id = $request['transaction_id'];
                                    $preAdmissionPayment->amount = $request['amount'];
                                    $preAdmissionPayment->save();
                                }
                            }

                            $student_details = StudentDetail::where('student_id', $user_id)->first();
                            $student_details->father_name = $this->sanitizeInput($request['father_name'] ?? null);
                            $student_details->father_occupation = $this->sanitizeInput($request['father_occupation'] ?? null);
                            $student_details->father_phone = $this->sanitizeInput($request['father_phone'] ?? null);
                            $student_details->mother_name = $this->sanitizeInput($request['mother_name'] ?? null);
                            $student_details->mother_occupation = $this->sanitizeInput($request['mother_occupation'] ?? null);
                            $student_details->guardian_name = $this->sanitizeInput($request['guardian_name'] ?? null);
                            $student_details->guardian_phone = $this->sanitizeInput($request['guardian_phone'] ?? null);
                            $student_details->guardian_email = $this->sanitizeInput($request['guardian_email'] ?? null);
                            //        $student_details->admission_status = $request->admission_status ;
                            $student_details->mother_phone = $this->sanitizeInput($request['mother_phone'] ?? null);
                            $student_details->guardian_relation = $this->sanitizeInput($request['guardian_relation'] ?? null);
                            $student_details->guardian_address = $this->sanitizeInput($request['guardian_address'] ?? null);
                            $student_details->guardian_occupation = $this->sanitizeInput($request['guardian_occupation'] ?? null);
                            $student_details->pre_admission_payment_id = ($request['admission_status'] == 0) ? $preAdmissionPayment->id : null;

                            $student_details->update();
                            $return_type = 2;

                            break;

                        default:
                            return response()->json(['success' => 0, 'data' => "Send a valid form id"], 405, [], JSON_NUMERIC_CHECK);
                    }
                    break;

                default:
                    return response()->json(['success' => 0, 'data' => "invalid admission status"], 405, [], JSON_NUMERIC_CHECK);
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            if ($e->errorInfo[1] == 1062) {
                return response()->json(['success' => 0, 'exception' => 'The email address is already registered.'], 405);
            }
            return response()->json(['success' => 0, 'exception' => $e->getMessage()], 201);
        }

        $member = User::select('*', 'users.id as id')
            ->leftjoin('student_details', 'users.id', '=', 'student_details.student_id')
            ->leftjoin('pre_admission_payments', 'pre_admission_payments.id', '=', 'student_details.pre_admission_payment_id')
            ->leftjoin('caution_money', 'caution_money.user_id', '=', 'users.id')
            ->whereUserTypeId(3)
            ->where('users.id', $user_id)
            ->first();

        return response()->json(['success' => $return_type, 'data' => new StudentResource($member)], 200, [], JSON_NUMERIC_CHECK);
    }

    function sanitizeInput($input)
    {
        return ($input === 'null' || $input === '') ? null : $input;
    }

    public function update_student(Request $request)
    {
        $return_type = 1;
        $admission_status = $request['admission_status'] ?? 1;
        if ($admission_status == 0) {
            $user = User::find($request['id']);

            if ($image = $request->file('image')) {
                if (file_exists(public_path() . '/user_image/' . $user->image)) {
                    File::delete(public_path() . '/user_image/' . $user->image);
                }
                // Define upload path
                $destinationPath = public_path('/user_image/'); // upload path
                // Upload Orginal Image
                $file_name = $image->getClientOriginalName();
                $image->move($destinationPath, $file_name);
                $user->image = $file_name;
            }


            $user->identification_no = $this->sanitizeInput($request['identification_no'] ?? null);
            $user->first_name = $this->sanitizeInput($request['first_name']);
            $user->middle_name = $this->sanitizeInput($request['middle_name'] ?? null);
            $user->last_name = $this->sanitizeInput($request['last_name']);
            $user->gender = $this->sanitizeInput($request['gender'] ?? null);
            $user->dob = $this->sanitizeInput($request['dob'] ?? null);
            $user->mobile_no = $this->sanitizeInput($request['mobile_no'] ?? null);
            $user->category_id = $this->sanitizeInput($request['category_id']);
            $user->religion = $this->sanitizeInput($request['religion'] ?? null);
            $user->blood_group = $this->sanitizeInput($request['blood_group'] ?? null);
            $user->user_type_id = 3;
            $user->franchise_id = 1;
            $user->email = $this->sanitizeInput($request['email']);
            $user->status = 0;
            $user->update();

            $student_details = StudentDetail::whereStudentId($user->id)->first();
            $student_details->course_id = $request['course_id'];
            $student_details->semester_id = $request['semester_id'];
            $student_details->emergency_phone_number = $request['emergency_phone_number'] ?? null;
            $student_details->material_status = $request['material_status'] ?? null;
            $student_details->current_address = $request['current_address'] ?? null;
            $student_details->current_semester_id = $request['semester_id'];
            $student_details->permanent_address = $request['permanent_address'] ?? null;
            $student_details->session_id = $request['session_id'] ?? null;
            $student_details->admission_status = 0;
            $student_details->agent_id = 1;
            $student_details->update();

            $user_id = $user->id;

            //                return response()->json(['success' => $return_type, 'data' => new StudentResource($member)], 200, [], JSON_NUMERIC_CHECK);
        } else {
            if ($request->form_id == 1) {

                $email_id = $request['email'];
                $mobile_no = $request['mobile_no'];

                $pass = rand(100000, 999999);

                $user = User::find($request['id']);
                $user->identification_no = $this->sanitizeInput($request['identification_no'] ?? null);
                $user->first_name = $this->sanitizeInput($request['first_name']);
                $user->middle_name = $this->sanitizeInput($request['middle_name'] ?? null);
                $user->last_name = $this->sanitizeInput($request['last_name']);
                $user->gender = $this->sanitizeInput($request['gender'] ?? null);
                $user->dob = $this->sanitizeInput($request['dob'] ?? null);
                $user->category_id = $this->sanitizeInput($request['category_id']);
                $user->religion = $this->sanitizeInput($request['religion'] ?? null);
                $user->mobile_no = $this->sanitizeInput($request['mobile_no'] ?? null);
                $user->blood_group = $this->sanitizeInput($request['blood_group'] ?? null);
                $user->user_type_id = 3;
                //            $user->franchise_id = $request['franchise_id'] == 'null' || $request['franchise_id'] == null ? $request->user()->franchise_id : $request['franchise_id'];
                $user->franchise_id = 1;
                $user->email = $this->sanitizeInput($request['email']);
                $user->password = $pass;
                $user->status = ($request['admission_status'] == 0) ? 0 : 1;
                $user->update();
                $user_id = $request['id'];

                $student_details = StudentDetail::where('student_id', $user_id)->first();
                // $student_details->student_id = $user_id;
                $student_details->course_id = $request['course_id'];
                $student_details->semester_id = $request['semester_id'];
                //            $student_details->agent_id = $request['agent_id'] == 'null' || $request['agent_id'] == null ? $request->user()->id : $request['agent_id'];
                $student_details->agent_id = 1;
                $student_details->current_semester_id = $request['semester_id'];
                $student_details->session_id = $request['session_id'] ?? null;
                $student_details->admission_date = $request['admission_date'] ?? null;
                $student_details->abc_id = $request['abc_id'] ?? null;
                $student_details->material_status = $request['material_status'] ?? null;
                $student_details->admission_status = $request['admission_status'] ?? null;
                $student_details->emergency_phone_number = $request['emergency_phone_number'] ?? null;
                $student_details->current_address = $request['current_address'] ?? null;
                $student_details->permanent_address = $request['permanent_address'] ?? null;

                $student_details->ews = $request['ews'];
                $student_details->medical = $request['medical'];
                $student_details->medical_detail = $request['medical_detail'];

                $student_details->update();

                $registration = Registration::where('student_id', $user_id)->first();
                // $registration->student_id = $user_id;
                $registration->roll_no = $request['roll_no'] ?? null;
                $registration->registration_no = $request['registration_no'] ?? null;
                $registration->update();

                // if ($student_details->admission_status == 1) {
                //     dispatch(function () use ($user, $pass, $email_id, $mobile_no) {
                //         Mail::send('welcome_password', array(
                //             'name' => $user->first_name . " " . $user->middle_name . " " . $user->last_name, 'password' => $pass, 'phone_no' => $mobile_no
                //         ), function ($message) use ($email_id) {
                //             $message->from('rudkarsh@rgoi.in');
                //             $message->to($email_id);
                //             $message->subject('Test mail');
                //         });
                //     })->afterResponse();
                // }

            } elseif ($request->form_id == 2) {
                $user_id = $request['id'];

                $student_details = StudentDetail::where('student_id', $user_id)->first();

                if ($father_income_proofs = $request->file('father_income_proof')) {
                    if (file_exists(public_path() . '/father_income_proof/' . $student_details->father_income_proof)) {
                        File::delete(public_path() . '/father_income_proof/' . $student_details->father_income_proof);
                    }
                    // Define upload path
                    $destinationPath = public_path('/father_income_proof/'); // upload path
                    // Upload Orginal Image
                    $file_name = $father_income_proofs->getClientOriginalName();
                    $father_income_proofs->move($destinationPath, $file_name);
                    $student_details->father_income_proof = $file_name;
                }

                if ($mother_income_proof = $request->file('mother_income_proof')) {
                    if (file_exists(public_path() . '/mother_income_proof/' . $student_details->mother_income_proof)) {
                        File::delete(public_path() . '/mother_income_proof/' . $student_details->mother_income_proof);
                    }
                    // Define upload path
                    $destinationPath = public_path('/mother_income_proof/'); // upload path
                    // Upload Orginal Image
                    $file_name = $mother_income_proof->getClientOriginalName();
                    $mother_income_proof->move($destinationPath, $file_name);
                    $student_details->mother_income_proof = $file_name;
                }

                if ($registration_proofs = $request->file('registration_proof')) {
                    if (file_exists(public_path() . '/registration_proof/' . $student_details->registration_proof)) {
                        File::delete(public_path() . '/registration_proof/' . $student_details->registration_proof);
                    }
                    // Define upload path
                    $destinationPath = public_path('/registration_proof/'); // upload path
                    // Upload Orginal Image
                    $file_name = $registration_proofs->getClientOriginalName();
                    $registration_proofs->move($destinationPath, $file_name);
                    $student_details->registration_proof = $file_name;
                }

                if ($abc_file = $request->file('abc_file')) {
                    if (file_exists(public_path() . '/abc_file/' . $student_details->abc_file)) {
                        File::delete(public_path() . '/abc_file/' . $student_details->abc_file);
                    }
                    // Define upload path
                    $destinationPath = public_path('/abc_file/'); // upload path
                    // Upload Orginal Image
                    $file_name = $abc_file->getClientOriginalName();
                    $abc_file->move($destinationPath, $file_name);
                    $student_details->abc_file = $file_name;
                }
                if ($student_signature = $request->file('student_signature')) {
                    if (file_exists(public_path() . '/student_signature/' . $student_details->student_signature)) {
                        File::delete(public_path() . '/student_signature/' . $student_details->student_signature);
                    }
                    // Define upload path
                    $destinationPath = public_path('/student_signature/'); // upload path
                    // Upload Orginal Image
                    $file_name = $student_signature->getClientOriginalName();
                    $student_signature->move($destinationPath, $file_name);
                    $student_details->student_signature = $file_name;
                }
                if ($admission_allotment = $request->file('admission_allotment')) {
                    if (file_exists(public_path() . '/admission_allotment/' . $student_details->admission_allotment)) {
                        File::delete(public_path() . '/admission_allotment/' . $student_details->admission_allotment);
                    }
                    // Define upload path
                    $destinationPath = public_path('/admission_allotment/'); // upload path
                    // Upload Orginal Image
                    $file_name = $admission_allotment->getClientOriginalName();
                    $admission_allotment->move($destinationPath, $file_name);
                    $student_details->admission_allotment = $file_name;
                }

                if ($medical_certificate = $request->file('medical_certificate')) {
                    if (file_exists(public_path() . '/medical_certificate/' . $student_details->medical_certificate)) {
                        File::delete(public_path() . '/medical_certificate/' . $student_details->medical_certificate);
                    }
                    // Define upload path
                    $destinationPath = public_path('/medical_certificate/'); // upload path
                    // Upload Orginal Image
                    $file_name = $medical_certificate->getClientOriginalName();
                    $medical_certificate->move($destinationPath, $file_name);
                    $student_details->medical_certificate = $file_name;
                }
                if ($ews_file = $request->file('ews_file')) {
                    if (file_exists(public_path() . '/ews_file/' . $student_details->ews_file)) {
                        File::delete(public_path() . '/ews_file/' . $student_details->ews_file);
                    }
                    // Define upload path
                    $destinationPath = public_path('/ews_file/'); // upload path
                    // Upload Orginal Image
                    $file_name = $ews_file->getClientOriginalName();
                    $ews_file->move($destinationPath, $file_name);
                    $student_details->ews_file = $file_name;
                }

                $student_details->update();


                $user = User::find($user_id);

                if ($files = $request->file('image')) {
                    // Define upload path
                    $destinationPath = public_path('/user_image/'); // upload path
                    // Upload Orginal Image
                    $file_name = $files->getClientOriginalName();
                    $files->move($destinationPath, $file_name);
                    $user->image = $file_name;
                }

                if ($aadhaar_card_proofs = $request->file('aadhaar_card_proof')) {
                    // Define upload path
                    $destinationPath = public_path('/aadhaar_card_proof/'); // upload path
                    // Upload Orginal Image
                    $file_name = $aadhaar_card_proofs->getClientOriginalName();
                    $aadhaar_card_proofs->move($destinationPath, $file_name);
                    $user->aadhaar_card_proof = $file_name;
                }

                if ($admission_slips = $request->file('admission_slip')) {
                    // Define upload path
                    $destinationPath = public_path('/admission_slip/'); // upload path
                    // Upload Orginal Image
                    $file_name = $admission_slips->getClientOriginalName();
                    $admission_slips->move($destinationPath, $file_name);
                    $user->admission_slip = $file_name;
                }

                if ($blood_group_proofs = $request->file('blood_group_proof')) {
                    // Define upload path
                    $destinationPath = public_path('/blood_group_proof/'); // upload path
                    // Upload Orginal Image
                    $file_name = $blood_group_proofs->getClientOriginalName();
                    $blood_group_proofs->move($destinationPath, $file_name);
                    $user->blood_group_proof = $file_name;
                }

                if ($dob_proofs = $request->file('dob_proof')) {
                    // Define upload path
                    $destinationPath = public_path('/dob_proof/'); // upload path
                    // Upload Orginal Image
                    $file_name = $dob_proofs->getClientOriginalName();
                    $dob_proofs->move($destinationPath, $file_name);
                    $user->dob_proof = $file_name;
                }

                $user->update();
            } elseif ($request->form_id == 3) {
                // if ($request->admission_status == 1) {
                // return "data: " . $request['user_id'];
                $user_id = $request['id'];

                $cautionMoney = CautionMoney::where('user_id', $user_id)->first();

//                return $user_id;
                if ($cautionMoney) {
                    $cautionMoney->user_id = $user_id;
                    $cautionMoney->caution_money_payment_date = $request['payment_date'];
                    $cautionMoney->caution_money_mode_of_payment = $request['mode_of_payment'];
                    $cautionMoney->caution_money_transaction_id = $request['transaction_id'];
                    $cautionMoney->caution_money = $request['caution_money'];
                    $cautionMoney->caution_money_deduction = $request['deduction'] ?? null;
                    $cautionMoney->refund_payment_date = $request['refund_payment_date'] ?? null;
                    $cautionMoney->refund_mode_of_payment = $request['refund_mode_of_payment'] ?? null;
                    $cautionMoney->refund_transaction_id = $request['refund_transaction_id'] ?? null;
                    $cautionMoney->caution_money_refund = 0;
                    $cautionMoney->update();
                } else {
                    $cautionMoney = new CautionMoney();
                    $cautionMoney->user_id = $user_id;
                    $cautionMoney->caution_money_payment_date = $request['payment_date'];
                    $cautionMoney->caution_money_mode_of_payment = $request['mode_of_payment'];
                    $cautionMoney->caution_money_transaction_id = $request['transaction_id'];
                    $cautionMoney->caution_money = $request['caution_money'];
                    $cautionMoney->caution_money_deduction = $request['deduction'] ?? null;
                    $cautionMoney->refund_payment_date = $request['refund_payment_date'] ?? null;
                    $cautionMoney->refund_mode_of_payment = $request['refund_mode_of_payment'] ?? null;
                    $cautionMoney->refund_transaction_id = $request['refund_transaction_id'] ?? null;
                    $cautionMoney->caution_money_refund = 0;
                    $cautionMoney->save();
                }
                // }
            } elseif ($request->form_id == 4) {

                $user_id = $request['id'];

                if ($request['admission_status'] == 0) {
                    $preAdmissionPayment = new PreAdmissionPayment();
                    $preAdmissionPayment->user_id = $user_id;
                    if (isset($request['payment_date'])) {
                        $preAdmissionPayment->payment_date = $request['payment_date'];
                        $preAdmissionPayment->mode_of_payment = $request['mode_of_payment'];
                        $preAdmissionPayment->transaction_id = $request['transaction_id'];
                        $preAdmissionPayment->amount = $request['amount'];
                        $preAdmissionPayment->save();
                    }
                }

                $student_details = StudentDetail::where('student_id', $user_id)->first();
                $student_details->father_name = $this->sanitizeInput($request['father_name']);
                $student_details->father_occupation = $this->sanitizeInput($request['father_occupation']);
                $student_details->father_phone = $this->sanitizeInput($request['father_phone']);
                $student_details->mother_name = $this->sanitizeInput($request['mother_name']);
                $student_details->mother_occupation = $this->sanitizeInput($request['mother_occupation']);
                $student_details->guardian_name = $this->sanitizeInput($request['guardian_name']);
                $student_details->guardian_phone = $this->sanitizeInput($request['guardian_phone']);
                $student_details->guardian_email = $this->sanitizeInput($request['guardian_email']);
                // $student_details->admission_status = $request->admission_status ;
                $student_details->mother_phone = $this->sanitizeInput($request['mother_phone']);
                $student_details->guardian_relation = $this->sanitizeInput($request['guardian_relation']);
                $student_details->guardian_address =$this->sanitizeInput( $request['guardian_address']);
                $student_details->guardian_occupation = $this->sanitizeInput($request['guardian_occupation']);
                $student_details->pre_admission_payment_id = ($request['admission_status'] == 0) ? $preAdmissionPayment->id : null;

                $student_details->update();
                $return_type = 2;
            }
        }

//        return $user_id;

        $member = User::select('*', 'users.id as id')
            ->leftjoin('student_details', 'users.id', '=', 'student_details.student_id')
            ->leftjoin('pre_admission_payments', 'pre_admission_payments.id', '=', 'student_details.pre_admission_payment_id')
            ->leftjoin('caution_money', 'caution_money.user_id', '=', 'users.id')
            ->whereUserTypeId(3)
            ->where('users.id', $user_id)
            ->first();

//        return $member;

        return response()->json(['success' => $return_type, 'data' => new StudentResource($member)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_member(Request $request)
    {
        $data = (object)$request->json()->all();
        $pass = rand(100000, 999999);
        DB::beginTransaction();
        try {
            $user = new User();
            $user->identification_no = $this->sanitizeInput($request['identification_no']);
            $user->first_name = $this->sanitizeInput($request['first_name']);
            $user->middle_name = $this->sanitizeInput($request['middle_name']);
            $user->last_name = $this->sanitizeInput($request['last_name']);
            $user->gender = $this->sanitizeInput($request['gender']);
            $user->dob = $this->sanitizeInput($request['dob']);
            $user->category_id = $this->sanitizeInput($request['category_id']);
            $user->religion = $this->sanitizeInput($request['religion']);
            $user->mobile_no = $request['mobile_no'];
            $user->blood_group = $request['blood_group'];
            $user->user_type_id = $request['user_type_id'];
            //            $user->franchise_id = $request['franchise_id'] ?? $request->user()->franchise_id;
            $user->franchise_id = 1;
            $user->email = $request['email'];
            $user->password = $pass;
            $user->status = 1;

            if ($files = $request->file('profile_image')) {
                // Define upload path
                $destinationPath = public_path('/user_image/'); // upload path
                // Upload Orginal Image
                $file_name = $files->getClientOriginalName();
                $files->move($destinationPath, $file_name);
                $user->image = $file_name;
            }

            if ($files = $request->file('aadhaar_card_proof')) {
                // Define upload path
                $destinationPath = public_path('/aadhaar_card_proof/'); // upload path
                // Upload Orginal Image
                $file_name = $files->getClientOriginalName();
                $files->move($destinationPath, $file_name);
                $user->aadhaar_card_proof = $file_name;
            }

            if ($files = $request->file('dob_proof')) {
                // Define upload path
                $destinationPath = public_path('/dob_proof/'); // upload path
                // Upload Orginal Image
                $file_name = $files->getClientOriginalName();
                $files->move($destinationPath, $file_name);
                $user->dob_proof = $file_name;
            }
            if ($files = $request->file('blood_group_proof')) {
                // Define upload path
                $destinationPath = public_path('/blood_group_proof/'); // upload path
                // Upload Orginal Image
                $file_name = $files->getClientOriginalName();
                $files->move($destinationPath, $file_name);
                $user->blood_group_proof = $file_name;
            }

            $user->save();

            $email_id = $request['email'];
            $mobile_no = $request['mobile_no'];

            $member_details = new MemberDetails();
            $member_details->user_id = $user->id;
            $member_details->date_of_joining = $request['date_of_joining'];
            $member_details->department_id = $request['department_id'];
            $member_details->designation_id = $request['designation_id'];
            $member_details->epf_number = $request['epf_number'];
            $member_details->esi_number = $request['esi_number'];
            $member_details->gross_salary = $request['gross_salary'];
            $member_details->emergency_phone_number = $request['emergency_phone_number'];
            $member_details->location = $request['location'];
            $member_details->contract_type = $request['contract_type'];
            $member_details->bank_account_number = $request['bank_account_number'];
            $member_details->bank_name = $request['bank_name'];
            $member_details->ifsc_code = $request['ifsc_code'];
            $member_details->bank_branch_name = $request['bank_branch_name'];
            $member_details->material_status = $request['material_status'];
            $member_details->work_experience = $request['work_experience'];
            $member_details->qualification = $request['qualification'];
            $member_details->current_address = $request['current_address'];
            $member_details->permanent_address = $request['permanent_address'];
            $member_details->pan_number = $request['pan_number'];
            $member_details->spouse_name = $request['spouse_name'];
            $member_details->relation = $request['relation'];


            if ($files = $request->file('relation_proof')) {
                // Define upload path
                $destinationPath = public_path('/relation_proof/'); // upload path
                // Upload Orginal Image
                $file_name = $files->getClientOriginalName();
                $files->move($destinationPath, $file_name);
                $member_details->relation_proof = $file_name;
            }

            if ($files = $request->file('pan_proof')) {
                // Define upload path
                $destinationPath = public_path('/pan_proof/'); // upload path
                // Upload Orginal Image
                $file_name = $files->getClientOriginalName();
                $files->move($destinationPath, $file_name);
                $member_details->pan_proof = $file_name;
            }

            if ($files = $request->file('caste_certificate_proof')) {
                // Define upload path
                $destinationPath = public_path('/caste_certificate_proof/'); // upload path
                // Upload Orginal Image
                $file_name = $files->getClientOriginalName();
                $files->move($destinationPath, $file_name);
                $member_details->caste_certificate_proof = $file_name;
            }
            if ($files = $request->file('joining_letter_proof')) {
                // Define upload path
                $destinationPath = public_path('/joining_letter_proof/'); // upload path
                // Upload Orginal Image
                $file_name = $files->getClientOriginalName();
                $files->move($destinationPath, $file_name);
                $member_details->joining_letter_proof = $file_name;
            }


            $member_details->save();
            DB::commit();

            // dispatch(function () use ($user, $pass, $email_id, $mobile_no) {
            //     Mail::send('welcome_password', array(
            //         'name' => $user->first_name . " " . $user->middle_name . " " . $user->last_name, 'password' => $pass, 'phone_no' => $mobile_no
            //     ), function ($message) use ($email_id) {
            //         $message->from('rudkarsh@rgoi.in');
            //         $message->to($email_id);
            //         $message->subject('Test mail');
            //     });
            // })->afterResponse();

            //            dispatch(function () use ($user, $pass, $email_id, $mobile_no) {
            //                Mail::send('welcome_password', array(
            //                    'name' => $user->first_name . " " . $user->middle_name . " " . $user->last_name, 'password' => $pass, 'phone_no' => $mobile_no
            //                ), function ($message) use ($email_id) {
            //                    $message->from('rudkarsh@rgoi.in');
            //                    $message->to($email_id);
            //                    $message->subject('Test mail');
            //                });
            //            })->afterResponse();
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['success' => 0, 'exception' => $e->getMessage()], 200);
        }

        return response()->json(['success' => 1, 'data' => new MemberResource($user)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_member_own(Request $request)
    {
        $data = (object)$request->json()->all();
        $user = User::find($request->user()->id);
        $user->first_name = $data->first_name ?? $user->first_name;
        $user->middle_name = $data->middle_name ?? $user->middle_name;
        $user->last_name = $data->last_name ?? $user->last_name;
        $user->gender = $data->gender ?? $user->gender;
        $user->dob = $data->dob ?? $user->dob;
        $user->religion = $data->religion ?? $user->religion;
        $user->mobile_no = $data->mobile_no ?? $user->mobile_no;
        $user->blood_group = $data->blood_group ?? $user->blood_group;

        if ($files = $request->file('profile_image')) {
            if (file_exists(public_path() . '/user_image/' . $user->image)) {
                File::delete(public_path() . '/user_image/' . $user->image);
            }
            // Define upload path
            $destinationPath = public_path('/user_image/'); // upload path
            // Upload Orginal Image
            $file_name = $files->getClientOriginalName();
            $files->move($destinationPath, $file_name);
            $user->image = $file_name;
        }

        if ($files = $request->file('aadhaar_card_proof')) {
            if (file_exists(public_path() . '/aadhaar_card_proof/' . $user->aadhaar_card_proof)) {
                File::delete(public_path() . '/aadhaar_card_proof/' . $user->aadhaar_card_proof);
            }
            // Define upload path
            $destinationPath = public_path('/aadhaar_card_proof/'); // upload path
            // Upload Orginal Image
            $file_name = $files->getClientOriginalName();
            $files->move($destinationPath, $file_name);
            $user->aadhaar_card_proof = $file_name;
        }

        if ($files = $request->file('dob_proof')) {
            if (file_exists(public_path() . '/dob_proof/' . $user->dob_proof)) {
                File::delete(public_path() . '/dob_proof/' . $user->dob_proof);
            }
            // Define upload path
            $destinationPath = public_path('/dob_proof/'); // upload path
            // Upload Orginal Image
            $file_name = $files->getClientOriginalName();
            $files->move($destinationPath, $file_name);
            $user->dob_proof = $file_name;
        }
        if ($files = $request->file('blood_group_proof')) {
            if (file_exists(public_path() . '/dob_proof/' . $user->blood_group_proof)) {
                File::delete(public_path() . '/dob_proof/' . $user->blood_group_proof);
            }
            // Define upload path
            $destinationPath = public_path('/blood_group_proof/'); // upload path
            // Upload Orginal Image
            $file_name = $files->getClientOriginalName();
            $files->move($destinationPath, $file_name);
            $user->blood_group_proof = $file_name;
        }

        $user->update();

        if ($user->user_type_id == 3) {
            $studentDetails = StudentDetail::whereStudentId($request->user()->id)->first();
            if ($studentDetails) {
                $studentDetails->admission_date = $data->admission_date;
                $studentDetails->emergency_phone_number = $data->emergency_phone_number;
                $studentDetails->material_status = $data->material_status;

                $studentDetails->update();
            } else {
                $studentDetails = new StudentDetail();
                $studentDetails->student_id = $request->user()->id;
                $studentDetails->admission_date = $data->admission_date;
                $studentDetails->emergency_phone_number = $data->emergency_phone_number;
                $studentDetails->material_status = $data->material_status;

                $studentDetails->save();
            }
        } else {
            $member_details = MemberDetails::whereUserId($request->user()->id)->first();
            if ($member_details) {
                $member_details->date_of_joining = $data->date_of_joining ?? $member_details->date_of_joining;
                $member_details->department_id = $data->department_id ?? $member_details->department_id;
                $member_details->designation_id = $data->designation_id ?? $member_details->designation_id;
                $member_details->epf_number = $data->epf_number ?? $member_details->epf_number;
                $member_details->esi_number = $data->esi_number ?? $member_details->esi_number;
                $member_details->gross_salary = $data->gross_salary ?? $member_details->gross_salary;
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
                $member_details->pan_number = $data->pan_number ?? $member_details->pan_number;

                if ($files = $request->file('pan_proof')) {
                    if (file_exists(public_path() . '/pan_proof/' . $member_details->pan_proof)) {
                        File::delete(public_path() . '/pan_proof/' . $member_details->pan_proof);
                    }
                    // Define upload path
                    $destinationPath = public_path('/pan_proof/'); // upload path
                    // Upload Orginal Image
                    $file_name = $files->getClientOriginalName();
                    $files->move($destinationPath, $file_name);
                    $member_details->pan_proof = $file_name;
                }
                if ($files = $request->file('caste_certificate_proof')) {
                    if (file_exists(public_path() . '/caste_certificate_proof/' . $member_details->caste_certificate_proof)) {
                        File::delete(public_path() . '/caste_certificate_proof/' . $member_details->caste_certificate_proof);
                    }
                    // Define upload path
                    $destinationPath = public_path('/caste_certificate_proof/'); // upload path
                    // Upload Orginal Image
                    $file_name = $files->getClientOriginalName();
                    $files->move($destinationPath, $file_name);
                    $member_details->caste_certificate_proof = $file_name;
                }
                if ($files = $request->file('joining_letter_proof')) {
                    if (file_exists(public_path() . '/joining_letter_proof/' . $member_details->joining_letter_proof)) {
                        File::delete(public_path() . '/joining_letter_proof/' . $member_details->joining_letter_proof);
                    }
                    // Define upload path
                    $destinationPath = public_path('/joining_letter_proof/'); // upload path
                    // Upload Orginal Image
                    $file_name = $files->getClientOriginalName();
                    $files->move($destinationPath, $file_name);
                    $member_details->joining_letter_proof = $file_name;
                }

                $member_details->update();
            } else {
                $member_details = new MemberDetails();
                $member_details->user_id = $user->id;
                $member_details->date_of_joining = $data->date_of_joining;
                $member_details->department_id = $data->department_id;
                $member_details->designation_id = $data->designation_id;
                $member_details->epf_number = $data->epf_number;
                $member_details->esi_number = $data->esi_number;
                $member_details->gross_salary = $data->gross_salary;
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
                $member_details->pan_number = $data->pan_number;

                if ($files = $request->file('pan_proof')) {
                    // Define upload path
                    $destinationPath = public_path('/pan_proof/'); // upload path
                    // Upload Orginal Image
                    $file_name = $files->getClientOriginalName();
                    $files->move($destinationPath, $file_name);
                    $member_details->pan_proof = $file_name;
                }
                if ($files = $request->file('caste_certificate_proof')) {
                    // Define upload path
                    $destinationPath = public_path('/caste_certificate_proof/'); // upload path
                    // Upload Orginal Image
                    $file_name = $files->getClientOriginalName();
                    $files->move($destinationPath, $file_name);
                    $member_details->caste_certificate_proof = $file_name;
                }
                if ($files = $request->file('joining_letter_proof')) {
                    // Define upload path
                    $destinationPath = public_path('/joining_letter_proof/'); // upload path
                    // Upload Orginal Image
                    $file_name = $files->getClientOriginalName();
                    $files->move($destinationPath, $file_name);
                    $member_details->joining_letter_proof = $file_name;
                }

                $member_details->save();
            }
        }
        return response()->json(['success' => 1], 200, [], JSON_NUMERIC_CHECK);
    }


    public function update_student_own_education(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $educationQualification = EducationQualification::where('student_id', $requestedData->student_id)->first();
        $educationQualification->student_id = $requestedData->student_id;

        //10
        $educationQualification->board_ten = $requestedData->board_ten;
        $educationQualification->marks_obtained_ten = $requestedData->marks_obtained_ten;
        $educationQualification->percentage_ten = $requestedData->percentage_ten;
        $educationQualification->division_ten = $requestedData->division_ten;
        $educationQualification->main_subject_ten = $requestedData->main_subject_ten;
        $educationQualification->year_of_passing_ten = $requestedData->year_of_passing_ten;

        //12
        $educationQualification->board_twelve = $requestedData->board_twelve;
        $educationQualification->marks_obtained_twelve = $requestedData->marks_obtained_twelve;
        $educationQualification->percentage_twelve = $requestedData->percentage_twelve;
        $educationQualification->division_twelve = $requestedData->division_twelve;
        $educationQualification->main_subject_twelve = $requestedData->main_subject_twelve;
        $educationQualification->year_of_passing_twelve = $requestedData->year_of_passing_twelve;

        //Graduation
        $educationQualification->board_graduation = $requestedData->board_graduation;
        $educationQualification->marks_obtained_graduation = $requestedData->marks_obtained_graduation;
        $educationQualification->percentage_graduation = $requestedData->percentage_graduation;
        $educationQualification->division_graduation = $requestedData->division_graduation;
        $educationQualification->main_subject_graduation = $requestedData->main_subject_graduation;
        $educationQualification->year_of_passing_graduation = $requestedData->year_of_passing_graduation;

        $educationQualification->update();

        return response()->json(['success' => 1, 'data' => $educationQualification], 200, [], JSON_NUMERIC_CHECK);
    }


    public function update_member(Request $request)
    {
        $data = $request;
        $user = User::find($data->id);
        $user->identification_no = $data->identification_no;
        $user->first_name = $data->first_name;
        $user->middle_name = $data->middle_name ?? null;
        $user->last_name = $data->last_name;
        $user->gender = $data->gender;
        $user->dob = $data->dob;
        $user->category_id = $data->category_id;
        $user->religion = $data->religion;
        $user->mobile_no = $data->mobile_no;
        $user->image = $data->image ?? null;
        $user->blood_group = $data->blood_group;
        $user->user_type_id = $data->user_type_id;
        $user->franchise_id = $request->user()->franchise_id;
        $user->email = $data->email;
        $user->password = $data->password ?? $data->password;
        $user->status = $data->status ?? 1;
        $user->update();

        $member_details = MemberDetails::whereUserId($data->id)->first();
        if ($member_details) {
            $member_details->date_of_joining = $data->date_of_joining ?? $member_details->date_of_joining;
            $member_details->department_id = $data->department_id ?? $member_details->department_id;
            $member_details->designation_id = $data->designation_id ?? $member_details->designation_id;
            $member_details->epf_number = $data->epf_number ?? $member_details->epf_number;
            $member_details->esi_number = $data->esi_number ?? $member_details->esi_number;
            $member_details->gross_salary = $data->gross_salary ?? $member_details->gross_salary;
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

            if ($files = $request->file('pan_proof')) {
                if (file_exists(public_path() . '/pan_proof/' . $member_details->pan_proof)) {
                    File::delete(public_path() . '/pan_proof/' . $member_details->pan_proof);
                }
                // Define upload path
                $destinationPath = public_path('/pan_proof/'); // upload path
                // Upload Orginal Image
                $file_name = $files->getClientOriginalName();
                $files->move($destinationPath, $file_name);
                $member_details->pan_proof = $file_name;
            }
            if ($files = $request->file('caste_certificate_proof')) {
                if (file_exists(public_path() . '/caste_certificate_proof/' . $member_details->caste_certificate_proof)) {
                    File::delete(public_path() . '/caste_certificate_proof/' . $member_details->caste_certificate_proof);
                }
                // Define upload path
                $destinationPath = public_path('/caste_certificate_proof/'); // upload path
                // Upload Orginal Image
                $file_name = $files->getClientOriginalName();
                $files->move($destinationPath, $file_name);
                $member_details->caste_certificate_proof = $file_name;
            }
            if ($files = $request->file('joining_letter_proof')) {
                if (file_exists(public_path() . '/joining_letter_proof/' . $member_details->joining_letter_proof)) {
                    File::delete(public_path() . '/joining_letter_proof/' . $member_details->joining_letter_proof);
                }
                // Define upload path
                $destinationPath = public_path('/joining_letter_proof/'); // upload path
                // Upload Orginal Image
                $file_name = $files->getClientOriginalName();
                $files->move($destinationPath, $file_name);
                $member_details->joining_letter_proof = $file_name;
            }

            $member_details->update();
        } else {
            $member_details = new MemberDetails();
            $member_details->user_id = $user->id;
            $member_details->date_of_joining = $data->date_of_joining;
            $member_details->department_id = $data->department_id;
            $member_details->designation_id = $data->designation_id;
            $member_details->epf_number = $data->epf_number;
            $member_details->esi_number = $data->esi_number;
            $member_details->gross_salary = $data->gross_salary;
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

            if ($files = $request->file('pan_proof')) {
                // Define upload path
                $destinationPath = public_path('/pan_proof/'); // upload path
                // Upload Orginal Image
                $file_name = $files->getClientOriginalName();
                $files->move($destinationPath, $file_name);
                $member_details->pan_proof = $file_name;
            }
            if ($files = $request->file('caste_certificate_proof')) {
                // Define upload path
                $destinationPath = public_path('/caste_certificate_proof/'); // upload path
                // Upload Orginal Image
                $file_name = $files->getClientOriginalName();
                $files->move($destinationPath, $file_name);
                $member_details->caste_certificate_proof = $file_name;
            }
            if ($files = $request->file('joining_letter_proof')) {
                // Define upload path
                $destinationPath = public_path('/joining_letter_proof/'); // upload path
                // Upload Orginal Image
                $file_name = $files->getClientOriginalName();
                $files->move($destinationPath, $file_name);
                $member_details->joining_letter_proof = $file_name;
            }

            $member_details->save();
        }

        return response()->json(['success' => 1, 'data' => new MemberResource($user)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function get_student_by_date(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $startDate = $requestedData->from_date;
        $endDate = $requestedData->to_date;

        $users = User::join('student_details', 'users.id', '=', 'student_details.student_id')
            ->whereBetween('admission_date', [$startDate, $endDate])
            ->whereAdmissionStatus(1)
            ->get();
        return response()->json(['success' => 1, 'data' => StudentResource::collection($users)], 200, [], JSON_NUMERIC_CHECK);
    }
}
