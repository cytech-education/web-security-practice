<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function go(Request $request)
    {
        $target = $request->query('url', '/');
        return redirect($target); // Open redirect: trusts arbitrary URLs
    }
}
