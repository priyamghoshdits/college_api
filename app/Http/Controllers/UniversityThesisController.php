<?php

namespace App\Http\Controllers;

use App\Http\Resources\UniversityThesisResource;
use App\Models\UniversityThesis;
use Illuminate\Http\Request;

class UniversityThesisController extends Controller
{
    public function get_university_thesis($staff_id = null)
    {
        if ($staff_id) {
            $PgPhdGuide = UniversityThesis::where('staff_id', $staff_id)->get();
        } else {
            $PgPhdGuide = UniversityThesis::get();
        }
        return response()->json(['success' => 1, 'data' => UniversityThesisResource::collection($PgPhdGuide)], 200);
    }

    public function save_university_thesis_file(Request $request)
    {
        $file_name = '';
        if ($files = $request->file('file_name')) {
            $destinationPath = public_path('/university_thesis/');
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $file_name = $files->getClientOriginalName();
        }
        return response()->json(['success' => 1, 'file_name' => $file_name], 200);
    }

    public function save_university_thesis(Request $request)
    {
        foreach ($request['university_thesis_array'] as $list) {
            $data = new UniversityThesis();
            $data->staff_id = $list['staff_id'];
            $data->student_id = $list['student_id'];
            $data->institute_name = $list['institute_name'];
            $data->title = $list['title'];
            $data->course = $list['course'];
            $data->thesis_type_id = $list['thesis_type_id'];
            $data->guide = $list['guide'];
            $data->co_guide = $list['co_guide'];
            $data->university_name = $list['university_name'];
            $data->referance_no = $list['referance_no'];
            $data->ref_date = $list['ref_date'];
            $data->file_name = $list['file_name'] ?? null;
            $data->date_evaluation = $list['date_evaluation'];
            $data->save();
        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_university_thesis(Request $request)
    {
        foreach ($request['university_thesis_array'] as $list) {

            $university_thesis = UniversityThesis::find($list['id']);
            if (!$university_thesis) {
                $data = new UniversityThesis();
                $data->staff_id = $list['staff_id'];
                $data->student_id = $list['student_id'];
                $data->institute_name = $list['institute_name'];
                $data->title = $list['title'];
                $data->course = $list['course'];
                $data->thesis_type_id = $list['thesis_type_id'];
                $data->guide = $list['guide'];
                $data->co_guide = $list['co_guide'];
                $data->university_name = $list['university_name'];
                $data->referance_no = $list['referance_no'];
                $data->ref_date = $list['ref_date'];
                $data->file_name = $list['file_name'];
                $data->date_evaluation = $list['date_evaluation'];
                $data->save();
            } else {
                $university_thesis->staff_id = $list['staff_id'];
                $university_thesis->student_id = $list['student_id'];
                $university_thesis->institute_name = $list['institute_name'];
                $university_thesis->title = $list['title'];
                $university_thesis->course = $list['course'];
                $university_thesis->thesis_type_id = $list['thesis_type_id'];
                $university_thesis->guide = $list['guide'];
                $university_thesis->co_guide = $list['co_guide'];
                $university_thesis->university_name = $list['university_name'];
                $university_thesis->referance_no = $list['referance_no'];
                $university_thesis->ref_date = $list['ref_date'];
                $university_thesis->file_name = $list['file_name'];
                $university_thesis->date_evaluation = $list['date_evaluation'];
                $university_thesis->update();
            }
        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_university_thesis($id)
    {
        $university_thesis = UniversityThesis::find($id);
        $university_thesis->delete();

        $university_thesis_data = UniversityThesis::get();
        return response()->json(['success' => 1, 'data' => UniversityThesisResource::collection($university_thesis_data)], 200);
    }

    public function save_university_thesis_app(Request $request)
    {
        $data = $request->json()->all();
        foreach ($data as $list){
            if($list['id'] != null){
                $universitySynopsys = UniversityThesis::find($list['id']);
                $universitySynopsys->staff_id = $list['staff_id'];
                $universitySynopsys->student_id = $list['student_id'];
                $universitySynopsys->institute_name = $list['institute_name'];
                $universitySynopsys->title = $list['title'];
                $universitySynopsys->course = $list['course'];
                $universitySynopsys->thesis_type_id = $list['thesis_type_id'];
                $universitySynopsys->guide = $list['guide'];
                $universitySynopsys->co_guide = $list['co_guide'];
                $universitySynopsys->university_name = $list['university_name'];
                $universitySynopsys->referance_no = $list['referance_no'];
                $universitySynopsys->ref_date = $list['ref_date'];
                $universitySynopsys->file_name = $list['file_name'];
                $universitySynopsys->date_evaluation = $list['date_evaluation'];
                $universitySynopsys->update();
            }else{
                $universitySynopsys = new UniversityThesis();
                $universitySynopsys->staff_id = $list['staff_id'];
                $universitySynopsys->student_id = $list['student_id'];
                $universitySynopsys->institute_name = $list['institute_name'];
                $universitySynopsys->title = $list['title'];
                $universitySynopsys->course = $list['course'];
                $universitySynopsys->thesis_type_id = $list['thesis_type_id'];
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
