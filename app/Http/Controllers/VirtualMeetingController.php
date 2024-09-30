<?php

namespace App\Http\Controllers;

use App\Http\Resources\VirtualClassResource;
use App\Http\Resources\VirtualMeetingResource;
use App\Models\VirtualMeeting;
use App\Http\Requests\StoreVirtualMeetingRequest;
use App\Http\Requests\UpdateVirtualMeetingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VirtualMeetingController extends Controller
{
    public function get_virtual_meeting()
    {
        $virtualMeeting = VirtualMeeting::get();
        return response()->json(['success'=>1,'data'=>VirtualMeetingResource::collection($virtualMeeting)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_virtual_meeting(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $virtualMeeting = new VirtualMeeting();
        $virtualMeeting->user_type_id = $requestedData->user_type_id;
        $virtualMeeting->topic = $requestedData->topic;
        $virtualMeeting->platform = $requestedData->platform;
        $virtualMeeting->link = $requestedData->link;
        $virtualMeeting->date_of_meeting = $requestedData->date_of_meeting;
        $virtualMeeting->time_of_meeting = $requestedData->time_of_meeting;
        $virtualMeeting->meeting_duration = $requestedData->meeting_duration;
        $virtualMeeting->meeting_start_before = $requestedData->meeting_start_before;
        $virtualMeeting->save();

        return response()->json(['success'=>1,'data'=>new VirtualMeetingResource($virtualMeeting)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_virtual_meeting(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $virtualMeeting = VirtualMeeting::find($requestedData->id);
        $virtualMeeting->user_type_id = $requestedData->user_type_id;
        $virtualMeeting->topic = $requestedData->topic;
        $virtualMeeting->platform = $requestedData->platform;
        $virtualMeeting->link = $requestedData->link;
        $virtualMeeting->date_of_meeting = $requestedData->date_of_meeting;
        $virtualMeeting->time_of_meeting = $requestedData->time_of_meeting;
        $virtualMeeting->meeting_duration = $requestedData->meeting_duration;
        $virtualMeeting->meeting_start_before = $requestedData->meeting_start_before;
        $virtualMeeting->update();

        return response()->json(['success'=>1,'data'=> new VirtualMeetingResource($virtualMeeting)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_virtual_meeting($id)
    {
        $virtualMeeting = VirtualMeeting::find($id);
        $virtualMeeting->delete();
        return response()->json(['success'=>1,'data'=> new VirtualMeetingResource($virtualMeeting)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_Virtual_meeting_report(Request $request)
    {
        $requested_data = (object)$request->json()->all();
        $return_data = DB::select("select * from virtual_meetings WHERE date(date_of_meeting) > ? and date(date_of_meeting) < ?;",[$requested_data->from_date, $requested_data->to_date]);

        return response()->json(['success'=>1,'data'=>VirtualMeetingResource::collection($return_data)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVirtualMeetingRequest $request, VirtualMeeting $virtualMeeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VirtualMeeting $virtualMeeting)
    {
        //
    }
}
