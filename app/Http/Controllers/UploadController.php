<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    // アップロード画面表示
    public function show()
    {
        return view('upload');
    }

    // 脆弱: 検証なしで任意ファイルアップロード
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            // ファイル名そのまま、検証なしで保存
            $path = $file->storeAs('public/uploads', $file->getClientOriginalName());
            return back()->with('message', 'アップロード完了: ' . $file->getClientOriginalName());
        }
        return back()->with('error', 'ファイルが選択されていません');
    }
}
