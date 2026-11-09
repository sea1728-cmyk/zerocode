<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        // 表示する名前（ここを書き替えると、画面の名前が変わる）
        $name = 'しー';

        return view('chat', ['name' => $name]);
    }

    public function store(Request $request, Room $room)
    {
        // 入室していなければ、入室の画面へ戻す
        if (! $request->session()->has('nickname')) {
            return redirect('/enter');
        }

        // 送られた本文をチェックする（空なら画面に戻ってお知らせを出す）
        $validated = $request->validate([
            'body' => 'required',
        ], [
            'body.required' => 'メッセージを入力してください',
        ]);

        // 入室したときの名前で、このルームあてに保存する
        Message::create([
            'name' => $request->session()->get('nickname'),
            'body' => $validated['body'],
            'room_id' => $room->id,
        ]);

        return redirect('/rooms/' . $room->id);
    }

    public function destroy(Request $request, Message $message)
    {
        // 自分のメッセージでなければ、消さずにルームへ戻す
        if ($message->name !== $request->session()->get('nickname')) {
            return redirect('/rooms/' . $message->room_id);
        }

        // 押された吹き出しのメッセージを消す
        $message->delete();

        return redirect('/rooms/' . $message->room_id);
    }

    public function edit(Request $request, Message $message)
    {
        // 自分のメッセージでなければ、書き直す画面を出さずにルームへ戻す
        if ($message->name !== $request->session()->get('nickname')) {
            return redirect('/rooms/' . $message->room_id);
        }

        // 押された吹き出しのメッセージを、書き直す画面に出す
        return view('edit', ['message' => $message]);
    }

    public function update(Request $request, Message $message)
    {
        // 自分のメッセージでなければ、保存せずにルームへ戻す
        if ($message->name !== $request->session()->get('nickname')) {
            return redirect('/rooms/' . $message->room_id);
        }

        // 書き直した本文をチェックする（空なら書き直す画面に戻ってお知らせを出す）
        $validated = $request->validate([
            'body' => 'required',
        ], [
            'body.required' => 'メッセージを入力してください',
        ]);

        // 書き直した本文で保存する
        $message->update([
            'body' => $validated['body'],
        ]);

        return redirect('/rooms/' . $message->room_id);
    }
}
