<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Certificate;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Models\CertificateTypes;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CertificateController extends Controller
{

    public function get_certificates()
    {
        $certificates = Certificate::get();
        return response()->json(['success'=>1,'data'=>$certificates], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_certificates(Request $request)
    {
        if($request['id'] === 'null'){
            $certificates = new Certificate();
            $certificates->course_id = $request['course_id'];
            $certificates->semester_id = $request['semester_id'];
            $certificates->session_id = $request['session_id'];
            $certificates->certificate_type_id = $request['certificate_type_id'];
            $certificates->user_id = $request['user_id'];
            $certificates->file_name = $request['file_name'];
            $certificates->status = 'Uploaded on '. Carbon::now()->format('Y-m-d');
            $certificates->save();

            if ($files = $request->file('file')) {
                // Define upload path
                $destinationPath = public_path('/certificate/'); // upload path
                // Upload Orginal Image
                $fileName = $files->getClientOriginalName();
                $files->move($destinationPath, $fileName);
            }
        }else{
            $certificates = Certificate::find($request['id']);
            if (file_exists(public_path() . '/certificate/' . $certificates->file_name)) {
                File::delete(public_path() . '/certificate/' . $certificates->file_name);
            }
            $certificates->course_id = $request['course_id'];
            $certificates->semester_id = $request['semester_id'];
            $certificates->session_id = $request['session_id'];
            $certificates->certificate_type_id = $request['certificate_type_id'];
            $certificates->user_id = $request['user_id'];
            $certificates->file_name = $request['file_name'];
            $certificates->status = 'Re-uploaded on '. Carbon::now()->format('Y-m-d');
            $certificates->update();
            if ($files = $request->file('file')) {
                // Define upload path
                $destinationPath = public_path('/certificate/'); // upload path
                // Upload Orginal Image
                $fileName = $files->getClientOriginalName();
                $files->move($destinationPath, $fileName);
            }
        }


        return response()->json(['success'=>1,'data'=>$certificates], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_certificates(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $certificates->course_id = $request['course_id'];
        $certificates->semester_id = $request['semester_id'];
        $certificates->session_id = $request['session_id'];
        $certificates->certificate_type_id = $request['certificate_type_id'];
        $certificates->user_id = $request['user_id'];
        $certificates->file_name = $request['file_name'];
        $certificates->status = 'Re-uploaded on '. Carbon::now()->format('Y-m-d');
        $certificates->update();

        if (file_exists(public_path() . '/certificate/' . $certificates->file_name)) {
            File::delete(public_path() . '/certificate/' . $certificates->file_name);
        }

        return response()->json(['success'=>1,'data'=>$certificates], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_certificates($id)
    {
        $certificates = Certificate::find($id);
        $certificates->delete();
        return response()->json(['success'=>1,'data'=>$certificates], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_student_for_certificate(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $user_id= [];

        $data = User::select('student_details.id as student_details_id','certificates.id as certificate_id'
            ,'users.id','users.first_name','users.middle_name','users.last_name','users.gender','users.mobile_no'
            ,'users.dob','certificates.file_name','certificates.status')
            ->leftjoin('student_details', 'users.id', '=', 'student_details.student_id')
            ->join('certificates', 'users.id', '=', 'certificates.user_id')
            ->whereUserTypeId(3)
            ->where('student_details.course_id',$requestedData->course_id)
            ->where('student_details.semester_id',$requestedData->semester_id)
            ->where('student_details.session_id',$requestedData->session_id)
            ->where('certificates.certificate_type_id',$requestedData->certificate_type_id)
            ->get();

        foreach ($data as $temp){
            $user_id[] = $temp['id'];
        }

        $data2 = User::select('student_details.id as student_details_id'
            ,'users.id','users.first_name','users.middle_name','users.last_name','users.gender','users.mobile_no'
            ,'users.dob','certificates.file_name')
            ->leftjoin('student_details', 'users.id', '=', 'student_details.student_id')
            ->leftjoin('certificates', 'users.id', '=', 'certificates.user_id')
            ->whereUserTypeId(3)
            ->where('student_details.course_id',$requestedData->course_id)
            ->where('student_details.semester_id',$requestedData->semester_id)
            ->where('student_details.session_id',$requestedData->session_id)
            ->whereNotIn('users.id',$user_id)
            ->get();

        $data3 = $data->merge($data2);

        return response()->json(['success'=>1,'data'=> $data3], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCertificateRequest $request, Certificate $certificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        //
    }
}
