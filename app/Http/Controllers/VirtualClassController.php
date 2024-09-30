<?php

namespace App\Http\Controllers;

use App\Http\Resources\VirtualClassResource;
use App\Models\VirtualClass;
use App\Http\Requests\StoreVirtualClassRequest;
use App\Http\Requests\UpdateVirtualClassRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VirtualClassController extends Controller
{
    public function get_virtual_class()
    {
        $virtualClass = VirtualClass::orderBy('date_of_class','desc')->get();
        return response()->json(['success'=>1,'data'=> VirtualClassResource::collection($virtualClass)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_virtual_class(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $virtualClass = new VirtualClass();
        $virtualClass->course_id = $requestedData->course_id;
        $virtualClass->semester_id = $requestedData->semester_id;
        $virtualClass->subject_id = $requestedData->subject_id;
        $virtualClass->teacher_id = $requestedData->teacher_id;
        $virtualClass->topic = $requestedData->topic;
        $virtualClass->platform = $requestedData->platform;
        $virtualClass->link = $requestedData->link;
        $virtualClass->date_of_class = $requestedData->date_of_class;
        $virtualClass->time_of_class = $requestedData->time_of_class;
        $virtualClass->class_start_before = $requestedData->class_start_before;
        $virtualClass->class_duration = $requestedData->class_duration;
        $virtualClass->save();
        return response()->json(['success'=>1,'data'=> new VirtualClassResource($virtualClass)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_virtual_class(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $virtualClass = VirtualClass::find($requestedData->id);
        $virtualClass->course_id = $requestedData->course_id;
        $virtualClass->semester_id = $requestedData->semester_id;
        $virtualClass->subject_id = $requestedData->subject_id;
        $virtualClass->teacher_id = $requestedData->teacher_id;
        $virtualClass->topic = $requestedData->topic;
        $virtualClass->platform = $requestedData->platform;
        $virtualClass->link = $requestedData->link;
        $virtualClass->date_of_class = $requestedData->date_of_class;
        $virtualClass->time_of_class = $requestedData->time_of_class;
        $virtualClass->class_start_before = $requestedData->class_start_before;
        $virtualClass->class_duration = $requestedData->class_duration;
        $virtualClass->save();
        return response()->json(['success'=>1,'data'=> new VirtualClassResource($virtualClass)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_virtual_class($id)
    {
        $virtualClass = VirtualClass::find($id);
        $virtualClass->delete();
        return response()->json(['success'=>1,'data'=> new VirtualClassResource($virtualClass)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_Virtual_class_report(Request $request)
    {
        $requested_data = (object)$request->json()->all();
        $return_data = DB::select("select * from virtual_classes WHERE date(date_of_class) > ? and date(date_of_class) < ?;",[$requested_data->from_date, $requested_data->to_date]);

        return response()->json(['success'=>1,'data'=>VirtualClassResource::collection($return_data)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVirtualClassRequest $request, VirtualClass $virtualClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VirtualClass $virtualClass)
    {
        //
    }
}
