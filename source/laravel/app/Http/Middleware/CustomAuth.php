<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CustomAuth
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
        if (!Auth::check()) {
            Session::flash('alert-danger', 'Сначала выберите пользователя');
            return redirect()->route('user-list');
        }

        return $next($request);
    }
}
