<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to login if the user is not authenticated
        }

        // Log the user role for debugging purposes
        Log::info('Authenticated User:', ['user' => Auth::user()]);

        // Check if the user has the required role
        if (Auth::user()->role != 'admin') {
            // Redirect to home with an error message if the role doesn't match
            return redirect()->route('home')->with('error', 'You do not have admin access.');
        }

        // Proceed to the next request if the role matches
        return $next($request);
    }
}
