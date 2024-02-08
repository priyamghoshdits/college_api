<?php

namespace App\Http\Controllers;

use App\Http\Resources\AssignSemesterTeacherResource;
use App\Models\AssignSemesterTeacher;
use App\Http\Requests\StoreAssignSemesterTeacherRequest;
use App\Http\Requests\UpdateAssignSemesterTeacherRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignSemesterTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function save_semester_teacher(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $course_id = $requestedData->course_id;
        $semester_id = $requestedData->semester_id;

        foreach ($requestedData->teacher as $item){
            $assignSemesterTeacher = new AssignSemesterTeacher();
            $assignSemesterTeacher->course_id = $course_id;
            $assignSemesterTeacher->semester_id = $semester_id;
            $assignSemesterTeacher->teacher_id = $item['id'];
            $assignSemesterTeacher->save();
        }
        return response()->json(['success'=>1,'data'=>new AssignSemesterTeacherResource($assignSemesterTeacher)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_semester_teacher(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $course_id = $requestedData->course_id;
        $semester_id = $requestedData->semester_id;

        $test = [];
        foreach ($requestedData->teacher as $list){
            $test[] = $list['id'];
        }
        $tempSem = AssignSemesterTeacher::select('course_id','semester_id','teacher_id')
            ->whereCourseId($requestedData->course_id)
            ->whereSemesterId($requestedData->semester_id)
            ->whereNotIn('teacher_id', $test)
            ->distinct()
            ->get();

//        return response()->json(['success'=>1,'data'=>$tempSem], 200,[],JSON_NUMERIC_CHECK);
        if($tempSem){
            foreach ($tempSem as $d_sem){
                $data = AssignSemesterTeacher::whereCourseId($d_sem->course_id)->whereTeacherId($d_sem->teacher_id)->first();
                $data->delete();
            }
        }

        foreach ($requestedData->teacher as $item){
            $data = AssignSemesterTeacher::whereCourseId($requestedData->course_id)
                ->whereSemesterId($requestedData->semester_id)
                ->whereTeacherId($item['id'])
                ->first();
            if($data){
                continue;
            }else{
                $assignSemesterTeacher = new AssignSemesterTeacher();
                $assignSemesterTeacher->course_id = $course_id;
                $assignSemesterTeacher->semester_id = $semester_id;
                $assignSemesterTeacher->teacher_id = $item['id'];
                $assignSemesterTeacher->save();
            }
        }

        $assignSemesterTeacher  = AssignSemesterTeacher::whereCourseId($requestedData->course_id)
            ->whereSemesterId($requestedData->semester_id)
            ->first();
//        $data = AssignSemesterTeacher::whereCourseId($requestedData->course_id)
//            ->whereSemesterId($requestedData->semester_id)
//            ->get();

//        if(count($requestedData->teacher) != count($data)){
//            foreach ($data as $item){
//                foreach ($requestedData->teacher as $teacher){
////                    if($teacher[]){
////
////                    }
//                }
//            }
//        }

        return response()->json(['success'=>1,'data'=>new AssignSemesterTeacherResource($assignSemesterTeacher)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_assigned_semester_teacher($course_id, $semester_id)
    {
        $data = AssignSemesterTeacher::whereCourseId($course_id)->whereSemesterId($semester_id)->get();
        foreach ($data as $list){
            $list->delete();
        }
        return response()->json(['success'=>1,'data'=>new AssignSemesterTeacherResource($data[0])], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_assigned_semester_teacher()
    {
        $data = DB::select("select DISTINCT course_id, semester_id from assign_semester_teachers");
        return response()->json(['success'=>1,'data'=>AssignSemesterTeacherResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_teachers($course_id,$semester_id)
    {
        $teachers = AssignSemesterTeacher::select('users.id',"users.name")
            ->join('users', 'users.id', '=', 'assign_semester_teachers.teacher_id')
            ->whereCourseId($course_id)->whereSemesterId($semester_id)->get();
        return response()->json(['success'=>1,'data'=>$teachers], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssignSemesterTeacherRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AssignSemesterTeacher $assignSemesterTeacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssignSemesterTeacher $assignSemesterTeacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssignSemesterTeacherRequest $request, AssignSemesterTeacher $assignSemesterTeacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssignSemesterTeacher $assignSemesterTeacher)
    {
        //
    }
}
