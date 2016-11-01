<?php

namespace Intranet\Http\Middleware;

use Closure;
use Auth;

class InvestigationMiddleware
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

        if(Auth::user()->IdPerfil == 2 || Auth::user()->IdPerfil == 5 || Auth::user()->IdPerfil == 3){
            return $next($request);
        }

        return redirect('/myfaculties');
    }
}
