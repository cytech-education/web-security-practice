<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        if (!session('user')) {
            return redirect()->route('login');
        }

        $currentUserName = session('user');
        $userId = $request->query('id');

        if ($userId) {
            $profile = DB::table('users')->where('id', $userId)->first(); // IDOR: no ownership check
        } else {
            $profile = DB::table('users')->where('name', $currentUserName)->first();
        }

        if (!$profile) {
            abort(404, 'User not found');
        }

        return view('profile', [
            'profile' => $profile,
            'currentUserName' => $currentUserName,
        ]);
    }
}
