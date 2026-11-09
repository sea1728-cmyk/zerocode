<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rooms', [RoomController::class, 'index']);

Route::get('/rooms/{room}', [RoomController::class, 'show']);

Route::post('/rooms/{room}', [ChatController::class, 'store']);

Route::delete('/messages/{message}', [ChatController::class, 'destroy']);

Route::get('/messages/{message}/edit', [ChatController::class, 'edit']);

Route::put('/messages/{message}', [ChatController::class, 'update']);
