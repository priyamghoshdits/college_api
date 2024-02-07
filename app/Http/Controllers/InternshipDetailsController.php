<?php

namespace App\Http\Controllers;

use App\Http\Resources\InternshipDetailsResource;
use App\Models\InternshipDetails;
use App\Http\Requests\StoreInternshipDetailsRequest;
use App\Http\Requests\UpdateInternshipDetailsRequest;
use Illuminate\Http\Request;

class InternshipDetailsController extends Controller
{
    public function get_internship_details(Request $request)
    {
        $data = InternshipDetails::select('*', 'internship_details.id as id')
            ->join('users', 'users.id', '=', 'internship_details.user_id')
            ->where('users.franchise_id',$request->user()->franchise_id)
            ->get();
        return response()->json(['success'=>1,'data'=>InternshipDetailsResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_internship_details(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = new InternshipDetails();
        $data->internship_provider_id = $requestedData->internship_provider_id;
        $data->user_id = $requestedData->user_id;
        $data->from_date = $requestedData->from_date;
        $data->to_date = $requestedData->from_date;
        $data->save();
        return response()->json(['success'=>1,'data'=>new InternshipDetailsResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_internship_details(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = InternshipDetails::find($requestedData->id);
        $data->internship_provider_id = $requestedData->internship_provider_id;
        $data->user_id = $requestedData->user_id;
        $data->from_date = $requestedData->from_date;
        $data->to_date = $requestedData->from_date;
        $data->update();
        return response()->json(['success'=>1,'data'=>new InternshipDetailsResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_internship_details($id)
    {
        $data = InternshipDetails::find($id);
        $data->delete();
        return response()->json(['success'=>1,'data'=>new InternshipDetailsResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InternshipDetails $internshipDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInternshipDetailsRequest $request, InternshipDetails $internshipDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InternshipDetails $internshipDetails)
    {
        //
    }
}
