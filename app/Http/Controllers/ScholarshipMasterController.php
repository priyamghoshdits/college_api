<?php

namespace App\Http\Controllers;

use App\Models\ScholarshipMaster;
use App\Http\Requests\StoreScholarshipMasterRequest;
use App\Http\Requests\UpdateScholarshipMasterRequest;
use Illuminate\Http\Request;

class ScholarshipMasterController extends Controller
{
    public function get_scholarship()
    {
        $data = ScholarshipMaster::get();
        return response()->json(['success'=>1, 'data'=>$data],200,[],JSON_NUMERIC_CHECK);
    }

    public function save_scholarship(Request $request)
    {
        $requestedData = (object)$request->json()->all();

        $data = new ScholarshipMaster();
        $data->name = $requestedData->name;
        $data->save();

        return response()->json(['success'=>1, 'data'=>$data],200,[],JSON_NUMERIC_CHECK);
    }

    public function update_scholarship(Request $request)
    {
        $requestedData = (object)$request->json()->all();

        $data = ScholarshipMaster::find($requestedData->id);
        $data->name = $requestedData->name;
        $data->update();

        return response()->json(['success'=>1, 'data'=>$data],200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_scholarship($id)
    {
        $data = ScholarshipMaster::find($id);
        $data->delete();

        return response()->json(['success'=>1, 'data'=>$data],200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ScholarshipMaster $scholarshipMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScholarshipMasterRequest $request, ScholarshipMaster $scholarshipMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScholarshipMaster $scholarshipMaster)
    {
        //
    }
}
