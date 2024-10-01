<?php

namespace App\Http\Controllers;

use App\Http\Resources\AllocateVehicleResource;
use App\Models\AllocateVehicle;
use App\Http\Requests\StoreAllocateVehicleRequest;
use App\Http\Requests\UpdateAllocateVehicleRequest;
use Illuminate\Http\Request;

class AllocateVehicleController extends Controller
{
    public function get_allocate_vehicle()
    {
        $data = AllocateVehicle::get();
        return response()->json(['success'=>1,'data'=>AllocateVehicleResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_allocate_vehicle(Request $request)
    {
        $requested_data = (object)$request->json()->all();

        $data = new AllocateVehicle();
        $data->course_id = $requested_data->course_id;
        $data->semester_id = $requested_data->semester_id;
        $data->student_id = $requested_data->student_id;
        $data->date = $requested_data->date;
        $data->vehicle_id = $requested_data->vehicle_id;
        $data->save();

        return response()->json(['success'=>1,'data'=>new AllocateVehicleResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_allocate_vehicle(Request $request)
    {
        $requested_data = (object)$request->json()->all();

        $data = AllocateVehicle::find($requested_data->id);
        $data->course_id = $requested_data->course_id;
        $data->semester_id = $requested_data->semester_id;
        $data->student_id = $requested_data->student_id;
        $data->date = $requested_data->date;
        $data->vehicle_id = $requested_data->vehicle_id;
        $data->update();

        return response()->json(['success'=>1,'data'=>new AllocateVehicleResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_allocate_vehicle($id)
    {
        $data = AllocateVehicle::find($id);
        $data->delete();

        return response()->json(['success'=>1,'data'=>new AllocateVehicleResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AllocateVehicle $allocateVehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAllocateVehicleRequest $request, AllocateVehicle $allocateVehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AllocateVehicle $allocateVehicle)
    {
        //
    }
}
