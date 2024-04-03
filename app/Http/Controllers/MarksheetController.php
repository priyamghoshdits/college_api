<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Marksheet;
use App\Http\Requests\StoreMarksheetRequest;
use App\Http\Requests\UpdateMarksheetRequest;
use Illuminate\Http\Request;

class MarksheetController extends Controller
{
    public function saveMarkSheet(Request $request)
    {
        $requestedData = $request->json()->all();
        foreach ($requestedData as $data){
            $marksheet = new Marksheet();
            $marksheet->course_id = $data['course_id'];
            $marksheet->semester_id = $data['semester_id'];
            $marksheet->subject_id = $data['subject_id'];
            $marksheet->student_id = $data['student_id'];
            $marksheet->marks = $data['marks'];
            $marksheet->full_marks = $data['full_marks'];
            $marksheet->save();
        }

        return response()->json(['success'=>1,'data'=> $marksheet], 200,[],JSON_NUMERIC_CHECK);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMarksheetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Marksheet $marksheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marksheet $marksheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMarksheetRequest $request, Marksheet $marksheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marksheet $marksheet)
    {
        //
    }
}
