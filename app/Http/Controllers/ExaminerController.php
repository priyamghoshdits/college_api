<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExaminerResource;
use App\Models\Examiner;
use App\Http\Requests\StoreExaminerRequest;
use App\Http\Requests\UpdateExaminerRequest;
use Illuminate\Http\Request;

class ExaminerController extends Controller
{
    public function save_examiner(Request $request)
    {
        foreach ($request['paper_array'] as $list) {
            $data = new Examiner();
            $data->staff_id = $list['staff_id'];
            $data->examination_name = $list['examination_name'];
            $data->type_of_examiner = $list['type_of_examiner'];
            $data->university_name = $list['university_name'];
            $data->referance_no = $list['referance_no'];
            $data->ref_date = $list['ref_date'];
            $data->paper_file = $list['paper_file'];
            $data->save();
        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }


    public function search_examiner(Request $request){
        $requestedData = (object)$request->json()->all();
        if($requestedData->staff_id == null || $requestedData->staff_id == "null"){
            $data = Examiner::whereBetween('ref_date', [$requestedData->from_date, $requestedData->to_date])->get();
        }else{
            $data = Examiner::whereBetween('ref_date', [$requestedData->from_date, $requestedData->to_date])
                ->whereStaffId($requestedData->staff_id)
                ->get();
        }
        return response()->json(['success' => 1, 'data' =>ExaminerResource::collection($data)], 200, [], JSON_NUMERIC_CHECK);
    }


    public function save_upload_file(Request $request)
    {
        $file_name = '';
        if ($files = $request->file('paper_file')) {
            $destinationPath = public_path('/examiner/');
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $file_name = $files->getClientOriginalName();
        }
        return response()->json(['success' => 1, 'file_name' => $file_name], 200);
    }


    public function update_examiner(Request $request)
    {
        $data = Examiner::find($request['id']);
        $data->staff_id = $request['staff_id'];
        $data->examination_name = $request['examination_name'];
        $data->type_of_examiner = $request['type_of_examiner'];
        $data->university_name = $request['university_name'];
        $data->referance_no = $request['referance_no'];
        $data->ref_date = $request['ref_date'];

        if ($files = $request->file('file')) {
            $destinationPath = public_path('/paper_file/');
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $data->paper_file = $files->getClientOriginalName();
        }
        $data->update();

        return response()->json(['success' => 1, 'data' => $data], 200);
    }

    public function delete_examiner($id)
    {
        $data = Examiner::find($id);
        $data->delete();

        $data = Examiner::get();
        return response()->json(['success' => 1, 'data' => ExaminerResource::collection($data)], 200);
    }

    public function store(StoreExaminerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Examiner $examiner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Examiner $examiner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExaminerRequest $request, Examiner $examiner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Examiner $examiner)
    {
        //
    }
}
