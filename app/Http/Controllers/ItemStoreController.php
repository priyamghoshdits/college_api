<?php

namespace App\Http\Controllers;

use App\Models\ItemStore;
use App\Http\Requests\StoreItemStoreRequest;
use App\Http\Requests\UpdateItemStoreRequest;
use Illuminate\Http\Request;

class ItemStoreController extends Controller
{

    public function get_item_store()
    {
        $data = ItemStore::get();
        return response()->json(['success'=>1,'data'=> $data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_item_store(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $itemStore = new ItemStore();
        $itemStore->name = $requestData->name;
        $itemStore->stock_code = $requestData->stock_code;
        $itemStore->description = $requestData->description;
        $itemStore->save();
        return response()->json(['success'=>1,'data'=> $itemStore], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_item_store(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $itemStore = ItemStore::find($requestData->id);
        $itemStore->name = $requestData->name;
        $itemStore->stock_code = $requestData->stock_code;
        $itemStore->description = $requestData->description;
        $itemStore->update();
        return response()->json(['success'=>1,'data'=> $itemStore], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_item_store($id)
    {
        $itemStore = ItemStore::find($id);
        $itemStore->delete();
        return response()->json(['success'=>1,'data'=> $itemStore], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemStore $itemStore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemStoreRequest $request, ItemStore $itemStore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemStore $itemStore)
    {
        //
    }
}
