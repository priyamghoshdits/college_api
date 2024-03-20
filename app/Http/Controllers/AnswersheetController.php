<?php

namespace App\Http\Controllers;

use App\Models\Answersheet;
use App\Http\Requests\StoreAnswersheetRequest;
use App\Http\Requests\UpdateAnswersheetRequest;
use App\Models\Subject;
use App\Models\SubjectDetails;
use App\Models\User;
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

    public function get_exam_report(Request $request)
    {
        $requestedData = (object)$request->json()->all();

        $course_id = $requestedData->course_id;
        $semester_id = $requestedData->semester_id;;
        $session_id = $requestedData->session_id;;
        $retArr = [];

        $subjectDetails = SubjectDetails::whereCourseId($course_id)
            ->whereSemesterId($semester_id)
            ->whereSessionId($session_id)
            ->first();

        $users = User::select('*','users.id as id')
            ->join('student_details', 'users.id', '=', 'student_details.student_id')
            ->whereCourseId($course_id)
            ->whereCurrentSemesterId($semester_id)
            ->whereSessionId($session_id)
            ->get();

        foreach ($users as $user){
            $arr=[
                'name' => $subjectDetails?$user['first_name'].' '.$user['middle_name'].' '.$user['last_name']:null,
                'full_marks' => $subjectDetails->full_marks ?? null,
                'obtained_marks' => $subjectDetails?Answersheet::whereSubjectDetailsId($subjectDetails->id)->whereStudentId($user['id'])->sum('marks_obtained'):null,
                'status' => $subjectDetails?Answersheet::whereSubjectDetailsId($subjectDetails->id)->whereStudentId($user['id'])->first()?'Attended':'Not Attended':''
            ];
            $retArr[] = $arr;
        }

        return response()->json(['success'=>1, 'data'=>$retArr], 200,[],JSON_NUMERIC_CHECK);
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
