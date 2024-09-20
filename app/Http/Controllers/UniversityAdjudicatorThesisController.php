<?php

namespace App\Http\Controllers;

use App\Http\Resources\UniversityAdjudicatorThesisResource;
use App\Models\UniversityAdjudicatorThesis;
use Illuminate\Http\Request;

class UniversityAdjudicatorThesisController extends Controller
{
    public function get_university_adjudicator()
    {
        $universityAdjudicator = UniversityAdjudicatorThesis::get();
        return response()->json(['success' => 1, 'data' =>UniversityAdjudicatorThesisResource::collection($universityAdjudicator)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_university_adjudicator(Request $request)
    {
        $universityAdjudicator = new UniversityAdjudicatorThesis();
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

        return response()->json(['success' => 1, 'data' =>new UniversityAdjudicatorThesisResource($universityAdjudicator) , 'message' => 'Saved successfully'], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_university_adjudicator(Request $request)
    {
        $universityAdjudicator = UniversityAdjudicatorThesis::find($request['id']);
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

        return response()->json(['success' => 1, 'data' =>new UniversityAdjudicatorThesisResource($universityAdjudicator) , 'message' => 'Updated successfully'], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_university_adjudicator($id)
    {
        $universityAdjudicator = UniversityAdjudicatorThesis::find($id);
        $universityAdjudicator->delete();
        return response()->json(['success' => 1, 'data' =>new UniversityAdjudicatorThesisResource($universityAdjudicator) , 'message' => 'Deleted successfully'], 200, [], JSON_NUMERIC_CHECK);
    }

}
