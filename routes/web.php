<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\UploadController;

Route::get('/', function () {
    return view('welcome');
});

// ログイン画面表示
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// ログイン処理
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
// ログアウト
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// コメント画面
Route::get('/comment', [CommentController::class, 'show'])->name('comment');
// コメント投稿
Route::post('/comment', [CommentController::class, 'post'])->name('comment.post');

// ファイルダウンロード画面
Route::get('/download', [DownloadController::class, 'show'])->name('download');
// ファイルダウンロード処理（脆弱: パス検証なし）
Route::get('/download/file', [DownloadController::class, 'download'])->name('download.file');

// ファイルアップロード画面
Route::get('/upload', [UploadController::class, 'show'])->name('upload');
// ファイルアップロード処理（脆弱: 検証なし）
Route::post('/upload', [UploadController::class, 'upload'])->name('upload.post');
