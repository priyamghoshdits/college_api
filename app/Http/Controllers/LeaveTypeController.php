<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use App\Http\Requests\StoreLeaveTypeRequest;
use App\Http\Requests\UpdateLeaveTypeRequest;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    public function get_leave_type(Request $request)
    {
        $data = LeaveType::whereFranchiseId($request->user()->franchise_id)->get();
        return response()->json(['success'=>1,'data'=> $data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_leave_type(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = new LeaveType();
        $data->name = $requestedData->name;
        $data->franchise_id = $request->user()->franchise_id;
        $data->save();

        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_leave_type(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = LeaveType::find($requestedData->id);
        $data->name = $requestedData->name;
        $data->update();

        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_leave_type($id)
    {
        $data = LeaveType::find($id);
        $data->delete();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeaveType $leaveType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeaveTypeRequest $request, LeaveType $leaveType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeaveType $leaveType)
    {
        //
    }
}
