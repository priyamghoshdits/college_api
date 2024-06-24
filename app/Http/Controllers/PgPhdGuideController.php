<?php

namespace App\Http\Controllers;

use App\Http\Resources\PgPhdGuideResource;
use App\Models\PgPhdGuide;
use Illuminate\Http\Request;

class PgPhdGuideController extends Controller
{

    public function get_pg_phd_guide($staff_id = null)
    {
        if ($staff_id) {
            $PgPhdGuide = PgPhdGuide::where('staff_id', $staff_id)->get();
        } else {
            $PgPhdGuide = PgPhdGuide::get();
        }
        return response()->json(['success' => 1, 'data' => PgPhdGuideResource::collection($PgPhdGuide)], 200);
    }

    public function save_upload_file_pg(Request $request)
    {
        $file_name = '';
        if ($files = $request->file('file_name')) {
            $destinationPath = public_path('/pg_phd_guide_file/');
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $file_name = $files->getClientOriginalName();
        }
        return response()->json(['success' => 1, 'file_name' => $file_name], 200);
    }

    public function save_pg_phd_guide(Request $request)
    {
        foreach ($request['pgphdguid_array'] as $list) {
            $data = new PgPhdGuide();
            $data->staff_id = $list['staff_id'];
            $data->student_id = $list['student_id'];
            $data->course = $list['course'];
            $data->title_name = $list['title_name'];
            $data->guide = $list['guide'];
            $data->co_guide = $list['co_guide'];
            $data->referance_no = $list['referance_no'];
            $data->ref_date = $list['ref_date'];
            $data->file_name = $list['file_name'];
            $data->status = $list['status'];
            $data->save();
        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_pg_phd_guide(Request $request)
    {
        foreach ($request['pgphdguid_array'] as $list) {

            $pg_php_guide = PgPhdGuide::find($list['id']);
            if (!$pg_php_guide) {
                $data = new PgPhdGuide();
                $data->staff_id = $list['staff_id'];
                $data->student_id = $list['student_id'];
                $data->course = $list['course'];
                $data->title_name = $list['title_name'];
                $data->guide = $list['guide'];
                $data->co_guide = $list['co_guide'];
                $data->referance_no = $list['referance_no'];
                $data->ref_date = $list['ref_date'];
                $data->file_name = $list['file_name'];
                $data->status = $list['status'];
                $data->save();
            } else {
                $pg_php_guide->staff_id = $list['staff_id'];
                $pg_php_guide->student_id = $list['student_id'];
                $pg_php_guide->course = $list['course'];
                $pg_php_guide->title_name = $list['title_name'];
                $pg_php_guide->guide = $list['guide'];
                $pg_php_guide->co_guide = $list['co_guide'];
                $pg_php_guide->referance_no = $list['referance_no'];
                $pg_php_guide->ref_date = $list['ref_date'];
                $pg_php_guide->file_name = $list['file_name'];
                $pg_php_guide->status = $list['status'];
                $pg_php_guide->update();
            }
        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_pg_phd_guide($id)
    {
        $paperSetter = PgPhdGuide::find($id);
        $paperSetter->delete();

        $paperSetter = PgPhdGuide::get();
        return response()->json(['success' => 1, 'data' => PgPhdGuideResource::collection($paperSetter)], 200);
    }
}
