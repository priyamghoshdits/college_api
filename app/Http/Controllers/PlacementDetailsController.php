<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlacementResource;
use App\Models\PlacementDetails;
use App\Http\Requests\StorePlacementDetailsRequest;
use App\Http\Requests\UpdatePlacementDetailsRequest;
use App\Models\StudentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlacementDetailsController extends Controller
{
    public function get_placement_details()
    {
        $placementDetails = PlacementDetails::get();
        return response()->json(['success' => 1, 'data' => PlacementResource::collection($placementDetails)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_placement_details(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $placementDetails = new PlacementDetails();
        $placementDetails->course_id = $requestData->course_id;
        $placementDetails->semester_id = $requestData->semester_id;
        $placementDetails->session_id = $requestData->session_id;
        $placementDetails->company_id = $requestData->company_id;
        $placementDetails->organization_name = $requestData->organization_name;
        $placementDetails->user_id = $requestData->user_id;
        $placementDetails->placement_date = $requestData->placement_date;
        $placementDetails->description = $requestData->description;
        $placementDetails->save();
        return response()->json(['success' => 1, 'data' => new PlacementResource($placementDetails)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_placement_details(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $placementDetails = PlacementDetails::find($requestData->id);
        $placementDetails->course_id = $requestData->course_id;
        $placementDetails->semester_id = $requestData->semester_id;
        $placementDetails->session_id = $requestData->session_id;
        $placementDetails->company_id = $requestData->company_id;
        $placementDetails->organization_name = $requestData->organization_name;
        $placementDetails->user_id = $requestData->user_id;
        $placementDetails->placement_date = $requestData->placement_date;
        $placementDetails->description = $requestData->description;
        $placementDetails->update();
        return response()->json(['success' => 1, 'data' => new PlacementResource($placementDetails)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_placement_details(Request $request, $id)
    {
        $placementDetails = PlacementDetails::find($id);
        $placementDetails->delete();

        $placementDetails = PlacementDetails::whereUserId($request->user()->id)->get();
        return response()->json(['success' => 1, 'data' => PlacementResource::collection($placementDetails)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_own_placement_details(Request $request)
    {
        $student_details = StudentDetail::whereStudentId($request->user()->id)->first();

        $placementDetails = new PlacementDetails();
        $placementDetails->course_id = $student_details['course_id'];
        $placementDetails->semester_id = $student_details['semester_id'];
        $placementDetails->session_id = $student_details['session_id'];

        $placementDetails->company_id = $request->company_id;
        $placementDetails->organization_name = $request->organization_name;
        $placementDetails->user_id = $request->user()->id;
        $placementDetails->placement_date = $request->placement_date;
        $placementDetails->description = $request->description;
        $placementDetails->save();

        $placementDetails = PlacementDetails::whereUserId($request->user()->id)->get();
        return response()->json(['success' => 1, 'data' => PlacementResource::collection($placementDetails)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_own_placement_details(Request $request)
    {
        $placementDetails = PlacementDetails::find($request->id);

        $placementDetails->company_id = $request->company_id;
        $placementDetails->organization_name = $request->organization_name;
        $placementDetails->placement_date = $request->placement_date;
        $placementDetails->description = $request->description;
        $placementDetails->update();

        $placementDetails = PlacementDetails::whereUserId($request->user()->id)->get();

        return response()->json(['success' => 1, 'data' => PlacementResource::collection($placementDetails)], 200, [], JSON_NUMERIC_CHECK);
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
