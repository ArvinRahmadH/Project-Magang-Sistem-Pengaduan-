<?php

// file: routes/web.php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NoteController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminNoteController;

Route::get('/', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::get('/Sipera/download', [AdminNoteController::class, 'showDownload'])->name('aplikasi.download');


Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/register', [AdminAuthController::class, 'showRegister'])->name('admin.register');
Route::post('/admin/register', [AdminAuthController::class, 'register'])->name('admin.register.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// proteksi halaman notes
Route::middleware(['admin.auth'])->group(function () {
    Route::get('/admin/notes', [AdminNoteController::class, 'index'])->name('admin.notes.index');
    Route::delete('/admin/notes/{id}', [AdminNoteController::class, 'destroy'])->name('admin.notes.destroy');
    Route::put('/admin/notes/{id}/status', [AdminNoteController::class, 'updateStatus'])
    ->name('admin.notes.updateStatus');
    Route::get('/admin/notes/{id}/messages', [AdminNoteController::class, 'messages']);
    Route::post('/admin/messages', [AdminNoteController::class, 'sendMessage']);
    Route::get('/admin/news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('/admin/news/store', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/admin/news', [NewsController::class, 'index'])->name('admin.news.index');
    Route::get('/admin/news/{id}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/admin/news/{id}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/admin/news/{id}', [NewsController::class, 'destroy'])
    ->name('admin.news.destroy');

});


