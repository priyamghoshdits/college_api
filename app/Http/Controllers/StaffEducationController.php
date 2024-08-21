<?php

namespace App\Http\Controllers;

use App\Http\Resources\StaffEducationResource;
use App\Models\StaffEducation;
use App\Models\User;
use Illuminate\Http\Request;

class StaffEducationController extends Controller
{
    public function get_staff_education($staff_id = null)
    {
        if ($staff_id) {
            $staff_education = StaffEducation::where('staff_id', $staff_id)->get();
        } else {
            $staff_education = StaffEducation::get();
        }
        return response()->json(['success' => 1, 'data' => StaffEducationResource::collection($staff_education)], 200);
    }

    public function save_staff_education_file(Request $request)
    {
        $file_name = '';
        if ($files = $request->file('file_name')) {
            $destinationPath = public_path('/staff_education/');
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $file_name = $files->getClientOriginalName();
        }
        return response()->json(['success' => 1, 'file_name' => $file_name], 200);
    }

    public function save_staff_education(Request $request)
    {
        foreach ($request['staff_education_array'] as $list) {
            $data = new StaffEducation();
            $data->staff_id = $list['staff_id'];
            $data->degree = $list['degree'];
            $data->specialization = $list['specialization'];
            $data->university_name = $list['university_name'];
            $data->percentage = $list['percentage'];
            $data->grade = $list['grade'];
            $data->file_name = $list['file_name'];
            $data->save();
        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_staff_education_own(Request $request)
    {
        $staff = StaffEducation::find($request['id']);

        if ($staff) {
            $staff->degree = $request['degree'];
            $staff->specialization = $request['specialization'];
            $staff->university_name = $request['university_name'];
            $staff->percentage = $request['percentage'];
            $staff->grade = $request['grade'];

            if ($files = $request->file('file_name')) {
                $destinationPath = public_path('/staff_education/');
                $profileImage1 = $files->getClientOriginalName();
                $files->move($destinationPath, $profileImage1);
                $file_name = $files->getClientOriginalName();
                $staff->file_name = $file_name;
            }

            $staff->update();
        } else {
            $data = new StaffEducation();
            $data->staff_id = $request->user()->id;
            $data->degree = $request['degree'];
            $data->specialization = $request['specialization'];
            $data->university_name = $request['university_name'];
            $data->percentage = $request['percentage'];
            $data->grade = $request['grade'];

            if ($files = $request->file('file_name')) {
                $destinationPath = public_path('/staff_education/');
                $profileImage1 = $files->getClientOriginalName();
                $files->move($destinationPath, $profileImage1);
                $file_name = $files->getClientOriginalName();
                $data->file_name = $file_name;
            }

            $data->save();
        }

        $educations = StaffEducation::whereStaffId($request->user()->id)->get();
        return response()->json(['success' => 1, 'data' => null, 'educations' => StaffEducationResource::collection($educations)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_staff_education(Request $request)
    {
        foreach ($request['staff_education_array'] as $list) {

            $staff_education = StaffEducation::find($list['id']);
            if (!$staff_education) {
                $data = new StaffEducation();
                $data->staff_id = $list['staff_id'];
                $data->degree = $list['degree'];
                $data->specialization = $list['specialization'];
                $data->university_name = $list['university_name'];
                $data->percentage = $list['percentage'];
                $data->grade = $list['grade'];
                $data->file_name = $list['file_name'];
                $data->save();
            } else {
                $staff_education->staff_id = $list['staff_id'];
                $staff_education->degree = $list['degree'];
                $staff_education->specialization = $list['specialization'];
                $staff_education->university_name = $list['university_name'];
                $staff_education->percentage = $list['percentage'];
                $staff_education->grade = $list['grade'];
                $staff_education->file_name = $list['file_name'];
                $staff_education->update();
            }
        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_staff_education($id)
    {
        $staff_education = StaffEducation::find($id);
        $staff_education->delete();

        $staff_education_data = StaffEducation::get();
        return response()->json(['success' => 1, 'data' => StaffEducationResource::collection($staff_education_data)], 200);
    }

    public function save_staff_education_app(Request $request)
    {
        $data = $request->json()->all();
//        return $data;
        foreach ($data as $list) {
//            return $list['staff_id'];
            if($list['id'] != null){
                $staffEducation = StaffEducation::find($list['id']);
                $staffEducation->staff_id = $list['staff_id'];
                $staffEducation->degree = $list['degree'];
                $staffEducation->specialization = $list['specialization'];
                $staffEducation->university_name = $list['university_name'];
                $staffEducation->percentage = $list['percentage'];
                $staffEducation->grade = $list['grade'];
                $staffEducation->file_name = $list['file_name'];
                $staffEducation->update();
            }else{
                $staffEducation = new StaffEducation();
                $staffEducation->staff_id = $list['staff_id'];
                $staffEducation->degree = $list['degree'];
                $staffEducation->specialization = $list['specialization'];
                $staffEducation->university_name = $list['university_name'];
                $staffEducation->percentage = $list['percentage'];
                $staffEducation->grade = $list['grade'];
                $staffEducation->file_name = $list['file_name'];
                $staffEducation->save();
            }

        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }
}
