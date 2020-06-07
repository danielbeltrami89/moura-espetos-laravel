<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckUser
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

        if(auth()->user()->id == request()->route()->parameter('id'))
            return $next($request);
        else 
            return redirect()->route('inicio');
            //dd(request()->route()->parameter('id'));
      
    }
}