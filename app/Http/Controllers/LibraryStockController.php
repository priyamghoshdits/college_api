<?php

namespace App\Http\Controllers;

use App\Models\LibraryStock;
use App\Http\Requests\StoreLibraryStockRequest;
use App\Http\Requests\UpdateLibraryStockRequest;
use Illuminate\Http\Request;

class LibraryStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function get_library_details(Request $request)
    {
        $data = LibraryStock::whereFranchiseId($request->user()->franchise_id)->get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_library_details(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $library = new LibraryStock();
        $library->name = $requestedData->name;
        $library->quantity = $requestedData->quantity;
        $library->remaining = $requestedData->remaining;
        $library->franchise_id = $request->user()->franchise_id;
        $library->save();
        return response()->json(['success'=>1,'data'=>$library], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_library_details(Request $request){
        $requestedData = (object)$request->json()->all();
        $library = LibraryStock::find($requestedData->id);
        $library->name = $requestedData->name;
        $library->quantity = $requestedData->quantity;
        $library->remaining = $requestedData->remaining;
        $library->update();
        return response()->json(['success'=>1,'data'=>$library], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_library_details($id)
    {
        $data = LibraryStock::find($id);
        $data->delete();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }
    public function stock_update(LibraryStock $libraryStock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LibraryStock $libraryStock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLibraryStockRequest $request, LibraryStock $libraryStock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LibraryStock $libraryStock)
    {
        //
    }
}
