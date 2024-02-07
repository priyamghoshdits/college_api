<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Answersheet;
use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\SubjectDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function get_questions(Request $request)
    {
//        $data = DB::select("SELECT distinct subject_details_id, subject_details.name as subject_details_name, semesters.id, semesters.name as semester_name, courses.id, courses.course_name, subjects.id, subjects.name as subject_name FROM `questions`
//            inner join subject_details on subject_details.id = questions.subject_details_id
//            inner join semesters on semesters.id = subject_details.semester_id
//            inner join courses on courses.id = subject_details.course_id
//            inner join subjects on subjects.id = subject_details.subject_id
//            where questions.franchise_id = ".$request->user()->franchise_id);

        $data = SubjectDetails::whereFranchiseId($request->user()->franchise_id)->get();
        foreach ($data as $list){
            $questionList = Question::whereSubjectDetailsId($list['id'])->get();
            foreach ($questionList as $item2){
                $ans = Answersheet::whereSubjectDetailsId($list['id'])->whereStudentId($request->user()->id)->whereQuestionId($item2['id'])->first();
                if($ans){
                    $item2->student_answer = $ans->student_answer;
                    $item2->marks_obtained = $ans->marks_obtained;
                }else{
                    $item2->student_answer = null;
                    $item2->marks_obtained = null;
                }
            }
            $list->questions = $questionList;
            $list->ans_count = Answersheet::whereSubjectDetailsId($list['id'])->whereStudentId($request->user()->id)->count();
        }
        return response()->json(['success'=>1,'data'=>QuestionResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
//        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_questions(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $subject_details_id = $requestedData->subject_details_id;
        foreach ($requestedData->questions as $list){
            $data = new Question();
            $data->subject_details_id = $subject_details_id;
            $data->question = $list['question'];
            $data->option_1 = $list['option_1'];
            $data->option_2 = $list['option_2'];
            $data->option_3 = $list['option_3'];
            $data->option_4 = $list['option_4'];
            $data->marks = $list['marks'];
            $data->answer = $list['answer'];
            $data->franchise_id =  $request->user()->franchise_id;
            $data->save();
        }
        $getData = SubjectDetails::find($requestedData->subject_details_id);
        return response()->json(['success'=>1, 'data' => new QuestionResource($getData)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function updateStatus($id)
    {
        $data = Question::find($id);
        $data->status = $data->status == 1?0:1;
        $data->save();

        $getData = SubjectDetails::find($data->subject_details_id);
        return response()->json(['success'=>1, 'data' => new QuestionResource($getData)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
