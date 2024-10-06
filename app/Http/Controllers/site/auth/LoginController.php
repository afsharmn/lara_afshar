<?php

namespace App\Http\Controllers\site\auth;

use App\Http\Controllers\site\Controller;
use App\Http\Requests\site\auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    public function showLoginForm()
    {
        return view('site::auth.login-form');
    }
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        $credentials = $request->only('email', 'password');

        if (Auth::guard('site')->attempt($credentials,isset($validated['remember'])))
        {
            $request->session()->regenerate();

            return redirect()->route('site.index')->with(['success' => __('You have successfully logged in.')]);
        }

        //redirect back with errors and inputs if attempt failed
        return redirect()->back()->withErrors(['message' => __('Invalid login credentials.')])->withInput($validated);

    }

}
