<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$guard = null)
    {
        //$guards = empty($guards) ? [null] : $guards;
        $destinations = [
            1 =>  'admin',
            2 =>  'moderator',
            3 =>  'home',
        ];
        
            if (Auth::guard($guard)->check()) {
                return redirect()->route($destinations[Auth::user()->role]);
            }
        

        return $next($request);
    }
}
