<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function get_chat()
    {
        
    }

    public function save_chat(Request $request)
    {
        $data = (object)$request->json()->all();
//        return $data;
        $chat = new Chat();
        $chat->sender_id = $data->sender_id;
        $chat->time = $data->time;
        $chat->text = $data->text;
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
