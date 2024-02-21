<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemStockResource;
use App\Models\ItemStock;
use App\Http\Requests\StoreItemStockRequest;
use App\Http\Requests\UpdateItemStockRequest;
use Illuminate\Http\Request;

class ItemStockController extends Controller
{
    public function get_item_stock()
    {
        $data = ItemStock::get();
        return response()->json(['success'=>1,'data'=>ItemStockResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_item_stock(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $data = new ItemStock();
        $data->item_type_id = $requestData->item_type_id;
        $data->inventory_item_id = $requestData->inventory_item_id;
        $data->item_supplier_id = $requestData->item_supplier_id;
        $data->item_store_id = $requestData->item_store_id;
        $data->quantity = $requestData->quantity;
        $data->purchase_price = $requestData->purchase_price;
        $data->purchase_date = $requestData->purchase_date;
        $data->description = $requestData->description;
        $data->save();
        return response()->json(['success'=>1,'data'=> new ItemStockResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_item_stock(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $data = ItemStock::find($requestData->id);
        $data->item_type_id = $requestData->item_type_id;
        $data->inventory_item_id = $requestData->inventory_item_id;
        $data->item_supplier_id = $requestData->item_supplier_id;
        $data->item_store_id = $requestData->item_store_id;
        $data->quantity = $requestData->quantity;
        $data->purchase_price = $requestData->purchase_price;
        $data->purchase_date = $requestData->purchase_date;
        $data->description = $requestData->description;
        $data->save();
        return response()->json(['success'=>1,'data'=> new ItemStockResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_item_stock($id)
    {
        $data = ItemStock::find($id);
        $data->delete();
        return response()->json(['success'=>1,'data'=> new ItemStockResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_quantity_by_item_id($item_id)
    {
        $data = ItemStock::whereInventoryItemId($item_id)->first();
        return response()->json(['success'=>1,'data'=> $data->quantity], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemStockRequest $request, ItemStock $itemStock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemStock $itemStock)
    {
        //
    }
}
