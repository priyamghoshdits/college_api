<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubjectDetailsResource;
use App\Models\SubjectDetails;
use App\Http\Requests\StoreSubjectDetailsRequest;
use App\Http\Requests\UpdateSubjectDetailsRequest;
use Illuminate\Http\Request;

class SubjectDetailsController extends Controller
{
    public function get_subject_details(Request $request)
    {
        $data = SubjectDetails::whereFranchiseId($request->user()->franchise_id)->get();
        return response()->json(['success'=>1,'data'=>SubjectDetailsResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_subject_details(Request $request)
    {
        $requestedData = (object)$request->json()->all();
//        return response()->json(['success'=>5,'data'=>$requestedData], 200,[],JSON_NUMERIC_CHECK);
        $data = new SubjectDetails();
        $data->name = $requestedData->name;
        $data->subject_id = $requestedData->subject_id;
        $data->course_id  = $requestedData->course_id ;
        $data->semester_id  = $requestedData->semester_id ;
        $data->session_id  = $requestedData->session_id ;
        $data->exam_date = $requestedData->exam_date;
        $data->publish_date = $requestedData->publish_date;
        $data->time_from = $requestedData->time_from;
        $data->time_to = $requestedData->time_to;
        $data->full_marks = $requestedData->full_marks;
        $data->franchise_id =  $request->user()->franchise_id;
        $data->save();
        return response()->json(['success'=>1,'data'=>new SubjectDetailsResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_subject_details($id)
    {
        $data = SubjectDetails::find($id);
        $data->delete();
        return response()->json(['success'=>1,'data'=>new SubjectDetailsResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_subject_details(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = SubjectDetails::find($requestedData->id);
        $data->name = $requestedData->name;
        $data->subject_id = $requestedData->subject_id;
        $data->course_id  = $requestedData->course_id ;
        $data->semester_id  = $requestedData->semester_id ;
        $data->session_id  = $requestedData->session_id ;
        $data->publish_date = $requestedData->publish_date;
        $data->exam_date = $requestedData->exam_date;
        $data->full_marks = $requestedData->full_marks;
        $data->time_from = $requestedData->time_from;
        $data->time_to = $requestedData->time_to;
        $data->update();
        return response()->json(['success'=>1,'data'=>new SubjectDetailsResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubjectDetails $subjectDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectDetailsRequest $request, SubjectDetails $subjectDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubjectDetails $subjectDetails)
    {
        //
    }
}
