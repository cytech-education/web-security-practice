<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\DebugController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\RedirectController;

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

// 危険なデバッグツール群
Route::get('/debug', [DebugController::class, 'show'])->name('debug');

// ユーザープロフィール（脆弱: IDOR）
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

// メール通知設定（脆弱: CSRF + GETで状態変更）
Route::get('/settings', [SettingsController::class, 'show'])->name('settings');
Route::get('/settings/update', [SettingsController::class, 'update'])->name('settings.update');

// 任意リダイレクト（脆弱: Open Redirect）
Route::get('/go', [RedirectController::class, 'go'])->name('redirect.go');
