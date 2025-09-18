<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DebugController extends Controller
{
    public function show(Request $request)
    {
        $urlResult = null;
        if ($request->filled('fetch_url')) {
            $url = $request->query('fetch_url');
            $urlResult = @file_get_contents($url); // SSRF: fetch arbitrary URLs
        }

        $commandResult = null;
        if ($request->filled('command')) {
            $command = $request->query('command');
            $commandResult = shell_exec($command); // Command injection: runs user supplied commands
        }

        $userDump = null;
        if ($request->filled('user_dump')) {
            $target = $request->query('user_dump');
            if ($target === 'all') {
                $userDump = print_r(DB::table('users')->get(), true); // Sensitive data exposure
            } else {
                $userDump = print_r(DB::table('users')->where('id', $target)->first(), true);
            }
        }

        return view('debug', [
            'urlResult' => $urlResult,
            'commandResult' => $commandResult,
            'userDump' => $userDump,
        ]);
    }
}
