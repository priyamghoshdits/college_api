<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Http\Requests\StoreNoticeRequest;
use App\Http\Requests\UpdateNoticeRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $mailed_to_id = implode(',', array_column($requestedData->mail_to, 'id'));
//        return response()->json(['success'=>$mailed_to_id,'data'=> $mailed_to], 200,[],JSON_NUMERIC_CHECK);
        foreach ($requestedData->mail_to as $mail){
            $mailing_id[] = $mail['id'];
        }

//        return response()->json(['success'=>19,'data'=> $mailed_to_id], 200,[],JSON_NUMERIC_CHECK);

        $data = new Notice();
        $data->subject = $requestedData->subject;
        $data->body = $requestedData->body;
        $data->mailed_to = $mailed_to;
        $data->published_on = Carbon::today();
        $data->franchise_id =  $request->user()->franchise_id;
        $data->save();

        $users = User::whereFranchiseId($request->user()->franchise_id)->whereIn('user_type_id',$mailing_id)->get();
//        Mail::send('notice',array(),function ($message){
//            $message->from('rudkarsh@rgoi.in');
//            $message->to('priyamghosh.dits@gmail.com');
//            $message->subject('Test mail');
//        });
        dispatch(function () use ($users, $requestedData){
            foreach ($users as $user){
                Mail::send('notice',array('name'=>$user['first_name']." ".$user['middle_name']." ".$user['last_name']
                    , 'subject' => $requestedData->subject, 'body' => $requestedData->body)
                    , function ($message) use($user) {
                    $message->from('rudkarsh@rgoi.in');
                    $message->to($user['email']);
                    $message->subject('Test mail');
                });

//                Mail::send('notice',array(),function ($message) use($user) {
//                    $message->from('rudkarsh@rgoi.in');
//                    $message->to(json_decode(json_encode($user['email'])));
//                    $message->subject('Test mail');
//                });
            }
        })->afterResponse();


        return response()->json(['success'=>1,'data'=> $data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_notices(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $mailed_to = implode(',', array_column($requestedData->mail_to, 'name'));
        $mailed_to_id = implode(',', array_column($requestedData->mail_to, 'id'));
//        return response()->json(['success'=>$requestedData], 200,[],JSON_NUMERIC_CHECK);


        $data = Notice::find($requestedData->id);
        $data->subject = $requestedData->subject;
        $data->body = $requestedData->body;
        $data->mailed_to = $mailed_to;
        $data->mailed_to_id = $mailed_to_id;
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
