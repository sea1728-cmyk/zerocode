<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        // 表示する名前（ここを書き替えると、画面の名前が変わる）
        $name = 'しー';

        return view('chat', ['name' => $name]);
    }
}
