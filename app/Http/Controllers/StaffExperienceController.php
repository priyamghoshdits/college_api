<?php

namespace App\Http\Controllers;

use App\Http\Resources\StaffExperienceResource;
use App\Models\StaffExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StaffExperienceController extends Controller
{
    public function get_experience(Request $request)
    {
        $data = StaffExperience::whereFranchiseId($request->user()->franchise_id)->get();
        return response()->json(['success' => 1, 'data' => StaffExperienceResource::collection($data)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_experience(Request $request)
    {
        $data = new StaffExperience();
        $data->staff_id = $request->staff_id;
        $data->designation = $request->designation;
        $data->experience = $request->experience;
        $data->organization = $request->organization;
        $data->from_date = $request->from_date;
        $data->end_date = $request->end_date;

        if ($files = $request->file('experience_proof')) {
            $destinationPath = public_path('/staff_experience_proof/');
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $data->experience_proof = $files->getClientOriginalName();
        }

        $data->save();
        return response()->json(['success' => 1, 'data' => new StaffExperienceResource($data)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_experience(Request $request)
    {
        $data = StaffExperience::find($request->id);
        $data->designation = $request->designation;
        $data->experience = $request->experience;
        $data->organization = $request->organization;
        $data->from_date = $request->from_date;
        $data->end_date = $request->end_date;

        if ($files = $request->file('experience_proof')) {
            if (file_exists(public_path() . '/staff_experience_proof/' . $data->experience_proof)) {
                File::delete(public_path() . '/staff_experience_proof/' . $data->experience_proof);
            }
            $destinationPath = public_path('/staff_experience_proof/');
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $data->experience_proof = $files->getClientOriginalName();
        }

        $data->update();
        return response()->json(['success' => 1, 'data' => new StaffExperienceResource($data)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_experience($id)
    {
        $data = StaffExperience::find($id);
        $data->delete();
        return response()->json(['success' => 1, 'data' => new StaffExperienceResource($data)], 200, [], JSON_NUMERIC_CHECK);
    }
}
