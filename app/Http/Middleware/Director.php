<?php

namespace App\Http\Middleware;

use Closure;

class Director
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
        if( $request->user()->id_rol == 2 ){
            return redirect('404');
        }
        return $next($request);
    }
}