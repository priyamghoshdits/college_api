<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentEducationResource;
use App\Models\EducationQualification;
use App\Http\Requests\StoreEducationQualificationRequest;
use App\Http\Requests\UpdateEducationQualificationRequest;
use App\Models\StudentEducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EducationQualificationController extends Controller
{
    public function search_education_qualification($student_id)
    {
        $educationQualification = EducationQualification::whereStudentId($student_id)->get();
        return response()->json(['success' => 1, 'data' => StudentEducationResource::collection($educationQualification)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_student_education_file(Request $request)
    {
        $file_name = '';
        if ($files = $request->file('file_name')) {
            $destinationPath = public_path('/student_education/');
//            $profileImage1 = uniqid() . '_' . date('Ymd_His') . '_' . $files->getClientOriginalName();
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $file_name = $profileImage1;
        }
        return response()->json(['success' => 1, 'file_name' => $file_name], 200);
    }

    public function save_education_qualification(Request $request)
    {
        foreach ($request['student_education_array'] as $list) {
            $data = new EducationQualification();
            $data->student_id = $list['student_id'];
            $data->degree_id = $list['degree_id'];
            $data->university_name = $list['university_name'];
            $data->total_marks = $list['total_marks'];
            $data->total_marks_obtained = $list['total_marks_obtained'];
            $data->specialization = $list['specialization'];
            $data->year_of_passing = $list['year_of_passing'];
            $data->division = $list['division'];
            $data->grade = $list['grade'];
            $data->percentage = $list['percentage'];
            $data->year_sem = $list['year_sem'];
            $data->file_name = $list['file_name'] ?? null;
            $data->save();
        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }


    public function update_education_qualification(Request $request)
    {
        foreach ($request['student_education_array'] as $list) {
            $data = EducationQualification::find($list['id']);
            $data->student_id = $list['student_id'];
            $data->degree_id = $list['degree_id'];
            $data->university_name = $list['university_name'];
            $data->total_marks = $list['total_marks'];
            $data->total_marks_obtained = $list['total_marks_obtained'];
            $data->specialization = $list['specialization'];
            $data->year_of_passing = $list['year_of_passing'];
            $data->division = $list['division'];
            $data->grade = $list['grade'];
            $data->percentage = $list['percentage'];
            $data->year_sem = $list['year_sem'];
            $data->file_name = $list['file_name'] ?? $data->file_name;
            $data->update();
        }

//        $requestedData = (object)$request->json()->all();

//        $educationQualification = EducationQualification::find($request['id']);
//        $educationQualification->student_id = $request['student_id'];
//
//        //10
//        $educationQualification->board_ten = $request['board_ten'];
//        $educationQualification->marks_obtained_ten = $request['marks_obtained_ten'];
//        $educationQualification->percentage_ten = $request['percentage_ten'];
//        $educationQualification->division_ten = $request['division_ten'];
//        $educationQualification->main_subject_ten = $request['main_subject_ten'];
//        $educationQualification->year_of_passing_ten = $request['year_of_passing_ten'];
//
//        if ($files = $request->file('file_ten')) {
//            if (file_exists(public_path() . '/student_education/' . $educationQualification->file_ten)) {
//                File::delete(public_path() . '/student_education/' . $educationQualification->file_ten);
//            }
//            // Define upload path
//            $destinationPath = public_path('/student_education/'); // upload path
//            // Upload Orginal Image
//            $file_name = $files->getClientOriginalName();
//            $files->move($destinationPath, $file_name);
//            $educationQualification->file_ten = $file_name;
//        }
//
//        //12
//        $educationQualification->board_twelve = $request['board_twelve'];
//        $educationQualification->marks_obtained_twelve = $request['marks_obtained_twelve'];
//        $educationQualification->percentage_twelve = $request['percentage_twelve'];
//        $educationQualification->division_twelve = $request['division_twelve'];
//        $educationQualification->main_subject_twelve = $request['main_subject_twelve'];
//        $educationQualification->year_of_passing_twelve = $request['year_of_passing_twelve'];
//
//        if ($files = $request->file('file_twelve')) {
//            if (file_exists(public_path() . '/student_education/' . $educationQualification->file_twelve)) {
//                File::delete(public_path() . '/student_education/' . $educationQualification->file_twelve);
//            }
//            // Define upload path
//            $destinationPath = public_path('/student_education/'); // upload path
//            // Upload Orginal Image
//            $file_name = $files->getClientOriginalName();
//            $files->move($destinationPath, $file_name);
//            $educationQualification->file_twelve = $file_name;
//        }
//
//        //Graduation
//        $educationQualification->board_graduation = $request['board_graduation'];
//        $educationQualification->marks_obtained_graduation = $request['marks_obtained_graduation'];
//        $educationQualification->percentage_graduation = $request['percentage_graduation'];
//        $educationQualification->division_graduation = $request['division_graduation'];
//        $educationQualification->main_subject_graduation = $request['main_subject_graduation'];
//        $educationQualification->year_of_passing_graduation = $request['year_of_passing_graduation'];
//
//        if ($files = $request->file('file_graduation')) {
//            if (file_exists(public_path() . '/student_education/' . $educationQualification->file_graduation)) {
//                File::delete(public_path() . '/student_education/' . $educationQualification->file_graduation);
//            }
//            // Define upload path
//            $destinationPath = public_path('/student_education/'); // upload path
//            // Upload Orginal Image
//            $file_name = $files->getClientOriginalName();
//            $files->move($destinationPath, $file_name);
//            $educationQualification->file_graduation = $file_name;
//        }
//
//        $educationQualification->update();

        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_education_qualification($id)
    {
        $educationQualification = EducationQualification::find($id);
        if (file_exists(public_path() . '/student_education/' . $educationQualification->file_ten)) {
            File::delete(public_path() . '/student_education/' . $educationQualification->file_ten);
        }
        if (file_exists(public_path() . '/student_education/' . $educationQualification->file_twelve)) {
            File::delete(public_path() . '/student_education/' . $educationQualification->file_twelve);
        }
        if (file_exists(public_path() . '/student_education/' . $educationQualification->file_graduation)) {
            File::delete(public_path() . '/student_education/' . $educationQualification->file_graduation);
        }
        $educationQualification->delete();
        return response()->json(['success' => 1, 'data' => $educationQualification], 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EducationQualification $educationQualification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEducationQualificationRequest $request, EducationQualification $educationQualification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EducationQualification $educationQualification)
    {
        //
    }
}
