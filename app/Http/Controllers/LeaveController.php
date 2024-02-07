<?php

namespace App\Http\Controllers;

use App\Http\Resources\LeaveResource;
use App\Models\Leave;
use App\Http\Requests\StoreLeaveRequest;
use App\Http\Requests\UpdateLeaveRequest;
use App\Models\LeaveList;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function save_leave(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $leave = new Leave();
        $leave->user_id = $requestedData->user_id;
        $leave->leave_type_id = $requestedData->leave_type_id;
        $leave->from_date = $requestedData->from_date;
        $leave->to_date = $requestedData->to_date;
        $leave->reason = $requestedData->reason;
        $leave->total_days = $requestedData->total_days;
        $leave->approved = 0;
        $leave->save();

        $data = LeaveList::whereLeaveTypeId($requestedData->leave_type_id)->whereUserId($requestedData->user_id)->first();
        $data->total_leave = $data->total_leave - $requestedData->total_days;
        $data->update();

        return response()->json(['success'=>1,'data'=>new LeaveResource($leave)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_leave_details()
    {
        $leave =Leave::orderBy('id', 'DESC')->get();
        return response()->json(['success'=>1,'data'=>LeaveResource::collection($leave)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_leave($id)
    {
        $leave = Leave::find($id);
        $leaveList = LeaveList::whereUserId($leave->user_id)->whereLeaveTypeId($leave->leave_type_id)->first();
        $leaveList->total_leave = $leaveList->total_leave + $leave->total_days;
        $leaveList->update();
        $leave->delete();
        return response()->json(['success'=>1,'data'=>$leave], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_leave(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $leave = Leave::find($requestedData->id);
        $leave->user_id = $requestedData->user_id;
        $leave->leave_type_id = $requestedData->leave_type_id;
        $leave->from_date = $requestedData->from_date;
        $leave->to_date = $requestedData->to_date;
        $leave->reason = $requestedData->reason;
        $leave->total_days = $requestedData->total_days;
        $leave->update();

        return response()->json(['success'=>1,'data'=>$leave], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_leave_by_userId_and_leaveTypeId($user_id, $leave_type_id)
    {
        $data = LeaveList::whereUserId($user_id)
            ->whereLeaveTypeId($leave_type_id)
            ->first();

        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_approval($id, $status)
    {
        if($status == 2){
            $data = Leave::find($id);
            $leaveList = LeaveList::whereUserId($data->user_id)->whereLeaveTypeId($data->leave_type_id)->first();
            $leaveList->total_leave = $leaveList->total_leave + $data->total_days;
            $leaveList->update();
            $data->approved = $status;
            $data->update();
        }
        $data = Leave::find($id);
        $data->approved = $status;
        $data->update();
        return response()->json(['success'=>1,'data'=>new LeaveResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        //
    }
}
