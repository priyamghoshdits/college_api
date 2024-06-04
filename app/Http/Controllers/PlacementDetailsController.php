<?php

namespace App\Http\Controllers;

use App\Models\PlacementDetails;
use App\Http\Requests\StorePlacementDetailsRequest;
use App\Http\Requests\UpdatePlacementDetailsRequest;

class PlacementDetailsController extends Controller
{
    public function get_placement_details()
    {
        $placementDetails = PlacementDetails::get();
        return response()->json(['success'=>1,'data'=>$placementDetails], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlacementDetailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PlacementDetails $placementDetails)
    {
        //
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
