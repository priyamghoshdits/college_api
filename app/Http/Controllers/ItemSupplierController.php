<?php

namespace App\Http\Controllers;

use App\Models\ItemSupplier;
use App\Http\Requests\StoreItemSupplierRequest;
use App\Http\Requests\UpdateItemSupplierRequest;
use Illuminate\Http\Request;

class ItemSupplierController extends Controller
{
    public function get_item_supplier()
    {
        $data = ItemSupplier::get();
        return response()->json(['success'=>1,'data'=> $data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_item_supplier(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $itemSupplier = new ItemSupplier();
        $itemSupplier->name = $requestData->name;
        $itemSupplier->phone = $requestData->phone;
        $itemSupplier->email = $requestData->email;
        $itemSupplier->address = $requestData->address;
        $itemSupplier->contact_person_name = $requestData->contact_person_name;
        $itemSupplier->contact_person_phone = $requestData->contact_person_phone;
        $itemSupplier->contact_person_email = $requestData->contact_person_email;
        $itemSupplier->description = $requestData->description;
        $itemSupplier->save();
        return response()->json(['success'=>1,'data'=> $itemSupplier], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_item_supplier(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $itemSupplier = ItemSupplier::find($requestData->id);
        $itemSupplier->name = $requestData->name;
        $itemSupplier->phone = $requestData->phone;
        $itemSupplier->email = $requestData->email;
        $itemSupplier->address = $requestData->address;
        $itemSupplier->contact_person_name = $requestData->contact_person_name;
        $itemSupplier->contact_person_phone = $requestData->contact_person_phone;
        $itemSupplier->contact_person_email = $requestData->contact_person_email;
        $itemSupplier->description = $requestData->description;
        $itemSupplier->update();
        return response()->json(['success'=>1,'data'=> $itemSupplier], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_item_supplier($id)
    {
        $itemSupplier = ItemSupplier::find($id);
        $itemSupplier->delete();
        return response()->json(['success'=>1,'data'=> $itemSupplier], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemSupplier $itemSupplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemSupplierRequest $request, ItemSupplier $itemSupplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemSupplier $itemSupplier)
    {
        //
    }
}
