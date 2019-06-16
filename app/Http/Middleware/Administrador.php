<?php

namespace App\Http\Middleware;

use Closure;

class Administrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $rol)
    {
        if( Auth::user()->id_rol == 2){
            dd('no tiene acceso');
        }
        return $next($request);
    }
}
