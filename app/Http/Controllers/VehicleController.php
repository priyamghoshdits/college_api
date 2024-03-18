<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function get_vehicle()
    {
        $vehicle = Vehicle::get();
        return response()->json(['success'=>1,'data'=>$vehicle], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_vehicle(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $vehicle = new Vehicle();
        $vehicle->number = $requestedData->number;
        $vehicle->model = $requestedData->model;
        $vehicle->year_made = $requestedData->year_made;
        $vehicle->driver_name = $requestedData->driver_name;
        $vehicle->driver_licence = $requestedData->driver_licence;
        $vehicle->driver_contact = $requestedData->driver_contact;
        $vehicle->note = $requestedData->note;
        $vehicle->save();

        return response()->json(['success'=>1,'data'=>$vehicle], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_vehicle(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $vehicle = Vehicle::find($requestedData->id);
        $vehicle->number = $requestedData->number;
        $vehicle->model = $requestedData->model;
        $vehicle->year_made = $requestedData->year_made;
        $vehicle->driver_name = $requestedData->driver_name;
        $vehicle->driver_licence = $requestedData->driver_licence;
        $vehicle->driver_contact = $requestedData->driver_contact;
        $vehicle->note = $requestedData->note;
        $vehicle->update();

        return response()->json(['success'=>1,'data'=>$vehicle], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_vehicle($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();

        return response()->json(['success'=>1,'data'=>$vehicle], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}
