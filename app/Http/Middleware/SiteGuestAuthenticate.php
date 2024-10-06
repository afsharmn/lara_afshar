<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SiteGuestAuthenticate
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('site')->check())
            return redirect()->route('site.index');

        return $next($request);
    }
}
