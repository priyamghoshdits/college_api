<?php

namespace App\Http\Controllers;

use App\Http\Resources\UniversitySynopsisResource;
use App\Models\UniversitySynopsis;
use Illuminate\Http\Request;

class UniversitySynopsisController extends Controller
{
    public function get_university_synopsis($staff_id = null)
    {
        if ($staff_id) {
            $PgPhdGuide = UniversitySynopsis::where('staff_id', $staff_id)->get();
        } else {
            $PgPhdGuide = UniversitySynopsis::get();
        }
        return response()->json(['success' => 1, 'data' => UniversitySynopsisResource::collection($PgPhdGuide)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_university_synopsis_file(Request $request)
    {
        $file_name = '';
        if ($files = $request->file('file_name')) {
            $destinationPath = public_path('/university_synopsis/');
            $extension = $files->getClientOriginalExtension();
            $profileImage1 = pathinfo($files->getClientOriginalName(), PATHINFO_FILENAME) . '_' . date('Ymd_His') . '.' . $extension;
            $files->move($destinationPath, $profileImage1);
            $file_name = $files->getClientOriginalName();
        }
        return response()->json(['success' => 1, 'file_name' => $file_name], 200);
    }

    public function save_university_synopsis(Request $request)
    {
        foreach ($request['university_synopsis_array'] as $list) {
            $data = new UniversitySynopsis();
            $data->staff_id = $list['staff_id'];
            $data->student_name = $list['student_name'];
            $data->institute_name = $list['institute_name'];
            $data->title = $list['title'];
            $data->course = $list['course'];
            $data->synopsis_type_id = $list['synopsis_type_id'];
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

    public function update_university_synopsis(Request $request)
    {
        foreach ($request['university_synopsis_array'] as $list) {

            $university_synopsis = UniversitySynopsis::find($list['id']);
            if (!$university_synopsis) {
                $data = new UniversitySynopsis();
                $data->staff_id = $list['staff_id'];
                $data->institute_name = $list['institute_name'];
                $data->title = $list['title'];
                $data->course = $list['course'];
                $data->synopsis_type_id = $list['synopsis_type_id'];
                $data->guide = $list['guide'];
                $data->co_guide = $list['co_guide'];
                $data->university_name = $list['university_name'];
                $data->referance_no = $list['referance_no'];
                $data->ref_date = $list['ref_date'];
                $data->file_name = $list['file_name'];
                $data->date_evaluation = $list['date_evaluation'];
                $data->save();
            } else {
                $university_synopsis->staff_id = $list['staff_id'];
                $university_synopsis->institute_name = $list['institute_name'];
                $university_synopsis->title = $list['title'];
                $university_synopsis->course = $list['course'];
                $university_synopsis->synopsis_type_id = $list['synopsis_type_id'];
                $university_synopsis->guide = $list['guide'];
                $university_synopsis->co_guide = $list['co_guide'];
                $university_synopsis->university_name = $list['university_name'];
                $university_synopsis->referance_no = $list['referance_no'];
                $university_synopsis->ref_date = $list['ref_date'];
                $university_synopsis->file_name = $list['file_name'];
                $university_synopsis->date_evaluation = $list['date_evaluation'];
                $university_synopsis->update();
            }
        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_university_synopsis($id)
    {
        $university_synopsis = UniversitySynopsis::find($id);
        $university_synopsis->delete();

        $university_synopsis_data = UniversitySynopsis::get();
        return response()->json(['success' => 1, 'data' => UniversitySynopsisResource::collection($university_synopsis_data)], 200);
    }

    public function save_university_synopsis_app(Request $request)
    {
        $data = $request->json()->all();
        foreach ($data as $list) {
            if ($list['id'] != null) {
                $universitySynopsys = UniversitySynopsis::find($list['id']);
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
            } else {
                $universitySynopsys = new UniversitySynopsis();
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
