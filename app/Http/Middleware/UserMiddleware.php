<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check() && Auth::user()->role == 'user') {
            return $next($request);
        }

        // Redirect if not authenticated or not a user
        return redirect('/')->with('error', 'Access denied');
    }
}
