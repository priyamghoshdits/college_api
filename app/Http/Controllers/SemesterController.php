<?php

namespace App\Http\Controllers;

use App\Models\CourseGroup;
use App\Models\Semester;
use App\Http\Requests\StoreSemesterRequest;
use App\Http\Requests\UpdateSemesterRequest;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function get_semester()
    {
        $data = Semester::get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_semester(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $semester = new Semester();
        $semester->name = $requestedData->name;
        $semester->save();
        return response()->json(['success'=>1,'data'=>$semester], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_semester(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $semester = Semester::find($requestedData->id);
        $semester->name = $requestedData->name;
        $semester->update();
        return response()->json(['success'=>1,'data'=>$semester], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_semester($id)
    {
        $semester = Semester::find($id);
        $semester->delete();
        return response()->json(['success'=>1,'data'=>$semester], 200,[],JSON_NUMERIC_CHECK);
    }

    public function semester_by_course($id)
    {
        $data = CourseGroup::select('semesters.id as semester_id','semesters.name')
            ->join('semesters', 'semesters.id', '=', 'course_groups.semester_id')
            ->whereCourseId($id)->get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semester $semester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSemesterRequest $request, Semester $semester)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semester $semester)
    {
        //
    }
}
