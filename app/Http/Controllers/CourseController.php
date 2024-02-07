<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\CourseGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function get_course()
    {
        $course = Course::get();
        return response()->json(['success'=>1,'data'=>CourseResource::collection($course)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_course(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $course = new Course();
        $course->course_name = $requestedData->course_name;
        $course->duration = $requestedData->duration;
        $course->save();

        foreach ($requestedData->semester as $lists){
            $list = (object)$lists;
            $courseGroup = new CourseGroup();
            $courseGroup->course_id = $course->id;
            $courseGroup->semester_id = $list->semester_id;
            $courseGroup->save();
        }

        return response()->json(['success'=>1,'data'=>new CourseResource($course)], 200,[],JSON_NUMERIC_CHECK);

    }

    public function delete_course($id)
    {
        $course = Course::find($id);
        $course->delete();
        DB::select("delete from course_groups where course_id = ".$id);
        return response()->json(['success'=>1,'data'=>$course], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function upload_file(Request $request)
    {
        if ($files = $request->file('image')) {
            // Define upload path
            $destinationPath = public_path('/blog/'); // upload path
            // Upload Orginal Image
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
        }
    }

    public function update_course(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $course = Course::find($requestedData->id);
        $course->course_name = $requestedData->course_name;
        $course->duration = $requestedData->duration;
        $course->update();

        foreach ($requestedData->semester as $lists){
            $list = (object)$lists;
            $courseGroup = CourseGroup::whereCourseId($course->id)->whereSemesterId($list->semester_id)->first();
            if($courseGroup){
                continue;
            }else{
                $courseGroup = new CourseGroup();
                $courseGroup->course_id = $course->id;
                $courseGroup->semester_id = $list->semester_id;
                $courseGroup->save();
            }

        }

        return response()->json(['success'=>1,'data'=>new CourseResource($course)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
