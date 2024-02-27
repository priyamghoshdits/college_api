<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Http\Requests\StoreDesignationRequest;
use App\Http\Requests\UpdateDesignationRequest;
use Illuminate\Http\Request;

class DesignationController extends Controller

{    public function get_designation(Request $request)
    {
        $data = Designation::whereFranchiseId($request->user()->franchise_id)->get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_designation(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = new Designation();
        $data->name = $requestedData->name;
        $data->franchise_id = $request->user()->franchise_id;
        $data->save();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_designation(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = Designation::find($requestedData->id);
        $data->name = $requestedData->name;
        $data->update();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_designation($id)
    {
        $data = Designation::find($id);
        $data->delete();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Designation $designation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDesignationRequest $request, Designation $designation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Designation $designation)
    {
        //
    }
}
