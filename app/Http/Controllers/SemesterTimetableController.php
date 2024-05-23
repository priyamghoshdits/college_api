<?php

namespace App\Http\Controllers;

use App\Models\SemesterTimetable;
use App\Http\Requests\StoreSemesterTimetableRequest;
use App\Http\Requests\UpdateSemesterTimetableRequest;
use Illuminate\Http\Request;

class SemesterTimetableController extends Controller
{

    public function save_semester_timetable(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $course_id = $requestedData->course_id;
        $semester_id = $requestedData->semester_id;
        $session_id = $requestedData->session_id;
        foreach($requestedData->details as $detail){
            $saveData = new SemesterTimetable();
            $saveData->course_id = $course_id;
            $saveData->semester_id = $semester_id;
            $saveData->subject_id = $detail['subject_id'];
            $saveData->week_id = $detail['week_id'];
            $saveData->teacher_id = $detail['teacher_id'];
            $saveData->session_id = $session_id;
            $saveData->time_from = $detail['time_from'];
            $saveData->time_to = $detail['time_to'];
            $saveData->room_no = $detail['room_no'];
            $saveData->save();
        }
        return response()->json(['success'=>1,'data'=>$requestedData], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_semester_timetable()
    {
        $data = SemesterTimetable::get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_semester_timetable_by_courseId_semester_id($course_id, $semester_id,$session_id){
        $data = SemesterTimetable::select('semester_timetables.id','users.first_name as teacher_first_name'
            ,'users.middle_name as teacher_middle_name','users.last_name as teacher_last_name'
            ,'courses.id as course_id','semesters.id as semester_id','users.id as teacher_id'
            ,'semester_timetables.week_id','subjects.name as subject_name','courses.course_name','subjects.id as subject_id',
            'semesters.name as semester_name','semester_timetables.time_from','semester_timetables.time_to','semester_timetables.room_no')
            ->Join('subjects', 'subjects.id', '=', 'semester_timetables.subject_id')
            ->Join('courses', 'courses.id', '=', 'semester_timetables.course_id')
            ->Join('semesters', 'semesters.id', '=', 'semester_timetables.semester_id')
            ->Join('week_days', 'week_days.id', '=', 'semester_timetables.week_id')
            ->Join('users', 'users.id', '=', 'semester_timetables.teacher_id')
            ->whereCourseId($course_id)
            ->whereSemesterId($semester_id)
            ->whereSessionId($session_id)
            ->get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_semester_timetable_by_teacher_id($teacher_id)
    {
        $data = SemesterTimetable::select('semester_timetables.id','subjects.name as subject_name','courses.course_name','teacher_id',
            'semesters.name as semester_name','semester_timetables.time_from','semester_timetables.time_to','semester_timetables.room_no')
            ->Join('subjects', 'subjects.id', '=', 'semester_timetables.subject_id')
            ->Join('courses', 'courses.id', '=', 'semester_timetables.course_id')
            ->Join('semesters', 'semesters.id', '=', 'semester_timetables.semester_id')
            ->Join('week_days', 'week_days.id', '=', 'semester_timetables.week_id')
            ->where('teacher_id',$teacher_id)->get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_semester_timetable(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $saveData = SemesterTimetable::find($requestedData->id);
        $saveData->course_id = $requestedData->course_id;
        $saveData->semester_id = $requestedData->semester_id;
        $saveData->subject_id = $requestedData->subject_id;
        $saveData->week_id = $requestedData->week_id;
        $saveData->teacher_id = $requestedData->teacher_id;
        $saveData->time_from = $requestedData->time_from;
        $saveData->time_to = $requestedData->time_to;
        $saveData->room_no = $requestedData->room_number;
        $saveData->update();
        return response()->json(['success'=>1,'data'=>$saveData], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_semester_timetable($id)
    {
        $saveData = SemesterTimetable::find($id);
        $saveData->delete();
        return response()->json(['success'=>1,'data'=>$saveData], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSemesterTimetableRequest $request, SemesterTimetable $semesterTimetable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SemesterTimetable $semesterTimetable)
    {
        //
    }
}
