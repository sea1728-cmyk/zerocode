<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        // 入室していなければ、入室の画面へ戻す
        if (! $request->session()->has('nickname')) {
            return redirect('/enter');
        }

        // ルームの一覧（ルームの表から、入れた順に並べる）
        $rooms = Room::orderBy('id')->get();

        return view('rooms', ['rooms' => $rooms]);
    }

    public function show(Request $request, Room $room)
    {
        // 入室していなければ、入室の画面へ戻す
        if (! $request->session()->has('nickname')) {
            return redirect('/enter');
        }

        // 選んだルームの会話だけを、入れた順に並べる
        $messages = $room->messages()->orderBy('id')->get();

        return view('chat', ['room' => $room, 'messages' => $messages]);
    }
}
