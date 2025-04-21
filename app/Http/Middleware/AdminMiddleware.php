<?php

use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Session::get('loggedin') && Session::get('usertype') === 'Admin') {
            return $next($request);
        }

        return redirect('/auth/login');
    }
}

