<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMarksheetRequest;
use App\Http\Requests\UpdateMarksheetRequest;
use App\Http\Resources\MarksheetResource;
use App\Models\Marksheet;
use Illuminate\Http\Request;

class MarksheetController extends Controller
{
    public function save_mark_sheet(Request $request)
    {
        $requestedData = $request->json()->all();
        foreach ($requestedData as $data) {
            $marksheetUpdate = Marksheet::whereCourseId($data['course_id'])
                ->whereSemesterId($data['semester_id'])
                ->whereSessionId($data['session_id'])
                ->whereStudentId($data['student_id'])
                ->whereSubjectId($data['subject_id'])->first();
            if ($marksheetUpdate) {
                $marksheetUpdate->division = $data['division'] ?? $marksheetUpdate->division;
                $marksheetUpdate->date_of_issue = $data['date_of_issue'] ?? $marksheetUpdate->date_of_issue;
                $marksheetUpdate->result_status = $data['result_status'] ?? $marksheetUpdate->result_status;
                $marksheetUpdate->session_id = $data['session_id'] ?? $marksheetUpdate->session_id;
                $marksheetUpdate->marks = $data['marks'] ?? $marksheetUpdate->marks;
                $marksheetUpdate->min_marks = $data['min_marks'] ?? $marksheetUpdate->min_marks;
                $marksheetUpdate->full_marks = $data['full_marks'] ?? $marksheetUpdate->full_marks;
                $marksheetUpdate->update();
            } else {
                $marksheet = new Marksheet();
                $marksheet->course_id = $data['course_id'];
                $marksheet->semester_id = $data['semester_id'];
                $marksheet->subject_id = $data['subject_id'];
                $marksheet->student_id = $data['student_id'];
                $marksheet->division = $data['division'];
                $marksheet->date_of_issue = $data['date_of_issue'];
                $marksheet->result_status = $data['result_status'];
                $marksheet->session_id = $data['session_id'];
                $marksheet->marks = $data['marks'];
                $marksheet->min_marks = $data['min_marks'];
                $marksheet->full_marks = $data['full_marks'];
                $marksheet->save();
            }
        }

        return response()->json(['success' => 1, 'data' => $marksheet ?? $marksheetUpdate], 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMarksheetRequest $request, Marksheet $marksheet)
    {
        //
    }

    public function get_mark_sheet(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $marksheet = Marksheet::select('student_id', 'course_id', 'semester_id','marksheets.date_of_issue' ,'session_id','division','result_status')->whereCourseId($requestedData->course_id)
            ->whereSemesterId($requestedData->semester_id)
            ->whereSessionId($requestedData->session_id)->distinct()->get();
        return response()->json(['success' => 1, 'data' => MarksheetResource::collection($marksheet)], 200, [], JSON_NUMERIC_CHECK);
//        return response()->json(['success'=>1,'data'=> $marksheet], 200,[],JSON_NUMERIC_CHECK);
    }

    public function store(StoreMarksheetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Marksheet $marksheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marksheet $marksheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marksheet $marksheet)
    {
        //
    }
}
