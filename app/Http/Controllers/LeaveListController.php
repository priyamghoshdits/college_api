<?php

namespace App\Http\Controllers;

use App\Http\Resources\LeaveAllocationResource;
use App\Models\LeaveList;
use App\Http\Requests\StoreLeaveListRequest;
use App\Http\Requests\UpdateLeaveListRequest;
use Illuminate\Http\Request;

class LeaveListController extends Controller
{
    public function get_leave_list()
    {
        $data = LeaveList::select('user_id')->distinct()->get();
        return response()->json(['success'=>1,'data'=>LeaveAllocationResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_leave_list(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = new LeaveList();
        $data->user_id = $requestedData->user_id;
        $data->leave_type_id = $requestedData->leave_type_id;
        $data->total_leave = $requestedData->total_leave;
        $data->save();
        return response()->json(['success'=>1,'data'=>new LeaveAllocationResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_leave_list(Request $request){
        $requestedData = (object)$request->json()->all();
        $data = LeaveList::whereUserId($requestedData->user_id)->whereLeaveTypeId($requestedData->leave_type_id)->first();
        $data->total_leave = $requestedData->total_leave;
        $data->update();
        return response()->json(['success'=>1,'data'=>new LeaveAllocationResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_leave_list($id)
    {
        $data = LeaveList::whereUserId($id)->get();
        foreach ($data as $item){
            $item->delete();
        }
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Display the specified resource.
     */
    public function show(LeaveList $leaveList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeaveList $leaveList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeaveListRequest $request, LeaveList $leaveList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeaveList $leaveList)
    {
        //
    }
}
