<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EnsureUserIsAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in
        if (!Session::get('loggedin')) {
            return redirect()->route('login.form')->with('error', 'You must be logged in to access this page.');
        }

        return $next($request);
    }
}
