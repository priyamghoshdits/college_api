<?php

namespace App\Http\Controllers;

use App\Http\Resources\AssignVehicleResource;
use App\Models\AssignVehicle;
use App\Http\Requests\StoreAssignVehicleRequest;
use App\Http\Requests\UpdateAssignVehicleRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignVehicleController extends Controller
{
    public function get_assign_vehicle()
    {
        $routes = AssignVehicle::select('route_id')->distinct()->get();
//        $routes = DB::select("select DISTINCT route_id from assign_vehicles");
        return response()->json(['success'=>1,'data'=> AssignVehicleResource::collection($routes)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_assign_vehicle(Request $request)
    {
        $requestedData = $request->json()->all();
        $route_id = $requestedData[0]['route_id'];
        foreach ($requestedData as $data){
            $assignVehicle = new AssignVehicle();
            $assignVehicle->route_id = $data['route_id'];
            $assignVehicle->vehicle_id = $data['vehicle_id'];
            $assignVehicle->save();
        }
        $routes = DB::select("select DISTINCT route_id from assign_vehicles where route_id = ?",[$route_id]);
        return response()->json(['success'=>1,'data'=>AssignVehicleResource::collection($routes)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_assign_vehicle(Request $request)
    {
        $requestedData = $request->json()->all();
        $route_id = $requestedData[0]['route_id'];
        $test = [];
        foreach ($requestedData as $list){
            $test[] = $list['vehicle_id'];
        }
        $vehicles = AssignVehicle::whereRouteId($route_id)->whereNotIn('vehicle_id',$test)->get();
        if($vehicles){
            foreach ($vehicles as $vehicle){
                $temp = AssignVehicle::whereRouteId($route_id)->whereVehicleId($vehicle['vehicle_id'])->first();
                $temp->delete();
            }
        }

        foreach ($requestedData as $data){
            $temp = AssignVehicle::whereRouteId($route_id)->whereVehicleId($data['vehicle_id'])->first();
            if($temp){
                continue;
            }else{
                $assignVehicle = new AssignVehicle();
                $assignVehicle->route_id = $route_id;
                $assignVehicle->vehicle_id = $data['vehicle_id'];
                $assignVehicle->save();
            }
        }

        $routes = AssignVehicle::select('route_id')->whereRouteId($route_id)->first();
        return response()->json(['success'=>1,'data'=>new AssignVehicleResource($routes)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_assign_vehicle($route_id)
    {
        $routes = AssignVehicle::whereRouteId($route_id)->get();
        foreach ($routes as $route){
            $route->delete();
        }

        return response()->json(['success'=>1], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssignVehicle $assignVehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssignVehicleRequest $request, AssignVehicle $assignVehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssignVehicle $assignVehicle)
    {
        //
    }
}
