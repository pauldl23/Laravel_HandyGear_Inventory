<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Session::get('usertype') !== 'Admin') {
            return redirect('/browse-items'); // Redirect to user page if not admin
        }

        return $next($request);
    }
}
