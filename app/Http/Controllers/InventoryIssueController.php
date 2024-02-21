<?php

namespace App\Http\Controllers;

use App\Http\Resources\InventoryIssueResource;
use App\Models\InventoryIssue;
use App\Http\Requests\StoreInventoryIssueRequest;
use App\Http\Requests\UpdateInventoryIssueRequest;
use App\Models\ItemStock;
use Illuminate\Http\Request;

class InventoryIssueController extends Controller
{
    public function get_issue_item()
    {
        $data = InventoryIssue::get();
        return response()->json(['success'=>1,'data'=>InventoryIssueResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_issue_item(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = new InventoryIssue();
        $data->user_type_id = $requestedData->user_type_id;
        $data->issue_to = $requestedData->issue_to;
        $data->issue_by = $requestedData->issue_by;
        $data->item_type_id = $requestedData->item_type_id;
        $data->inventory_item_id = $requestedData->inventory_item_id;
        $data->quantity = $requestedData->quantity;
        $data->issue_date = $requestedData->issue_date;
        $data->return_date = $requestedData->return_date;
        $data->status = 1;
        $data->save();

        $inventoryStock = ItemStock::whereInventoryItemId($requestedData->inventory_item_id)->first();
        $inventoryStock->quantity = $inventoryStock->quantity - $requestedData->quantity;
        $inventoryStock->update();

        return response()->json(['success'=>1,'data'=>new InventoryIssueResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_issue_item(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = InventoryIssue::find($requestedData->id);
        $data->user_type_id = $requestedData->user_type_id;
        $data->issue_to = $requestedData->issue_to;
        $data->issue_by = $requestedData->issue_by;
        $data->item_type_id = $requestedData->item_type_id;
        $data->inventory_item_id = $requestedData->inventory_item_id;
        $data->quantity = $requestedData->quantity;
        $data->issue_date = $requestedData->issue_date;
        $data->return_date = $requestedData->return_date;
        $data->update();
        return response()->json(['success'=>1,'data'=>new InventoryIssueResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_issue_item($id)
    {
        $data = InventoryIssue::find($id);
        if($data->status == 1){
            $inventoryStock = ItemStock::whereInventoryItemId($data->inventory_item_id)->first();
            $inventoryStock->quantity = $inventoryStock->quantity + $data->quantity;
            $inventoryStock->update();
        }
        $data->delete();
        return response()->json(['success'=>1,'data'=>new InventoryIssueResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_status($id)
    {
        $data = InventoryIssue::find($id);
        $data->status = ($data->status==1)?0:1;
        $data->update();

        $inventoryStock = ItemStock::whereInventoryItemId($data->inventory_item_id)->first();
        $inventoryStock->quantity = $inventoryStock->quantity + $data->quantity;
        $inventoryStock->update();

        return response()->json(['success'=>1,'data'=>new InventoryIssueResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InventoryIssue $inventoryIssue)
    {
        //
    }
}
