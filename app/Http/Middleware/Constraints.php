<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Constraints
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::user()->blocked){
            Auth::logout();
            return redirect(route('login'));
        }

        if(Auth::user()->forced){
            return redirect(route('change.password'));
        }

        return $next($request);
    }
}
