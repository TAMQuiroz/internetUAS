<?php

namespace Intranet\Http\Middleware;

use Closure;
use Session;
use Intranet\Models\ProfilexPermission;
use Intranet\Models\Permission;
class VerifyPermission
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

        $idProfile = $request->User()->profile->IdPerfil;
        $currentRoute = $request->route()->getAction()['as'];

        // acciones del perfil
        $idActionsProfile = Session::get('actions');

        if($idActionsProfile){
            // buscar idAccion de la ruta actual
            $idAction = Permission::where('ruta', $currentRoute)->first()->IdAccion;
            if (in_array($idAction, $idActionsProfile)) {
                return $next($request); 
            }
        }
        return redirect()->back();
    }

}
