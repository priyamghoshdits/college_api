<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function get_subject()
    {
        $data = Subject::get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_subject(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $subject = new Subject();
        $subject->name = $requestedData->name;
        $subject->subject_code = $requestedData->subject_code;
        $subject->save();

        return response()->json(['success'=>1,'data'=>$subject], 200,[],JSON_NUMERIC_CHECK);
    }


    public function update_subject(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $subject = Subject::find($requestedData->id);
        $subject->name = $requestedData->name;
        $subject->subject_code = $requestedData->subject_code;
        $subject->update();
        return response()->json(['success'=>1,'data'=>$subject], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_subject($id){
        $subject = Subject::find($id);
        $subject->delete();
        return response()->json(['success'=>1,'data'=>$subject], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
