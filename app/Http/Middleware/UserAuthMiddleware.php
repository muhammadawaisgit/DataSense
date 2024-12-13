<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('user')->check()) {
            return $next($request);
        }
        return redirect()->route('user.login')->withErrors(['error' => 'You must be logged in to access this page']);
    }
}
