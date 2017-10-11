<?php

namespace App\Http\Middleware\user;

use Closure;
use Illuminate\Support\Facades\Auth;

class usercheck
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
        if(Auth::user()->role_id != 2){
            abort(404);
        }
        return $next($request);
    }
}
