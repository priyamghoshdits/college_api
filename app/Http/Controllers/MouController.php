<?php

namespace App\Http\Controllers;

use App\Http\Resources\MouResource;
use App\Http\Resources\StaffEducationResource;
use App\Models\Mou;
use Illuminate\Http\Request;

class MouController extends Controller
{
    public function get_mou()
    {
        $data = Mou::get();
        return response()->json(['success' => 1, 'data' => MouResource::collection($data)], 200,[], JSON_NUMERIC_CHECK);
    }

    public function save_mou_file(Request $request)
    {
        $file_name = '';
        if ($files = $request->file('file_name')) {
            $destinationPath = public_path('/MOU/');
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $file_name = $files->getClientOriginalName();
        }
        return response()->json(['success' => 1, 'file_name' => $file_name], 200);
    }

    public function save_mou(Request $request)
    {
        foreach ($request['staff_education_array'] as $list) {
            $data = new Mou();
            $data->name_of_organisation = $list['name_of_organisation'];
            $data->date_from = $list['date_from'];
            $data->date_to = $list['date_to'];
            $data->course_id = $list['course_id'];
            $data->file_name = $list['file_name'];
            $data->save();
        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_mou(Request $request)
    {
        foreach ($request['staff_education_array'] as $list) {

            $data = Mou::find($list['id']);
            if (!$data) {
                $data = new Mou();
                $data->name_of_organisation = $list['name_of_organisation'];
                $data->date_from = $list['date_from'];
                $data->date_to = $list['date_to'];
                $data->course_id = $list['course_id'];
                $data->file_name = $list['file_name'];
                $data->save();
            } else {
                $data->name_of_organisation = $list['name_of_organisation'];
                $data->date_from = $list['date_from'];
                $data->date_to = $list['date_to'];
                $data->course_id = $list['course_id'];
                $data->file_name = $list['file_name'] ?? $data->file_name;
                $data->update();
            }
        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_mou($id)
    {
        $data = Mou::find($id);
        $data->delete();
        return response()->json(['success' => 1, 'data' => $data], 200);
    }

    public function save_mou_app(Request $request)
    {
        $data = $request->json()->all();
        foreach ($data as $list) {
            if($list['id'] != null){
                $data = Mou::find($list['id']);
                $data->name_of_organisation = $list['name_of_organisation'];
                $data->date_from = $list['date_from'];
                $data->date_to = $list['date_to'];
                $data->course_id = $list['course_id'];
                $data->file_name = $list['file_name'];
                $data->update();
            }else{
                $data = new Mou();
                $data->name_of_organisation = $list['name_of_organisation'];
                $data->date_from = $list['date_from'];
                $data->date_to = $list['date_to'];
                $data->course_id = $list['course_id'];
                $data->file_name = $list['file_name'];
                $data->save();
            }

        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }
}
