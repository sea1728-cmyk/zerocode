<?php

use App\Http\Controllers\ChatController;
use App\Models\Message;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chat', function () {
    // 画面に出す会話（メッセージの表から、入れた順に並べる）
    $messages = Message::orderBy('id')->get();

    return view('chat', ['messages' => $messages]);
});

Route::post('/chat', [ChatController::class, 'store']);
