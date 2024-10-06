<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\admin\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {

        Auth::guard('admin')->logout();

        $request->session()->regenerate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.index');

    }

}
