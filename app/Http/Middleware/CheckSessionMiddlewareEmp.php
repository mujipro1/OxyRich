<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckSessionMiddlewareEmp
{
    public function handle($request, Closure $next)
    {
        if (Session::has(config('session.session_employee'))) {
            return $next($request);
        }
        return redirect()->route('access-denied');
    }
}
