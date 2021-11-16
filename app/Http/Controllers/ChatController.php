<?php

namespace App\Http\Controllers;

use App\Models\chat;
use App\Models\chatMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ids = chatMember::all('chat_id')->where('id', '=', Auth::id());
        $data = Chat::find($ids);
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chat = Chat::Create(['name' => $request->name]);
        $user = chatMember::Create(['chat_id' => $chat->id, 'user_id' => Auth::id()]);
        $member = chatMember::Create(['chat_id' => $chat->id, "user_id" => $request->member]);
        return response()->json([
            'name' => $chat->name,
            'chat_id' => $chat->id,
            'members' => [$member->id, $user->id],
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\chats  $chats
     * @return \Illuminate\Http\Response
     */
    public function show(chat $chats)
    {
        $members = chatMember::all('user_id')->where('chat_id', '=', $chats->id);
        return response()->json([
            'name' => $chats->name,
            'chat_id' => $chats->id,
            'members' => $members,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\chats  $chats
     * @return \Illuminate\Http\Response
     */
    public function edit(chat $chats)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\chats  $chats
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, chat $chats)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\chats  $chats
     * @return \Illuminate\Http\Response
     */
    public function destroy(chat $chats)
    {
        chat::destroy($chats);
    }
}
