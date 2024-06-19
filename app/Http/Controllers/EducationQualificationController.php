<?php

namespace App\Http\Controllers;

use App\Models\EducationQualification;
use App\Http\Requests\StoreEducationQualificationRequest;
use App\Http\Requests\UpdateEducationQualificationRequest;
use Illuminate\Http\Request;

class EducationQualificationController extends Controller
{
    public function get_education_qualification()
    {
        $educationQualification = EducationQualification::get();
        return response()->json(['success'=>1,'data'=>$educationQualification], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_education_qualification(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $educationQualification = new EducationQualification();
        $educationQualification->user_id = $requestedData->user_id;
        $educationQualification->class = $requestedData->class;
        $educationQualification->board = $requestedData->board;
        $educationQualification->marks_obtain = $requestedData->marks_obtain;
        $educationQualification->percentage = $requestedData->percentage;
        $educationQualification->division = $requestedData->division;
        $educationQualification->main_subject = $requestedData->main_subject;
        $educationQualification->year_of_passing = $requestedData->year_of_passing;
        $educationQualification->save();

        return response()->json(['success'=>1,'data'=>$educationQualification], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_education_qualification(StoreEducationQualificationRequest $request)
    {
        $requestedData = (object)$request->json()->all();
        $educationQualification = EducationQualification::find($requestedData->id);
        $educationQualification->user_id = $requestedData->user_id;
        $educationQualification->class = $requestedData->class;
        $educationQualification->board = $requestedData->board;
        $educationQualification->marks_obtain = $requestedData->marks_obtain;
        $educationQualification->percentage = $requestedData->percentage;
        $educationQualification->division = $requestedData->division;
        $educationQualification->main_subject = $requestedData->main_subject;
        $educationQualification->year_of_passing = $requestedData->year_of_passing;
        $educationQualification->save();

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
