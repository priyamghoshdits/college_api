<?php

namespace App\Http\Controllers;

use App\Models\InternshipProvider;
use App\Http\Requests\StoreInternshipProviderRequest;
use App\Http\Requests\UpdateInternshipProviderRequest;
use Illuminate\Http\Request;

class InternshipProviderController extends Controller
{
    public function get_internship_providers(Request $request)
    {
        $data = InternshipProvider::whereFranchiseId($request->user()->franchise_id)->get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_internship_provider(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $data = new InternshipProvider();
        $data->name = $requestData->name;
        $data->franchise_id = $request->user()->franchise_id;
        $data->save();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_internship_provider(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $data = InternshipProvider::find($requestData->id);
        $data->name = $requestData->name;
        $data->update();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_internship_provider($id)
    {
        $data = InternshipProvider::find($id);
        $data->delete();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InternshipProvider $internshipProvider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInternshipProviderRequest $request, InternshipProvider $internshipProvider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InternshipProvider $internshipProvider)
    {
        //
    }
}
