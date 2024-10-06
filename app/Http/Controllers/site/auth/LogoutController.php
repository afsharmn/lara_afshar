<?php

namespace App\Http\Controllers\site\auth;

use App\Http\Controllers\site\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {

        Auth::guard('site')->logout();

        $request->session()->regenerate();

        $request->session()->regenerateToken();

        return redirect()->route('site.index');

    }

}
