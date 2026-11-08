<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        // 表示する名前（ここを書き替えると、画面の名前が変わる）
        $name = 'しー';

        return view('chat', ['name' => $name]);
    }

    public function store(Request $request)
    {
        // 送られた名前と本文をチェックする（空なら画面に戻ってお知らせを出す）
        $validated = $request->validate([
            'name' => 'required',
            'body' => 'required',
        ], [
            'name.required' => '名前を入力してください',
            'body.required' => 'メッセージを入力してください',
        ]);

        // 入力された名前で保存する
        Message::create([
            'name' => $validated['name'],
            'body' => $validated['body'],
        ]);

        return redirect('/chat');
    }

    public function destroy(Message $message)
    {
        // 押された吹き出しのメッセージを消す
        $message->delete();

        return redirect('/chat');
    }

    public function edit(Message $message)
    {
        // 押された吹き出しのメッセージを、書き直す画面に出す
        return view('edit', ['message' => $message]);
    }

    public function update(Request $request, Message $message)
    {
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

        return redirect('/chat');
    }
}
