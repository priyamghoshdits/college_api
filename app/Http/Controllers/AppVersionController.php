<?php

namespace App\Http\Controllers;

use App\Models\AppVersion;
use App\Http\Requests\StoreAppVersionRequest;
use App\Http\Requests\UpdateAppVersionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AppVersionController extends Controller
{

    public function check_app_version(Request $request)
    {
        Log::info($request);
        if($request['appInDebugMode']){
            return response()->json(['update_required' => true]);
        }
        $data = AppVersion::find(1);
        if($data){
            $version = version_compare($data->version, $request['version']);
            $build_number = version_compare($data->build_number, $request['buildNumber']);
            Log::info($version);
            Log::info($build_number);
            if($version < 0){
                $data->app_name = $request['appName'];
                $data->package_name = $request['packageName'];
                $data->version = $request['version'];
                $data->build_number = $request['buildNumber'];
                $data->update();
                return response()->json(['update_required' => false]);
            }elseif ($build_number < 0){
                $data->app_name = $request['appName'];
                $data->package_name = $request['packageName'];
                $data->version = $request['version'];
                $data->build_number = $request['buildNumber'];
                $data->update();
                return response()->json(['update_required' => false]);
            }elseif ($version == 0 && $build_number == 0){
                return response()->json(['update_required' => false]);
            }
            return response()->json(['update_required' => true]);
        }else{
            $data = new AppVersion();
            $data->app_name = $request['appName'];
            $data->package_name = $request['packageName'];
            $data->version = $request['version'];
            $data->build_number = $request['buildNumber'];
            $data->save();
        }
        return response()->json(['update_required' => false]);
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
    public function store(StoreAppVersionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AppVersion $appVersion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppVersion $appVersion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppVersionRequest $request, AppVersion $appVersion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppVersion $appVersion)
    {
        //
    }
}
