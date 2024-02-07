<?php

namespace App\Http\Controllers;

use App\Http\Resources\HostelDetailsResource;
use App\Http\Resources\HostelResource;
use App\Models\HotelDetails;
use App\Http\Requests\StoreHotelDetailsRequest;
use App\Http\Requests\UpdateHotelDetailsRequest;
use Illuminate\Http\Request;

class HotelDetailsController extends Controller
{
    public function get_room_details(Request $request)
    {
        $data = HotelDetails::whereFranchiseId($request->user()->franchise_id)->get();
        return response()->json(['success'=>1,'data'=> HostelDetailsResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_room_details(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $hostel_details = new HotelDetails();
        $hostel_details->name = $requestedData->name;
        $hostel_details->hostel_id = $requestedData->hostel_id;
        $hostel_details->room_type_id = $requestedData->room_type_id;
        $hostel_details->no_of_bed = $requestedData->no_of_bed;
        $hostel_details->cost_per_bed = $requestedData->cost_per_bed;
        $hostel_details->description = $requestedData->description;
        $hostel_details->franchise_id = $request->user()->franchise_id;
        $hostel_details->save();
        return response()->json(['success'=>1,'data'=>new HostelDetailsResource($hostel_details)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_room_details(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $hostel_details = HotelDetails::find($requestedData->id);
        $hostel_details->name = $requestedData->name;
        $hostel_details->hostel_id = $requestedData->hostel_id;
        $hostel_details->no_of_bed = $requestedData->no_of_bed;
        $hostel_details->cost_per_bed = $requestedData->cost_per_bed;
        $hostel_details->description = $requestedData->description;
        $hostel_details->update();
        return response()->json(['success'=>1,'data'=>new HostelDetailsResource($hostel_details)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_room_details($id)
    {
        $data = HotelDetails::find($id);
        $data->delete();
        return response()->json(['success'=>1,'data'=>new HostelDetailsResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HotelDetails $hotelDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHotelDetailsRequest $request, HotelDetails $hotelDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelDetails $hotelDetails)
    {
        //
    }
}
