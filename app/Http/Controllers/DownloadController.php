<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DownloadController extends Controller
{
    // ダウンロード画面表示
    public function show()
    {
        return view('download');
    }

    // 脆弱: パス検証なしで任意ファイルダウンロード
    public function download(Request $request)
    {
        $file = $request->query('file'); // 例: ../../.env など
        $path = base_path($file);

        if (!file_exists($path)) {
            abort(404, 'File not found');
        }

        return Response::download($path);
    }
}
