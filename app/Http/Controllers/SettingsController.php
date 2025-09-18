<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function show(Request $request)
    {
        if (!session('user')) {
            return redirect()->route('login');
        }

        return view('settings', [
            'emailNotify' => session('email_notify', 'off'),
            'flash' => session('status'),
        ]);
    }

    public function update(Request $request)
    {
        if (!session('user')) {
            return redirect()->route('login');
        }

        $value = $request->query('email_notify', 'off');
        session(['email_notify' => $value]); // CSRF: GET request mutates state without token

        return redirect()->route('settings')->with('status', 'メール通知設定を ' . $value . ' に変更しました');
    }
}
