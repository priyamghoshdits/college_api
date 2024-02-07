<?php

namespace App\Http\Controllers;

use App\Models\ItemTypes;
use App\Http\Requests\StoreItemTypesRequest;
use App\Http\Requests\UpdateItemTypesRequest;
use Illuminate\Http\Request;

class ItemTypesController extends Controller
{
    public function get_item_category(Request $request)
    {
        $data = ItemTypes::whereFranchiseId($request->user()->franchise_id)->get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_item_category(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = new ItemTypes();
        $data->name = $requestedData->name;
        $data->franchise_id = $request->user()->franchise_id;
        $data->save();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_item_category(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = ItemTypes::find($requestedData->id);
        $data->name = $requestedData->name;
        $data->franchise_id = $request->user()->franchise_id;
        $data->save();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_item_category($id)
    {
        $data = ItemTypes::find($id);
        $data->delete();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemTypes $itemTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemTypesRequest $request, ItemTypes $itemTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemTypes $itemTypes)
    {
        //
    }
}
