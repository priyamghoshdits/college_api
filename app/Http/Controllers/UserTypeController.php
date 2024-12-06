<?php

namespace App\Http\Controllers;

use App\Models\MenuManagement;
use App\Models\User;
use App\Models\UserType;
use App\Http\Requests\StoreUserTypeRequest;
use App\Http\Requests\UpdateUserTypeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserTypeController extends Controller
{

    public function get_user_types()
    {
        $data = UserType::where('id', '!=', 1)->get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_user_by_user_type_id($user_type_id){
        $data = User::whereUserTypeId($user_type_id)->get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_user_type(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $franchise_id = $request->user()->franchise_id;
        $data = new UserType();
        $data->name = $requestedData->name;
        $data->save();

        $menuManagement = MenuManagement::whereUserTypeId(1)->whereFranchiseId($franchise_id)->get();
        foreach ($menuManagement as $item){
            $menuManagementObject = new MenuManagement();
            $menuManagementObject->user_type_id = $data->id;
            $menuManagementObject->name = $item['name'];
            $menuManagementObject->groups = $item['groups'];
            $menuManagementObject->permission = 0;
            $menuManagementObject->franchise_id = $franchise_id;
            $menuManagementObject->save();
        }

        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_user_type(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        if($requestedData->id>0 && $requestedData->id <=6){
            return response()->json(['success'=>2,'data'=>null], 201,[],JSON_NUMERIC_CHECK);
        }
        $data = UserType::find($requestedData->id);
        $data->name = $requestedData->name;
        $data->save();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_user_type($id)
    {
        if($id>0 && $id <=6){
            return response()->json(['success'=>2,'data'=>null], 201,[],JSON_NUMERIC_CHECK);
        }
        $data = UserType::find($id);
        $data->delete();

        DB::select("delete FROM menu_management where user_type_id = ".$id);

        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserType $userType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserTypeRequest $request, UserType $userType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserType $userType)
    {
        //
    }
}
