<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticate
{
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::guard('admin')->check())
            return $next($request);

        $whiteList = [
            'admin.showLoginForm',
            'admin.login',
        ];

        foreach ($whiteList as $item)
            if ($request->is($item))
                return $next($request);


        return redirect()->route('admin.login');
    }
}
