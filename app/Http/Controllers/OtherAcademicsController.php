<?php

namespace App\Http\Controllers;

use App\Http\Resources\OtherAcademicResource;
use App\Models\OtherAcademics;
use App\Http\Requests\StoreOtherAcademicsRequest;
use App\Http\Requests\UpdateOtherAcademicsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OtherAcademicsController extends Controller
{
    public function get_other_academics()
    {
        $other_academics = OtherAcademics::get();
        return response()->json(['success' => 1, 'data' => OtherAcademicResource::collection($other_academics)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_other_academics(Request $request)
    {
        $academics = new OtherAcademics();
        $academics->designation = $request['designation'];
        $academics->appointed_by = $request['appointed_by'];
        $academics->date_of_appointment = $request['date_of_appointment'];
        if ($files = $request->file('file')) {
            $destinationPath = public_path('/other_academics/');
            $extension = $files->getClientOriginalExtension();
            $profileImage1 = pathinfo($files->getClientOriginalName(), PATHINFO_FILENAME) . '_' .date('Ymd_His'). '.' . $extension;
            $files->move($destinationPath, $profileImage1);
            $academics->file_name = $profileImage1 ?? null;
        }
        $academics->save();

        return response()->json(['success' => 1, 'data' => new OtherAcademicResource($academics) , 'message' => 'Saved successfully'], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_other_academics(Request $request)
    {
        $academics = OtherAcademics::find($request['id']);
        $academics->designation = $request['designation'];
        $academics->appointed_by = $request['appointed_by'];
        $academics->date_of_appointment = $request['date_of_appointment'];
        if ($files = $request->file('file')) {
            if (file_exists(public_path() . '/other_academics/' . $academics->file_name)) {
                File::delete(public_path() . '/other_academics/' . $academics->file_name);
            }
            $destinationPath = public_path('/other_academics/');
            $extension = $files->getClientOriginalExtension();
            $profileImage1 = pathinfo($files->getClientOriginalName(), PATHINFO_FILENAME) . '_' .date('Ymd_His'). '.' . $extension;
            $files->move($destinationPath, $profileImage1);
            $academics->file_name = $profileImage1 ?? null;
        }
        $academics->save();

        return response()->json(['success' => 1, 'data' => new OtherAcademicResource($academics) , 'message' => 'Updated successfully'], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_other_academics($id)
    {
        $academics = OtherAcademics::find($id);
        if (file_exists(public_path() . '/other_academics/' . $academics->file_name)) {
            File::delete(public_path() . '/other_academics/' . $academics->file_name);
        }
        $academics->delete();

        return response()->json(['success' => 1, 'data' => new OtherAcademicResource($academics) , 'message' => 'Deleted successfully'], 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OtherAcademics $otherAcademics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOtherAcademicsRequest $request, OtherAcademics $otherAcademics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OtherAcademics $otherAcademics)
    {
        //
    }
}
