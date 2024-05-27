<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubjectGroupResource;
use App\Models\Course;
use App\Models\CourseGroup;
use App\Models\Subject;
use App\Models\SubjectGroup;
use App\Http\Requests\StoreSubjectGroupRequest;
use App\Http\Requests\UpdateSubjectGroupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectGroupController extends Controller
{
    public function get_subject_group()
    {
        $subjectGroup = SubjectGroup::select('course_id','name')->distinct()->get();
        return response()->json(['success'=>1,'data'=>SubjectGroupResource::collection($subjectGroup)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function save_subject_group(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $course_id = $requestedData->course_id;
        $check = SubjectGroup::whereCourseId($course_id)->first();
        if($check){
            return response()->json(['success'=>2,'data'=>null], 200,[],JSON_NUMERIC_CHECK);
        }
        $semester_id = $requestedData->semester_id;
        $name = $requestedData->name;
            foreach ($requestedData->subject as $value){
                $subject = new SubjectGroup();
                $subject->course_id = $course_id;
                $subject->name = $name;
                $subject->semester_id = $semester_id;
                $subject->subject_id = $value['id'];
                $subject->save();
            }
        $subjectGroup = SubjectGroup::select('course_id','name')->distinct()->get();
        return response()->json(['success'=>1,'data'=>SubjectGroupResource::collection($subjectGroup)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_subject_group(Request $request){
        $requestedData = (object)$request->json()->all();
//        return $requestedData->semester;
        $course_id = $requestedData->course_id;
        $semester_id = $requestedData->semester;
        $old_semester_id = $requestedData->old_semester;
        $name = $requestedData->name;
        $test = [];
        foreach ($requestedData->subject as $list){
            $test[] = $list['id'];
        }
        $tempSem = SubjectGroup::select('course_id','semester_id','subject_id')
            ->whereCourseId($requestedData->course_id)
            ->whereNotIn('subject_id', $test)
            ->distinct()
            ->get();
        if($tempSem){
            foreach ($tempSem as $d_sem){
                $data = SubjectGroup::whereCourseId($d_sem->course_id)->whereSubjectId($d_sem->subject_id)->first();
                $data->delete();
            }
        }

            foreach ($requestedData->subject as $value){
                $temp = SubjectGroup::whereCourseId($course_id)->whereSemesterId($old_semester_id)->whereSubjectId($value['id'])->first();
                if($temp){
                    continue;
                }else{
                    $subject = new SubjectGroup();
                    $subject->course_id = $course_id;
                    $subject->name = $name;
                    $subject->semester_id = $old_semester_id;
                    $subject->subject_id = $value['id'];
                    $subject->save();
                }
            }

        if($semester_id != $old_semester_id){
            $data = SubjectGroup::whereCourseId($course_id)->whereSemesterId($old_semester_id)->get();
            foreach ($data as $item){
                $objectUpdate = SubjectGroup::find($item['id']);
                $objectUpdate->semester_id = $semester_id;
                $objectUpdate->update();
            }
        }

        $subjectGroup = SubjectGroup::select('course_id','name')->distinct()->get();
        return response()->json(['success'=>1,'data'=>SubjectGroupResource::collection($subjectGroup)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_subject_group($course_id){
        $data = SubjectGroup::whereCourseId($course_id)->get();
        foreach ($data as $list){
            $list->delete();
        }
        $subjectGroup = SubjectGroup::select('course_id','name')->distinct()->get();
        return response()->json(['success'=>1,'data'=>SubjectGroupResource::collection($subjectGroup)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_subject_group_by_course_semester($course_id,$semester_id)
    {
        $data = SubjectGroup::select('subject_groups.id','subject_groups.name')
            ->whereCourseId($course_id)
            ->whereSemesterId($semester_id)
            ->get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_subjects($course_id,$semester_id)
    {
        $data = SubjectGroup::select('subjects.id','subjects.name')->whereCourseId($course_id)->whereSemesterId($semester_id)
            ->join('subjects', 'subjects.id', '=', 'subject_groups.subject_id')
            ->get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubjectGroup $subjectGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectGroupRequest $request, SubjectGroup $subjectGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubjectGroup $subjectGroup)
    {
        //
    }
}
