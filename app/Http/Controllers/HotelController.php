<?php

namespace App\Http\Controllers;

use App\Http\Resources\HostelResource;
use App\Models\Hotel;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function get_hostels(Request $request)
    {
        $data = Hotel::whereFranchiseId($request->user()->franchise_id)->get();
        return response()->json(['success'=>1,'data'=>HostelResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_hostels(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $hostel = new Hotel();
        $hostel->name = $requestData->name;
        $hostel->hostel_type_id = $requestData->hostel_type_id;
        $hostel->address = $requestData->address;
        $hostel->description = $requestData->description;
        $hostel->franchise_id = $request->user()->franchise_id;
        $hostel->save();
        return response()->json(['success'=>1,'data'=>new HostelResource($hostel)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_hostels(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $hostel = Hotel::find($requestData->id);
        $hostel->name = $requestData->name;
        $hostel->hostel_type_id = $requestData->hostel_type_id;
        $hostel->address = $requestData->address;
        $hostel->description = $requestData->description;
        $hostel->save();
        return response()->json(['success'=>1,'data'=>new HostelResource($hostel)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_hostels($id)
    {
        $hostel = Hotel::find($id);
        $hostel->delete();
        return response()->json(['success'=>1,'data'=>new HostelResource($hostel)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHotelRequest $request, Hotel $hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        //
    }
}
