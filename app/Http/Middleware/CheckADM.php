<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckADM
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
        if ( !auth()->check() )
            return redirect()->route('login');

        if ( auth()->user()->tipo == 'ADM' ) {
            return $next($request);
        }
        
        return redirect('/');
    }
}
