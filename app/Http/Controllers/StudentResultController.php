<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResultResource;
use App\Models\StudentResult;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StudentResultController extends Controller
{
    public function get_student_result($student_id = null)
    {
        if ($student_id) {
            $data = StudentResult::whereStudentId($student_id)->get();
        } else {
            $data = StudentResult::get();
        }
        return response()->json(['success' => 1, 'data' => StudentResultResource::collection($data)], 200,[], JSON_NUMERIC_CHECK);
    }

    public function save_student_result_file(Request $request)
    {
        $file_name = '';
        if ($files = $request->file('file_name')) {
            $destinationPath = public_path('/student_result/');

            // Assuming $file is an instance of UploadedFile
            $originalName = pathinfo($files->getClientOriginalName(), PATHINFO_FILENAME);
            $profileImage1 = $files->getClientOriginalName();
            // $profileImage1 = $originalName . '_' . date('Ymd_His') . '_' . Str::random(5) . '.' . $extension;


//            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $file_name = $profileImage1;
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
            $data->percentage = $list['percentage'];
            $data->grade = $list['grade'];
            $data->division = $list['division'];
            $data->year_semester = $list['year_semester'];
            $data->university_rank = $list['university_rank'];
            $data->institutional_rank = $list['institutional_rank'];
            $data->university_rank_file_name = $list['university_rank_file_name'];
            $data->file_name = $list['file_name'];
            $data->save();
            // dd($data);

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
                $data->percentage = $list['percentage'];
                $data->grade = $list['grade'];
                $data->division = $list['division'];
                $data->year_semester = $list['year_semester'];
                $data->university_rank = $list['university_rank'];
                $data->institutional_rank = $list['institutional_rank'];
                $data->file_name = $list['file_name'];
                $data->university_rank_file_name = $list['university_rank_file_name'];
                $data->save();
            } else {
//                return $list['student_id'];
                $student_result->student_id = $list['student_id'];
                $student_result->date_of_publication = $list['date_of_publication'];
                $student_result->exam_marks = $list['exam_marks'];
                $student_result->total_number_score = $list['total_number_score'];
                $student_result->percentage = $list['percentage'];
                $student_result->grade = $list['grade'];
                $student_result->division = $list['division'];
                $student_result->year_semester = $list['year_semester'];
                $student_result->university_rank = $list['university_rank'];
                $student_result->institutional_rank = $list['institutional_rank'];
                $student_result->file_name = $list['file_name'] ?? $student_result->file_name;
                $student_result->university_rank_file_name = $list['university_rank_file_name'] ?? $student_result->university_rank_file_name;
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
        return response()->json(['success' => 1, 'data' => StudentResultResource::collection($university_synopsis_data)], 200);
    }

    public function save_student_result_app(Request $request)
    {
        $data = $request->json()->all();
        foreach ($data as $list){
            if($list['id'] != null){
                $universitySynopsys = StudentResult::find($list['id']);
                $universitySynopsys->student_id = $list['student_id'];
                $universitySynopsys->date_of_publication = $list['date_of_publication'];
                $universitySynopsys->exam_marks = $list['exam_marks'];
                $universitySynopsys->total_number_score = $list['total_number_score'];
                $universitySynopsys->percentage = $list['percentage'];
                $universitySynopsys->grade = $list['grade'];
                $universitySynopsys->division = $list['division'];
                $universitySynopsys->file_name = $list['file_name'];
                $universitySynopsys->university_rank_file_name = $list['university_rank_file_name'];
                $universitySynopsys->year_semester = $list['year_semester'];
                $universitySynopsys->university_rank = $list['university_rank'];
                $universitySynopsys->institutional_rank = $list['institutional_rank'];
                $universitySynopsys->update();
            }else{
                $universitySynopsys = new StudentResult();
                $universitySynopsys->student_id = $list['student_id'];
                $universitySynopsys->date_of_publication = $list['date_of_publication'];
                $universitySynopsys->exam_marks = $list['exam_marks'];
                $universitySynopsys->total_number_score = $list['total_number_score'];
                $universitySynopsys->percentage = $list['percentage'];
                $universitySynopsys->grade = $list['grade'];
                $universitySynopsys->division = $list['division'];
                $universitySynopsys->university_rank_file_name = $list['university_rank_file_name'];
                $universitySynopsys->year_semester = $list['year_semester'];
                $universitySynopsys->university_rank = $list['university_rank'];
                $universitySynopsys->institutional_rank = $list['institutional_rank'];
                $universitySynopsys->save();
            }
        }

        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }
}
