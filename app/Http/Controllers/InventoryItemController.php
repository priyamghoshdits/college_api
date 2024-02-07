<?php

namespace App\Http\Controllers;

use App\Http\Resources\InventoryItemResource;
use App\Models\InventoryItem;
use App\Http\Requests\StoreInventoryItemRequest;
use App\Http\Requests\UpdateInventoryItemRequest;
use Illuminate\Http\Request;

class InventoryItemController extends Controller
{
    public function get_inventory_items(Request $request)
    {
        $data = InventoryItem::whereFranchiseId($request->user()->franchise_id)->get();
        return response()->json(['success'=>1,'data'=>InventoryItemResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_inventory_items(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = new InventoryItem();
        $data->name = $requestedData->name;
        $data->item_type_id = $requestedData->item_type_id;
        $data->unit = $requestedData->unit;
        $data->description = $requestedData->description;
        $data->franchise_id = $request->user()->franchise_id;
        $data->save();
        return response()->json(['success'=>1,'data'=>new InventoryItemResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_inventory_items(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = InventoryItem::find($requestedData->id);
        $data->name = $requestedData->name;
        $data->item_type_id = $requestedData->item_type_id;
        $data->unit = $requestedData->unit;
        $data->description = $requestedData->description;
        $data->update();
        return response()->json(['success'=>1,'data'=>new InventoryItemResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_inventory_items($id)
    {
        $data = InventoryItem::find($id);
        $data->delete();
        return response()->json(['success'=>1,'data'=>new InventoryItemResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InventoryItem $inventoryItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInventoryItemRequest $request, InventoryItem $inventoryItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InventoryItem $inventoryItem)
    {
        //
    }
}
