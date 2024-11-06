<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateStudentInternshipRequest;
use App\Http\Resources\StudentInternshipResource;
use App\Models\StudentInternship;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentInternshipController extends Controller
{
    public function get_student_internship()
    {
        $data = StudentInternship::get();
        return response()->json(['success' => 1, 'data' => StudentInternshipResource::collection($data)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_student_internship(Request $request)
    {
        $data = new StudentInternship();
        $data->course_id = $request['course_id'];
        $data->semester_id = $request['semester_id'];
        $data->session_id = $request['session_id'];
        $data->student_id = $request['student_id'];                                        
        $data->from_date = $request['from_date'];
        $data->to_date = $request['to_date'];
        $data->institutional_name = $request['institutional_name'];
        if ($files = $request->file('file')) {
            // Define upload path
            $destinationPath = public_path('/student_internship/'); // upload path
            // Upload Orginal Image
            $profileImage1 = uniqid() . '_' . Carbon::now()->format('Ymd_His') . '_' . $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $data->file_name = $profileImage1;
        }
        $data->save();

        return response()->json(['success' => 1, 'data' =>new StudentInternshipResource($data)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_student_internship(Request $request)
    {
        $data = StudentInternship::find($request['id']);
        $data->course_id = $request['course_id'];
        $data->semester_id = $request['semester_id'];
        $data->session_id = $request['session_id'];
        $data->student_id = $request['student_id'];
        $data->from_date = $request['from_date'];
        $data->to_date = $request['to_date'];
        $data->institutional_name = $request['institutional_name'];
        if ($files = $request->file('file')) {
            if (file_exists(public_path() . '/student_internship/' . $data->file_name)) {
                File::delete(public_path() . '/student_internship/' . $data->file_name);
            }
            // Define upload path
            $destinationPath = public_path('/student_internship/'); // upload path
            // Upload Orginal Image
            $profileImage1 = uniqid() . '_' . Carbon::now()->format('Ymd_His') . '_' . $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $data->file_name = $profileImage1;
        }
        $data->save();

        return response()->json(['success' => 1, 'data' =>new StudentInternshipResource($data)], 200, [], JSON_NUMERIC_CHECK);
    }


    public function delete_student_internship($id)
    {
        $data = StudentInternship::find($id);
        $data->delete();
        return response()->json(['success' => 1, 'data' =>new StudentInternshipResource($data)], 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentInternship $studentInternship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentInternshipRequest $request, StudentInternship $studentInternship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentInternship $studentInternship)
    {
        //
    }
}
