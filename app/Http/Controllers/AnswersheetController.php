<?php

namespace App\Http\Controllers;

use App\Models\Answersheet;
use App\Http\Requests\StoreAnswersheetRequest;
use App\Http\Requests\UpdateAnswersheetRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswersheetController extends Controller
{
    public function get_answersheet()
    {
        $data = Answersheet::get();
        return response()->json(['success'=>1, 'data' => $data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_answersheet(Request $request)
    {
        DB::beginTransaction();
        try {
            $requestedData = $request->json()->all();
            $user_id = $request->user()->id;
            foreach ($requestedData as $list){
                $data = new Answersheet();
                $data->subject_details_id = $list['subject_details_id'];
                $data->question_id = $list['id'];
                $data->student_id = $user_id;
                $data->marks_obtained = $list['marks'];
                $data->student_answer = $list['student_answer'];
                $data->correct_answer = $list['answer'];
                $data->save();
            }
            DB::commit();
            return response()->json(['success'=>1], 200,[],JSON_NUMERIC_CHECK);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 200);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Answersheet $answersheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answersheet $answersheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnswersheetRequest $request, Answersheet $answersheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answersheet $answersheet)
    {
        //
    }
}
