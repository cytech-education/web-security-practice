<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    // コメント画面表示
    public function show(Request $request)
    {
        // 未ログインならログイン画面へ
        if (!session('user')) {
            return redirect()->route('login');
        }

        // 新しい順で全コメント取得
        $comments = DB::table('comments')->orderBy('created_at', 'desc')->get();

        return view('comment', [
            'user' => session('user'),
            'comments' => $comments,
        ]);
    }

    // コメント投稿処理（XSS脆弱性あり）
    public function post(Request $request)
    {
        if (!session('user')) {
            return redirect()->route('login');
        }

        $comment = $request->input('comment');

        // ★脆弱：入力値をエスケープせずそのまま保存
        DB::table('comments')->insert([
            'user' => session('user'),
            'comment' => $comment,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('comment');
    }
}
