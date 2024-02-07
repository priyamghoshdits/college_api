<?php

namespace App\Http\Controllers;

use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function get_department(Request $request)
    {
        $data = Department::whereFranchiseId($request->user()->franchise_id)->get();
        return response()->json(['success'=>1,'data'=>DepartmentResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_department(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $data = new Department();
        $data->user_id = $requestData->user_id;
        $data->name = $requestData->name;
        $data->franchise_id = $request->user()->franchise_id;
        $data->save();
        return response()->json(['success'=>1,'data'=>new DepartmentResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_department(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $data = Department::find($requestData->id);
        $data->user_id = $requestData->user_id;
        $data->name = $requestData->name;
        $data->update();
        return response()->json(['success'=>1,'data'=>new DepartmentResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_department($id)
    {
        $data = Department::find($id);
        $data->delete();
        return response()->json(['success'=>1,'data'=>new DepartmentResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
    }
}
