<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\site\Controller;
use App\Http\Requests\admin\auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    public function showLoginForm()
    {
        return view('admin::auth.login-form');
    }
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials,isset($validated['remember'])))
        {
            $request->session()->regenerate();

            return redirect()->route('admin.index')->with(['success' => __('You have successfully logged in.')]);
        }

        //redirect back with errors and inputs if attempt failed
        return redirect()->back()->withErrors(['message' => __('Invalid login credentials.')])->withInput($validated);

    }

}
