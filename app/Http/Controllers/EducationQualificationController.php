<?php

namespace App\Http\Controllers;

use App\Models\EducationQualification;
use App\Http\Requests\StoreEducationQualificationRequest;
use App\Http\Requests\UpdateEducationQualificationRequest;
use Illuminate\Http\Request;

class EducationQualificationController extends Controller
{
    public function search_education_qualification($student_id)
    {
        $educationQualification = EducationQualification::whereStudentId($student_id)->first();
        return response()->json(['success'=>1,'data'=>$educationQualification], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_education_qualification(Request $request)
    {
        $educationQualification = new EducationQualification();
        $educationQualification->student_id = $request['student_id'];

        //10
        $educationQualification->board_ten = $request['board_ten'];
        $educationQualification->marks_obtained_ten = $request['marks_obtained_ten'];
        $educationQualification->percentage_ten = $request['percentage_ten'];
        $educationQualification->division_ten = $request['division_ten'];
        $educationQualification->main_subject_ten = $request['main_subject_ten'];
        $educationQualification->year_of_passing_ten = $request['year_of_passing_ten'];

        if ($files = $request->file('file_ten')) {
            // Define upload path
            $destinationPath = public_path('/student_education/'); // upload path
            // Upload Orginal Image
            $file_name = $files->getClientOriginalName();
            $files->move($destinationPath, $file_name);
            $educationQualification->file_ten = $file_name;
        }

        //12
        $educationQualification->board_twelve = $request['board_twelve'];
        $educationQualification->marks_obtained_twelve = $request['marks_obtained_twelve'];
        $educationQualification->percentage_twelve = $request->['percentage_twelve'];
        $educationQualification->division_twelve = $request['division_twelve'];
        $educationQualification->main_subject_twelve = $request['main_subject_twelve'];
        $educationQualification->year_of_passing_twelve = $request['year_of_passing_twelve'];

        if ($files = $request->file('file_twelve')) {
            // Define upload path
            $destinationPath = public_path('/student_education/'); // upload path
            // Upload Orginal Image
            $file_name = $files->getClientOriginalName();
            $files->move($destinationPath, $file_name);
            $educationQualification->file_twelve = $file_name;
        }

        //Graduation
        $educationQualification->board_graduation = $request['board_graduation'];
        $educationQualification->marks_obtained_graduation = $request['marks_obtained_graduation'];
        $educationQualification->percentage_graduation = $request['percentage_graduation'];
        $educationQualification->division_graduation = $request['division_graduation'];
        $educationQualification->main_subject_graduation = $request['main_subject_graduation'];
        $educationQualification->year_of_passing_graduation = $request['year_of_passing_graduation'];

        if ($files = $request->file('file_graduation')) {
            // Define upload path
            $destinationPath = public_path('/student_education/'); // upload path
            // Upload Orginal Image
            $file_name = $files->getClientOriginalName();
            $files->move($destinationPath, $file_name);
            $educationQualification->file_graduation = $file_name;
        }

        $educationQualification->save();

        return response()->json(['success'=>1,'data'=>$educationQualification], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_education_qualification(Request $request)
    {

        $requestedData = (object)$request->json()->all();

        $educationQualification = EducationQualification::find($requestedData->id);
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

        return response()->json(['success'=>1,'data'=>$educationQualification], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_education_qualification($id)
    {
        $educationQualification = EducationQualification::find($id);
        $educationQualification->delete();
        return response()->json(['success'=>1,'data'=>$educationQualification], 200,[],JSON_NUMERIC_CHECK);
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
