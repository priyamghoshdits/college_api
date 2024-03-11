<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function get_chat(Request $request)
    {
        $user_id = $request->user()->id;
        $ret_arr = [];
        $id_sep = [];
        $sender = Chat::select('*',DB::raw("'0' as sender"))->whereSenderId($user_id)->get();
        $receiver = Chat::select('*',DB::raw("'1' as sender"))->whereReceiverId($user_id)->get();

        $merged_array = $sender->merge($receiver)->sortBy('created_at');
        $new_merged_array = [];

        foreach ($merged_array as $list){
            $id_sep[] = ($list['sender_id'] == $user_id)?$list['receiver_id']:$list['sender_id'];
        }

        $users = User::select("users.id",DB::raw("CONCAT(first_name,' ', ifnull(middle_name,''),' ',last_name) as name")
            ,DB::raw("'Be the change' as status")
            ,DB::raw("'assets/images/user/12.png' as profile"),DB::raw("'Last Seen 3:15 PM' as seen")
            ,DB::raw("'true' as online"),DB::raw("'false' as typing"),DB::raw("'0' as authenticate")
            )->get();

        foreach ($users as $user){
            $user->authenticate = ($user['id'] == $user_id)?1:0;
        }

        foreach ($merged_array as $list){
            $new_merged_array[] = json_decode($list,true);
        }

        $message_id = array_keys(array_flip($id_sep));

        foreach ($message_id as $list){
            $a = [
                'id' => $list,
                'message' => $this->get_message($list,$new_merged_array)
            ];
            $ret_arr[] = $a;
        }

        return response()->json(['success'=>1,'data'=> $ret_arr, 'users' => $users], 200,[],JSON_NUMERIC_CHECK);

    }

    public function get_message($id, $message){
        $temp = [];
        foreach ($message as $x){
            if(($x['sender_id'] == $id) || ($x['receiver_id'] == $id)){
                $temp[] = $x;
            }
        }

        return $temp;
    }

    public function save_chat(Request $request)
    {
        $data = (object)$request->json()->all();
        $chat = new Chat();
        $chat->sender_id = $request->user()->id;
        $chat->receiver_id = $data->receiver;
        $chat->time = date("h:i A");
        $chat->text = $data->message;
        $chat->save();
        return response()->json(['success'=>1,'data'=> $chat], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChatRequest $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
