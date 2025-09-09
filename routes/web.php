<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

// ログイン画面表示
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// ログイン処理
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
// ログアウト
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

use App\Http\Controllers\CommentController;

// コメント画面
Route::get('/comment', [CommentController::class, 'show'])->name('comment');
// コメント投稿
Route::post('/comment', [CommentController::class, 'post'])->name('comment.post');
