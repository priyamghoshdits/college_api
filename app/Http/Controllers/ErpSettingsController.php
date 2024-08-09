<?php

namespace App\Http\Controllers;

use App\Models\ErpSettings;
use App\Http\Requests\StoreErpSettingsRequest;
use App\Http\Requests\UpdateErpSettingsRequest;
use Illuminate\Http\Request;

class ErpSettingsController extends Controller
{
    public function get_erp_settings()
    {
        $data = ErpSettings::first();
        return response()->json(['success' => 1, 'data' => $data], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_erp_settings(Request $request)
    {
        $data = (object)$request->json()->all();
        $erpSetting = ErpSettings::find(1);
        $erpSetting->title = $data->title;
        $erpSetting->session_id = $data->session_id;
        $erpSetting->update();

        return response()->json(['success' => 1, 'data' => $erpSetting]);
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
    public function store(StoreErpSettingsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ErpSettings $erpSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ErpSettings $erpSettings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateErpSettingsRequest $request, ErpSettings $erpSettings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ErpSettings $erpSettings)
    {
        //
    }
}
