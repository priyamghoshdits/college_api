<?php

namespace App\Http\Controllers;

use App\Http\Resources\HomeworkResource;
use App\Models\Homework;
use App\Http\Requests\StoreHomeworkRequest;
use App\Http\Requests\UpdateHomeworkRequest;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    public function get_homework()
    {
        $homework = Homework::get();
        return response()->json(['success'=>1,'data'=>HomeworkResource::collection($homework)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_homework(Request $request)
    {
        $homework = new Homework();
        $homework->course_id = $request['course_id'];
        $homework->semester_id = $request['semester_id'];
        $homework->subject_id = $request['subject_id'];
        $homework->homework_date = $request['homework_date'];
        $homework->submission_date = $request['submission_date'];
        $homework->file_name = $request['file_name'];
        $homework->save();

        if ($files = $request->file('file')) {
            // Define upload path
            $destinationPath = public_path('/homework/'); // upload path
            // Upload Orginal Image
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
        }

        return response()->json(['success'=>1,'data'=>new HomeworkResource($homework)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_homework(Request $request)
    {
        $homework = Homework::find($request['id']);
        $homework->course_id = $request['course_id'];
        $homework->semester_id = $request['semester_id'];
        $homework->subject_id = $request['subject_id'];
        $homework->homework_date = $request['homework_date'];
        $homework->submission_date = $request['submission_date'];
        $homework->file_name = $request['file_name'];
        $homework->update();
        return response()->json(['success'=>1,'data'=>new HomeworkResource($homework)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_homework($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Homework $homework)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHomeworkRequest $request, Homework $homework)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Homework $homework)
    {
        //
    }
}
