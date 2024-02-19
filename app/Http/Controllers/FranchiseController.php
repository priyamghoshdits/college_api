<?php

namespace App\Http\Controllers;

use App\Models\Franchise;
use App\Http\Requests\StoreFranchiseRequest;
use App\Http\Requests\UpdateFranchiseRequest;
use Illuminate\Http\Request;

class FranchiseController extends Controller
{
    public function get_franchise()
    {
        $franchise = Franchise::get();
        return response()->json(['success'=>1,'data'=>$franchise], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_franchise(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $franchise = new Franchise();
        $franchise->name = $requestData->name;
        $franchise->save();
        return response()->json(['success'=>1,'data'=>$franchise], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_franchise(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $franchise = Franchise::find($requestData->id);
        $franchise->name = $requestData->name;
        $franchise->update();
        return response()->json(['success'=>1,'data'=>$franchise], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_franchise($id)
    {
        $franchise = Franchise::find($id);
        $franchise->delete();
        return response()->json(['success'=>1,'data'=>$franchise], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Franchise $franchise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFranchiseRequest $request, Franchise $franchise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Franchise $franchise)
    {
        //
    }
}
