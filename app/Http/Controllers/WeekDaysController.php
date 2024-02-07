<?php

namespace App\Http\Controllers;

use App\Models\WeekDays;
use App\Http\Requests\StoreWeekDaysRequest;
use App\Http\Requests\UpdateWeekDaysRequest;
use Illuminate\Http\Request;

class WeekDaysController extends Controller
{
    public function get_week_days()
    {
        $data = WeekDays::get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_week_days(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $weekdays = new WeekDays();
        $weekdays->name = $requestData->name;
        $weekdays->save();
        return response()->json(['success'=>1,'data'=>$weekdays], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_week_days(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $weekdays = WeekDays::find($requestData->id);
        $weekdays->name = $requestData->name;
        $weekdays->update();
        return response()->json(['success'=>1,'data'=>$weekdays], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_week_days($id)
    {
        $data = WeekDays::find($id);
        $data->delete();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WeekDays $weekDays)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWeekDaysRequest $request, WeekDays $weekDays)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WeekDays $weekDays)
    {
        //
    }
}
