<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlacementResource;
use App\Models\PlacementDetails;
use App\Http\Requests\StorePlacementDetailsRequest;
use App\Http\Requests\UpdatePlacementDetailsRequest;
use Illuminate\Http\Request;

class PlacementDetailsController extends Controller
{
    public function get_placement_details()
    {
        $placementDetails = PlacementDetails::get();
        return response()->json(['success'=>1,'data'=>PlacementResource::collection($placementDetails)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_placement_details(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $placementDetails = new PlacementDetails();
        $placementDetails->course_id = $requestData->course_id;
        $placementDetails->semester_id = $requestData->semester_id;
        $placementDetails->session_id = $requestData->session_id;
        $placementDetails->company_id = $requestData->company_id;
        $placementDetails->user_id = $requestData->user_id;
        $placementDetails->placement_date = $requestData->placement_date;
        $placementDetails->description = $requestData->description;
        $placementDetails->save();
        return response()->json(['success'=>1,'data'=>new PlacementResource($placementDetails)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_placement_details(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $placementDetails = PlacementDetails::find($requestData->id);
        $placementDetails->course_id = $requestData->course_id;
        $placementDetails->semester_id = $requestData->semester_id;
        $placementDetails->session_id = $requestData->session_id;
        $placementDetails->company_id = $requestData->company_id;
        $placementDetails->user_id = $requestData->user_id;
        $placementDetails->placement_date = $requestData->placement_date;
        $placementDetails->description = $requestData->description;
        $placementDetails->update();
        return response()->json(['success'=>1,'data'=>new PlacementResource($placementDetails)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_placement_details($id)
    {
        $placementDetails = PlacementDetails::find($id);
        $placementDetails->delete();
        return response()->json(['success'=>1,'data'=>new PlacementResource($placementDetails)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlacementDetails $placementDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlacementDetailsRequest $request, PlacementDetails $placementDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlacementDetails $placementDetails)
    {
        //
    }
}
