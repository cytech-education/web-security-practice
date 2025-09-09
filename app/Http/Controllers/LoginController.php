<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    // ログイン画面表示
    public function showLoginForm()
    {
        return view('login');
    }

    // 脆弱なログイン処理（SQLインジェクション脆弱性あり）
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // ★脆弱な生SQL（ユーザー入力を直接埋め込む）
        $sql = "SELECT * FROM users WHERE name = '$username' AND password = '$password'";
        $user = DB::select($sql);

        if ($user) {
            // ログイン成功時はコメント画面へ
            session(['user' => $username]);
            return redirect()->route('comment');
        } else {
            // ログイン失敗
            return back()->withErrors(['login' => 'ユーザー名またはパスワードが違います']);
        }
    }

    // ログアウト
    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}
