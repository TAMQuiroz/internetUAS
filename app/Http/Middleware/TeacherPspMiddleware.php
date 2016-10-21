<?php

namespace Intranet\Http\Middleware;

use Closure;
use Auth;

class TeacherPspMiddleware
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
        if(Auth::user()->IdPerfil == 2){ //falta añadir que solo sea profesor de PSP
            return $next($request);
        }

        return redirect('/myfaculties');
    }
}
