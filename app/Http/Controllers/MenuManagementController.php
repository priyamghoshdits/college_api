<?php

namespace App\Http\Controllers;

use App\Http\Resources\MenuManagementResource;
use App\Models\MenuManagement;
use App\Http\Requests\StoreMenuManagementRequest;
use App\Http\Requests\UpdateMenuManagementRequest;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MenuManagementController extends Controller
{
    public function get_menu_management(Request $request)
    {
        if(Cache::has('get_user_log_user_type_id'.$request->user()->user_type_id.'franchise_id'.$request->user()->franchise_id)){
            return response()->json(['success'=>1,'from'=>'Cache','data'=>Cache::get('get_user_log_user_type_id'.$request->user()->user_type_id.'franchise_id'.$request->user()->franchise_id)], 200,[],JSON_NUMERIC_CHECK);
        }else {
            $data = Cache::rememberForever('get_user_log_user_type_id'.$request->user()->user_type_id.'franchise_id'.$request->user()->franchise_id
                , function () use($request) {
                    $user_type = $request->user()->user_type_id;
                    $franchise_id = $request->user()->franchise_id;
                    return MenuManagement::whereUserTypeId($user_type)->whereFranchiseId($franchise_id)->get();
                });
        }
        return response()->json(['success'=>1,'data'=> $data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_menu_for_update(Request $request)
    {
        $data = UserType::get();
        $franchise_id = $request->user()->franchise_id;
        foreach ($data as $list){
            $list->franchise_id = $franchise_id;
        }
        return response()->json(['success'=>1,'data'=>MenuManagementResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function active_deactivate_menu($id)
    {
        $data = MenuManagement::find($id);
        $data->permission = ($data->permission == 1)? 0:1;
        $data->update();
        Cache::forget('get_user_log_user_type_id'.$data->user_type_id.'franchise_id'.$data->franchise_id);
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuManagement $menuManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuManagement $menuManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuManagementRequest $request, MenuManagement $menuManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuManagement $menuManagement)
    {
        //
    }
}
