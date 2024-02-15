<?php

namespace App\Http\Controllers;

use App\Http\Resources\RolesAndPermissionResource;
use App\Models\Roles;
use App\Http\Requests\StoreRolesRequest;
use App\Http\Requests\UpdateRolesRequest;
use App\Models\RolesAndPermission;
use App\Models\UserType;
use Couchbase\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    public function get_roles_and_permission(Request $request)
    {
        if(Cache::has('get_roles_and_permission_'.$request->user()->user_type_id)){
            $data = Cache::get('get_roles_and_permission');
            return response()->json(['success'=>1,'from'=>'Cache','data'=>RolesAndPermissionResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
        }else{
            $data = Cache::rememberForever('get_roles_and_permission', function () use($request) {
                $data = Roles::get();
                $user_type_id = $request->user()->user_type_id;
                foreach ($data as $list){
                    $list->user_type_id = $user_type_id;
                }
                return $data;
            });
        }

        return response()->json(['success'=>1,'data'=>RolesAndPermissionResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_roles_and_permission_for_update()
    {
        $user_type = UserType::get();
        $roles = Roles::get();
        $roleArr = [];
        $retArr = [];
        foreach ($user_type as $type){
            foreach ($roles as $role){
                $roleArr[] = $this->make_role($type['id'], $role['id']);
            }
            $a = [
                'id' => $type['id'],
                'name' => $type['name'],
                'role' => $roleArr
            ];
            $retArr[] = $a;
            $roleArr = [];
        }
        return response()->json(['success'=>1,'data'=>$retArr], 200,[],JSON_NUMERIC_CHECK);
    }

    public function make_role($userTypeId, $role_id)
    {
        return [
                'id' => $role_id,
                'name' => Roles::find($role_id)->name,
                'permission' => DB::select("select id,name, permission from roles_and_permissions where user_type_id = ? and role_id = ?", [$userTypeId,$role_id]),
        ];
    }

    public function update_role_and_permissions($id)
    {
        $roleAndPermission = RolesAndPermission::find($id);
        $roleAndPermission->permission = ($roleAndPermission->permission == 0)?1:0;
        $roleAndPermission->update();
        Cache::forget('get_roles_and_permission_'.$roleAndPermission->user_type_id);
        return response()->json(['success'=>1,'data'=>$roleAndPermission], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Roles $roles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRolesRequest $request, Roles $roles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Roles $roles)
    {
        //
    }
}
