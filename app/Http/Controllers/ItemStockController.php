<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemStockResource;
use App\Models\InventoryItem;
use App\Models\ItemStock;
use App\Http\Requests\StoreItemStockRequest;
use App\Http\Requests\UpdateItemStockRequest;
use App\Models\ItemStore;
use App\Models\ItemSupplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return response()->json(['success'=>1,'data'=> $data?$data->quantity:0], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_inventory_report(Request $request)
    {
        $requested_data = (object)$request->json()->all();
        $itemStock = DB::select("SELECT * FROM item_stocks where date(purchase_date) >= ? and date(purchase_date) <= ?",[$requested_data->from_date,$requested_data->to_date]);

        foreach ($itemStock as $stock){
            $stock->inventory_name = InventoryItem::find($stock->inventory_item_id)->name;
            $stock->suplier_name = ItemSupplier::find($stock->item_supplier_id)->name;
            $stock->store_name = ItemStore::find($stock->item_store_id)->name;
            $stock->issued_item = DB::select("SELECT ifnull(SUM(quantity),0) as quantity FROM inventory_issues where item_type_id = ? and inventory_item_id = ?;",[$stock->item_type_id,$stock->inventory_item_id])[0]->quantity;
            $stock->total_quantity = $stock->quantity + $stock->issued_item;
        }

        return response()->json(['success'=>1,'data'=> $itemStock], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemStock $itemStock)
    {
        //
    }
}
