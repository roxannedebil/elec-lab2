<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Ensure you import Auth
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Define the required role for admin
        $role = 'admin'; // Set the role you're checking against

        // Check if the authenticated user has the correct role
        if (Auth::check() && Auth::user()->role !== $role) {
            return redirect(url('/')); // Redirect to home if not an admin
        }

        return $next($request);
    }
}
