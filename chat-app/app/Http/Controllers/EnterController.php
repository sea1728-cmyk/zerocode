<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnterController extends Controller
{
    public function create()
    {
        // 入室の画面を出す
        return view('enter');
    }

    public function store(Request $request)
    {
        // 送られたニックネームをチェックする（空なら画面に戻ってお知らせを出す）
        $validated = $request->validate([
            'nickname' => 'required',
        ], [
            'nickname.required' => 'ニックネームを入力してください',
        ]);

        // ニックネームをセッションに預けて、ルームの一覧へ移る
        $request->session()->put('nickname', $validated['nickname']);

        return redirect('/rooms');
    }
}
