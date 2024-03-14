<?php

namespace App\Http\Controllers;

use App\Models\CallLog;
use App\Http\Requests\StoreCallLogRequest;
use App\Http\Requests\UpdateCallLogRequest;
use Illuminate\Http\Request;

class CallLogController extends Controller
{
    public function get_call_log()
    {
        $callLog = CallLog::get();
        return response()->json(['success'=>1,'data'=>$callLog], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_call_log(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $callLog = new CallLog();
        $callLog->name = $requestData->name;
        $callLog->phone = $requestData->phone;
        $callLog->date = $requestData->date;
        $callLog->description = $requestData->description;
        $callLog->next_follow_up_date = $requestData->next_follow_up_date;
        $callLog->call_duration = $requestData->call_duration;
        $callLog->note = $requestData->note;
        $callLog->save();
        return response()->json(['success'=>1,'data'=>$callLog], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_call_log(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $callLog = CallLog::find($requestData->id);
        $callLog->name = $requestData->name;
        $callLog->phone = $requestData->phone;
        $callLog->date = $requestData->date;
        $callLog->description = $requestData->description;
        $callLog->next_follow_up_date = $requestData->next_follow_up_date;
        $callLog->call_duration = $requestData->call_duration;
        $callLog->note = $requestData->note;
        $callLog->update();
        return response()->json(['success'=>1,'data'=>$callLog], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_call_log($id)
    {
        $callLog = CallLog::find($id);
        $callLog->delete();
        return response()->json(['success'=>1,'data'=>$callLog], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CallLog $callLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCallLogRequest $request, CallLog $callLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CallLog $callLog)
    {
        //
    }
}
