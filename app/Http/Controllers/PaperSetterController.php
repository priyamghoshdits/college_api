<?php

namespace App\Http\Controllers;

use App\Models\PaperSetter;
use App\Http\Requests\StorePaperSetterRequest;
use App\Http\Requests\UpdatePaperSetterRequest;
use Illuminate\Http\Request;

class PaperSetterController extends Controller
{


    public function save_PaperSetter(Request $request)
    {
        // return $request->all();
        foreach ($request['paper_array'] as $list) {
            $data = new PaperSetter();
            $data->staff_id = $list['staff_id'];
            $data->examination_name = $list['examination_name'];
            $data->subject_name = $list['subject_name'];
            $data->university_name = $list['university_name'];
            $data->referance_no = $list['referance_no'];
            $data->ref_date = $list['ref_date'];
            $data->paper_file = $list['paper_file'] ?? 'N/A';

            $data->save();
        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
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
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaperSetterRequest $request)
    {
        //
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
