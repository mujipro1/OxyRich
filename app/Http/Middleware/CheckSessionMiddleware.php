<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckSessionMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Session::has(config('session.session_admin'))) {
            return $next($request);
        }
        return redirect()->route('access-denied');
    }
}

