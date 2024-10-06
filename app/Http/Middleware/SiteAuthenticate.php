<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SiteAuthenticate
{
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::guard('site')->check())
            return $next($request);

        $whiteList = [
            'site.showLoginForm',
            'site.login',
        ];

        foreach ($whiteList as $item)
            if ($request->is($item))
                return $next($request);


        return redirect()->route('site.login');
    }
}
