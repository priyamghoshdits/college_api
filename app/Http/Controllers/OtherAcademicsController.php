<?php

namespace App\Http\Controllers;

use App\Models\OtherAcademics;
use App\Http\Requests\StoreOtherAcademicsRequest;
use App\Http\Requests\UpdateOtherAcademicsRequest;
use Illuminate\Http\Request;

class OtherAcademicsController extends Controller
{
    public function get_other_academics()
    {
        //
    }

    public function save_other_academics(Request $request)
    {
        $academics = new OtherAcademics();
        $academics->designation = $request['designation'];
        $academics->appointed_by = $request['appointed_by'];
        $academics->date_of_appointment = $request['date_of_appointment'];
        $academics->save();
    }

    public function update_other_academics(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OtherAcademics $otherAcademics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OtherAcademics $otherAcademics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOtherAcademicsRequest $request, OtherAcademics $otherAcademics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OtherAcademics $otherAcademics)
    {
        //
    }
}
