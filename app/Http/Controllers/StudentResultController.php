<?php

namespace App\Http\Controllers;

use App\Http\Resources\UniversitySynopsisResource;
use App\Models\StudentResult;
use App\Http\Requests\StoreStudentResultRequest;
use App\Http\Requests\UpdateStudentResultRequest;
use Illuminate\Http\Request;

class StudentResultController extends Controller
{
    public function get_student_result($student_id = null)
    {
        if ($student_id) {
            $PgPhdGuide = StudentResult::whereStudentId($student_id)->get();
        } else {
            $PgPhdGuide = StudentResult::get();
        }
        return response()->json(['success' => 1, 'data' => UniversitySynopsisResource::collection($PgPhdGuide)], 200,[], JSON_NUMERIC_CHECK);
    }

    public function save_student_result_file(Request $request)
    {
        $file_name = '';
        if ($files = $request->file('file_name')) {
            $destinationPath = public_path('/student_result/');
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $file_name = $files->getClientOriginalName();
        }
        return response()->json(['success' => 1, 'file_name' => $file_name], 200);
    }

    public function save_student_result(Request $request)
    {
        foreach ($request['student_result_array'] as $list) {
            $data = new StudentResult();
            $data->student_id = $list['student_id'];
            $data->date_of_publication = $list['date_of_publication'];
            $data->exam_marks = $list['exam_marks'];
            $data->total_number_score = $list['total_number_score'];
            $data->synopsis_type_id = $list['synopsis_type_id'];
            $data->percentage = $list['percentage'];
            $data->grade = $list['grade'];
            $data->division = $list['division'];
            $data->file_name = $list['file_name'];
            $data->save();
        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_student_result(Request $request)
    {
        foreach ($request['student_result_array'] as $list) {

            $student_result = StudentResult::find($list['id']);
            if (!$student_result) {
                $data = new StudentResult();
                $data->student_id = $list['student_id'];
                $data->date_of_publication = $list['date_of_publication'];
                $data->exam_marks = $list['exam_marks'];
                $data->total_number_score = $list['total_number_score'];
                $data->synopsis_type_id = $list['synopsis_type_id'];
                $data->percentage = $list['percentage'];
                $data->grade = $list['grade'];
                $data->division = $list['division'];
                $data->file_name = $list['file_name'];
                $data->save();
            } else {
                $data->student_id = $list['student_id'];
                $data->date_of_publication = $list['date_of_publication'];
                $data->exam_marks = $list['exam_marks'];
                $data->total_number_score = $list['total_number_score'];
                $data->synopsis_type_id = $list['synopsis_type_id'];
                $data->percentage = $list['percentage'];
                $data->grade = $list['grade'];
                $data->division = $list['division'];
                $data->file_name = $list['file_name'];
                $student_result->update();
            }
        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_student_result($id)
    {
        $student_result = StudentResult::find($id);
        $student_result->delete();

        $university_synopsis_data = StudentResult::get();
        return response()->json(['success' => 1, 'data' => UniversitySynopsisResource::collection($university_synopsis_data)], 200);
    }

    public function save_student_result_app(Request $request)
    {
        $data = $request->json()->all();
        foreach ($data as $list){
            if($list['id'] != null){
                $universitySynopsys = StudentResult::find($list['id']);
                $universitySynopsys->staff_id = $list['staff_id'];
                $universitySynopsys->student_id = $list['student_id'];
                $universitySynopsys->institute_name = $list['institute_name'];
                $universitySynopsys->title = $list['title'];
                $universitySynopsys->course = $list['course'];
                $universitySynopsys->synopsis_type_id = $list['synopsis_type_id'];
                $universitySynopsys->guide = $list['guide'];
                $universitySynopsys->co_guide = $list['co_guide'];
                $universitySynopsys->university_name = $list['university_name'];
                $universitySynopsys->referance_no = $list['referance_no'];
                $universitySynopsys->ref_date = $list['ref_date'];
                $universitySynopsys->file_name = $list['file_name'];
                $universitySynopsys->date_evaluation = $list['date_evaluation'];
                $universitySynopsys->update();
            }else{
                $universitySynopsys = new StudentResult();
                $universitySynopsys->staff_id = $list['staff_id'];
                $universitySynopsys->student_id = $list['student_id'];
                $universitySynopsys->institute_name = $list['institute_name'];
                $universitySynopsys->title = $list['title'];
                $universitySynopsys->course = $list['course'];
                $universitySynopsys->synopsis_type_id = $list['synopsis_type_id'];
                $universitySynopsys->guide = $list['guide'];
                $universitySynopsys->co_guide = $list['co_guide'];
                $universitySynopsys->university_name = $list['university_name'];
                $universitySynopsys->referance_no = $list['referance_no'];
                $universitySynopsys->ref_date = $list['ref_date'];
                $universitySynopsys->file_name = $list['file_name'];
                $universitySynopsys->date_evaluation = $list['date_evaluation'];
                $universitySynopsys->save();
            }
        }

        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }
}
