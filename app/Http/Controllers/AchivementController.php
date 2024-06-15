<?php

namespace App\Http\Controllers;

use App\Http\Resources\AchivementResource;
use App\Models\Achivement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AchivementController extends Controller
{
    public function get_achievement()
    {
        $achievement = Achivement::get();
        return response()->json(['success' => 1, 'data' =>AchivementResource::collection($achievement)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_achievement(Request $request)
    {
        $achievement = new Achivement();
        $achievement->course_id = $request['course_id'];
        $achievement->semester_id = $request['semester_id'];
        $achievement->session_id = $request['session_id'];
        $achievement->student_id = $request['student_id'];
        $achievement->award_name = $request['award_name'];
        $achievement->award_date = $request['award_date'];
        $achievement->file_name = $achievement->id . '_' .$request['file_name'];
        $achievement->save();

        if ($files = $request->file('file')) {
            // Define upload path
            $destinationPath = public_path('/achievement/'); // upload path
            // Upload Orginal Image
            $profileImage1 = $achievement->id . '_' . $files->getClientOriginalName();
            $achievement = Achivement::find($achievement->id);
            $achievement->file_name = $profileImage1;
            $achievement->update();
            $files->move($destinationPath, $profileImage1);
        }

        return response()->json(['success' => 1, 'data' =>new AchivementResource($achievement)], 200, [], JSON_NUMERIC_CHECK);
    }


    public function update_achievement(Request $request)
    {
        $achievement = Achivement::find($request['id']);

        if ($files = $request->file('file')) {
            if (file_exists(public_path() . '/achievement/' . $achievement->file_name)) {
                File::delete(public_path() . '/achievement/' . $achievement->file_name);
            }
        }

        $achievement->course_id = $request['course_id'];
        $achievement->semester_id = $request['semester_id'];
        $achievement->session_id = $request['session_id'];
        $achievement->student_id = $request['student_id'];
        $achievement->award_name = $request['award_name'];
        $achievement->award_date = $request['award_date'];
        $achievement->file_name = $request['id'].'_'.$request['file_name'];
        $achievement->update();

        if ($files = $request->file('file')) {
            // Define upload path
            $destinationPath = public_path('/achievement/'); // upload path
            // Upload Orginal Image
            $profileImage1 = $achievement->id . '_' . $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
        }

        return response()->json(['success' => 1, 'data' =>new AchivementResource($achievement)], 200, [], JSON_NUMERIC_CHECK);
    }


    public function delete_achievement($id)
    {
        $achievement = Achivement::find($id);

        if (file_exists(public_path() . '/achievement/' . $achievement->file_name)) {
            File::delete(public_path() . '/achievement/' . $achievement->file_name);
        }
        $achievement->delete();

        return response()->json(['success' => 1, 'data' =>new AchivementResource($achievement)], 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achivement $achivement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achivement $achivement)
    {
        //
    }
}
