<?php

namespace App\Http\Middleware\auth;

use Closure;
use Illuminate\Support\Facades\Auth;

class authcheck
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
        if(!Auth::user()){
            return redirect()->route('login');
        }
        return $next($request);
    }
}
