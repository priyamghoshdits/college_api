<?php

namespace App\Http\Controllers;

use App\Http\Resources\InternshipDetailsResource;
use App\Models\InternshipDetails;
use App\Http\Requests\StoreInternshipDetailsRequest;
use App\Http\Requests\UpdateInternshipDetailsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class InternshipDetailsController extends Controller
{
    public function get_internship_details(Request $request)
    {
        $data = InternshipDetails::select('*', 'internship_details.id as id')
            ->join('users', 'users.id', '=', 'internship_details.user_id')
            ->where('users.franchise_id', $request->user()->franchise_id)
            ->get();
        return response()->json(['success' => 1, 'data' => InternshipDetailsResource::collection($data)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_internship_details(Request $request)
    {
        $requestedData = (object)$request->all();
        $data = new InternshipDetails();
        $data->internship_provider_id = $requestedData->internship_provider_id;
        $data->user_id = $requestedData->user_id;
        $data->from_date = $requestedData->from_date;
        $data->to_date = $requestedData->to_date;

        if ($internship_file = $request->file('internship_file')) {
            // Define upload path
            $destinationPath = public_path('/internship_file/'); // upload path
            // Upload Orginal Image
            $file_name = $internship_file->getClientOriginalName();
            $internship_file->move($destinationPath, $file_name);
            $data->internship_file = $file_name;
        }

        $data->save();
        return response()->json(['success' => 1, 'data' => new InternshipDetailsResource($data)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_internship_details(Request $request)
    {
        $requestedData = (object)$request->all();
        $data = InternshipDetails::find($requestedData->id);
        $data->internship_provider_id = $requestedData->internship_provider_id;
        $data->user_id = $requestedData->user_id;
        $data->from_date = $requestedData->from_date;
        $data->to_date = $requestedData->from_date;

        if ($internship_file = $request->file('internship_file')) {
            if (file_exists(public_path() . '/internship_file/' . $data->internship_file)) {
                File::delete(public_path() . '/internship_file/' . $data->internship_file);
            }
            // Define upload path
            $destinationPath = public_path('/internship_file/'); // upload path
            // Upload Orginal Image
            $file_name = $internship_file->getClientOriginalName();
            $internship_file->move($destinationPath, $file_name);
            $data->internship_file = $file_name;
        }

        $data->update();
        return response()->json(['success' => 1, 'data' => new InternshipDetailsResource($data)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_internship_details($id)
    {
        $data = InternshipDetails::find($id);
        $data->delete();
        return response()->json(['success' => 1, 'data' => new InternshipDetailsResource($data)], 200, [], JSON_NUMERIC_CHECK);
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
