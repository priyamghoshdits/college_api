<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\RolesAndPermission;
use App\Http\Requests\StoreRolesAndPermissionRequest;
use App\Http\Requests\UpdateRolesAndPermissionRequest;
use App\Models\UserType;

class RolesAndPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function initilialize()
    {
        $roles = Roles::get();
        $userTypes = UserType::get();
        $data = [
            'SAVE','UPDATE','DELETE','SHOW'
        ];
        foreach ($userTypes as $userType){
            foreach ($roles as $role){
                $check = RolesAndPermission::whereRoleId($role['id'])->whereUserTypeId($userType['id'])->first();
                if($check){
                    continue;
                }
                for ($x = 0; $x <= 3; $x++) {
                    $rolesAndPermission = new RolesAndPermission();
                    $rolesAndPermission->user_type_id = $userType['id'];
                    $rolesAndPermission->role_id = $role['id'];
                    $rolesAndPermission->name = $data[$x];
                    $rolesAndPermission->permission = TRUE;
                    $rolesAndPermission->save();
                }
            }
        }

        return 1;
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
    public function store(StoreRolesAndPermissionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RolesAndPermission $rolesAndPermission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RolesAndPermission $rolesAndPermission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRolesAndPermissionRequest $request, RolesAndPermission $rolesAndPermission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RolesAndPermission $rolesAndPermission)
    {
        //
    }
}
