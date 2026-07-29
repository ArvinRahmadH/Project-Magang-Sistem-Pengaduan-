<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NewsApiController;

Route::post('/notes', [NoteController::class, 'store']);
Route::get('/notes', [NoteController::class, 'index']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/news', [NewsApiController::class, 'index']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/user/photo', [UserController::class, 'updateProfilePhoto']);
    Route::get('/user/profile', [UserController::class, 'getProfile']);
    Route::post('/notes', [NoteController::class, 'store']);
    Route::get('/notes', [NoteController::class, 'index']);
    Route::delete('/notes/{id}', [NoteController::class, 'destroy']);
    Route::get('/notes/{id}/messages', [MessageController::class, 'byNote']);
});