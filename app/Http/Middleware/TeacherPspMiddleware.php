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
        if(Auth::user()->professor && count(Auth::user()->professor->pspProcesses!=null)>0){ //falta añadir que solo sea profesor de PSP
            return $next($request);
        }

        return redirect('/myfaculties');
    }
}
