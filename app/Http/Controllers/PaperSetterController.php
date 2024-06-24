<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaperSetterResource;
use App\Models\PaperSetter;
use App\Http\Requests\StorePaperSetterRequest;
use App\Http\Requests\UpdatePaperSetterRequest;
use Illuminate\Http\Request;

class PaperSetterController extends Controller
{


    public function save_PaperSetter(Request $request)
    {
        foreach ($request['paper_array'] as $list) {
            $data = new PaperSetter();
            $data->staff_id = $list['staff_id'];
            $data->examination_name = $list['examination_name'];
            $data->subject_name = $list['subject_name'];
            $data->university_name = $list['university_name'];
            $data->referance_no = $list['referance_no'];
            $data->ref_date = $list['ref_date'];
            $data->paper_file = $list['paper_file'];
            $data->save();
        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }


    public function search_paper_setting(Request $request){
        $requestedData = (object)$request->json()->all();
        if($requestedData->staff_id == null || $requestedData->staff_id == "null"){
            $data = PaperSetter::whereBetween('ref_date', [$requestedData->from_date, $requestedData->to_date])->get();
        }else{
            $data = PaperSetter::whereBetween('ref_date', [$requestedData->from_date, $requestedData->to_date])
                ->whereStaffId($requestedData->staff_id)
                ->get();
        }
        return response()->json(['success' => 1, 'data' => PaperSetterResource::collection($data)], 200, [], JSON_NUMERIC_CHECK);
    }


    public function save_upload_file(Request $request)
    {
        $file_name = '';
        if ($files = $request->file('paper_file')) {
            $destinationPath = public_path('/paper_file/');
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $file_name = $files->getClientOriginalName();
        }
        return response()->json(['success' => 1, 'file_name' => $file_name], 200);
    }


    public function update_PaperSetter(Request $request)
    {
        $data = PaperSetter::find($request['id']);
        $data->staff_id = $request['staff_id'];
        $data->examination_name = $request['examination_name'];
        $data->subject_name = $request['subject_name'];
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

    public function delete_PaperSetter($id)
    {
        $paperSetter = PaperSetter::find($id);
        $paperSetter->delete();

        $paperSetter = PaperSetter::get();
        return response()->json(['success' => 1, 'data' =>PaperSetterResource::collection($paperSetter)], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(PaperSetter $paperSetter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaperSetter $paperSetter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaperSetterRequest $request, PaperSetter $paperSetter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaperSetter $paperSetter)
    {
        //
    }
}
