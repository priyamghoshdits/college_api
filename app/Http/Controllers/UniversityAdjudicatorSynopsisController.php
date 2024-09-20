<?php

namespace App\Http\Controllers;

use App\Http\Resources\UniversityAdjudicatorResource;
use App\Models\UniversityAdjudicatorSynopsis;
use App\Http\Requests\StoreUniversityAdjudicatorSynopsisRequest;
use App\Http\Requests\UpdateUniversityAdjudicatorSynopsisRequest;
use Illuminate\Http\Request;

class UniversityAdjudicatorSynopsisController extends Controller
{
    public function get_university_adjudicator()
    {
        $universityAdjudicator = UniversityAdjudicatorSynopsis::get();
        return response()->json(['success' => 1, 'data' =>UniversityAdjudicatorResource::collection($universityAdjudicator)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_university_adjudicator(Request $request)
    {
        $universityAdjudicator = new UniversityAdjudicatorSynopsis();
        $universityAdjudicator->course_name = $request['course_name'];
        $universityAdjudicator->student_name = $request['student_name'];
        $universityAdjudicator->thesis_type_id = $request['thesis_type_id'];
        $universityAdjudicator->institute_name = $request['institute_name'];
        $universityAdjudicator->title = $request['title'];
        $universityAdjudicator->date_of_evaluation = $request['date_of_evaluation'];
        $universityAdjudicator->reference_no = $request['reference_no'];
        $universityAdjudicator->name_of_university = $request['name_of_university'];
        $universityAdjudicator->date = $request['date'];
        $universityAdjudicator->guide = $request['guide'];
        $universityAdjudicator->co_guide = $request['co_guide'];
        $universityAdjudicator->save();

        return response()->json(['success' => 1, 'data' =>new UniversityAdjudicatorResource($universityAdjudicator) , 'message' => 'Saved successfully'], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_university_adjudicator(Request $request)
    {
        $universityAdjudicator = UniversityAdjudicatorSynopsis::find($request['id']);
        $universityAdjudicator->course_name = $request['course_name'];
        $universityAdjudicator->student_name = $request['student_name'];
        $universityAdjudicator->thesis_type_id = $request['thesis_type_id'];
        $universityAdjudicator->institute_name = $request['institute_name'];
        $universityAdjudicator->title = $request['title'];
        $universityAdjudicator->date_of_evaluation = $request['date_of_evaluation'];
        $universityAdjudicator->reference_no = $request['reference_no'];
        $universityAdjudicator->name_of_university = $request['name_of_university'];
        $universityAdjudicator->date = $request['date'];
        $universityAdjudicator->guide = $request['guide'];
        $universityAdjudicator->co_guide = $request['co_guide'];
        $universityAdjudicator->update();

        return response()->json(['success' => 1, 'data' =>new UniversityAdjudicatorResource($universityAdjudicator) , 'message' => 'Updated successfully'], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_university_adjudicator($id)
    {
        $universityAdjudicator = UniversityAdjudicatorSynopsis::find($id);
        $universityAdjudicator->delete();
        return response()->json(['success' => 1, 'data' =>new UniversityAdjudicatorResource($universityAdjudicator) , 'message' => 'Deleted successfully'], 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UniversityAdjudicatorSynopsis $universityAdjudicatorSynopsis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUniversityAdjudicatorSynopsisRequest $request, UniversityAdjudicatorSynopsis $universityAdjudicatorSynopsis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UniversityAdjudicatorSynopsis $universityAdjudicatorSynopsis)
    {
        //
    }
}
