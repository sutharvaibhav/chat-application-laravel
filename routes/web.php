<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::get('/', [ChatController::class, 'index'])->name('index.home');

Route::post('/sending-message', [ChatController::class, 'saveChat'])->name('save.chat');
