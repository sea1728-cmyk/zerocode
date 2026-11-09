<?php

namespace App\Http\Controllers;

use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        // ルームの一覧（ルームの表から、入れた順に並べる）
        $rooms = Room::orderBy('id')->get();

        return view('rooms', ['rooms' => $rooms]);
    }

    public function show(Room $room)
    {
        // 選んだルームの会話だけを、入れた順に並べる
        $messages = $room->messages()->orderBy('id')->get();

        return view('chat', ['room' => $room, 'messages' => $messages]);
    }
}
