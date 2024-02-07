<?php

namespace App\Http\Controllers;

use App\Models\HotelType;
use App\Http\Requests\StoreHotelTypeRequest;
use App\Http\Requests\UpdateHotelTypeRequest;

class HotelTypeController extends Controller
{
    public function get_hotel_type()
    {
        $data = HotelType::get();
        return response()->json(['success'=>1,'data'=> $data], 200,[],JSON_NUMERIC_CHECK);
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
    public function store(StoreHotelTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HotelType $hotelType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HotelType $hotelType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHotelTypeRequest $request, HotelType $hotelType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelType $hotelType)
    {
        //
    }
}
