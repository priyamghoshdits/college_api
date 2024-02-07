<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Http\Requests\StoreNoticeRequest;
use App\Http\Requests\UpdateNoticeRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function get_notices(Request $request)
    {
        $data = Notice::whereFranchiseId($request->user()->franchise_id)->get();
        return response()->json(['success'=>1,'data'=> $data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_notices(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $mailing_id = [];
        $mailed_to = implode(',', array_column($requestedData->mail_to, 'name'));
        foreach ($requestedData->mail_to as $mail){
            $mailing_id[] = $mail['id'];
        }

        $data = new Notice();
        $data->subject = $requestedData->subject;
        $data->body = $requestedData->body;
        $data->mailed_to = $mailed_to;
        $data->mailed_to_id = $mailed_to_id;
        $data->published_on = Carbon::today();
        $data->franchise_id =  $request->user()->franchise_id;
        $data->save();

//        $users = User::whereFranchiseId($request->user()->franchise_id)->whereIn('user_type_id',$mailing_id)->get();
//        dispatch(function () use ($users){
//            foreach ($users as $user){
//                here will be the mailing part
//            }
//        })->afterResponse();


        return response()->json(['success'=>1,'data'=> $data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_notices(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = Notice::find($requestedData->id);
        $data->subject = $requestedData->subject;
        $data->body = $requestedData->body;
        $data->mailed_to = $requestedData->mailed_to ?? null;
        $data->franchise_id =  $request->user()->franchise_id;
        $data->update();

        return response()->json(['success'=>1,'data'=> $data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_notices($id)
    {
        $data = Notice::find($id);
        $data->delete();
        return response()->json(['success'=>1,'data'=> $data], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notice $notice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoticeRequest $request, Notice $notice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice)
    {
        //
    }
}
