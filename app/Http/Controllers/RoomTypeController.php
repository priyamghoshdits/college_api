<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use App\Http\Requests\StoreRoomTypeRequest;
use App\Http\Requests\UpdateRoomTypeRequest;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function get_room_type(Request $request)
    {
        $data = RoomType::whereFranchiseId($request->user()->franchise_id)->get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_room_type(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $roomType = new RoomType();
        $roomType->name = $requestData->name;
        $roomType->description = $requestData->description;
        $roomType->franchise_id = $request->user()->franchise_id;
        $roomType->save();
        return response()->json(['success'=>1,'data'=>$roomType], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_room_type(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $roomType = RoomType::find($requestData->id);
        $roomType->name = $requestData->name;
        $roomType->description = $requestData->description;
        $roomType->update();
        return response()->json(['success'=>1,'data'=>$roomType], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_room_type($id)
    {
        $data = RoomType::find($id);
        $data->delete();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomType $roomType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomTypeRequest $request, RoomType $roomType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomType $roomType)
    {
        //
    }
}
