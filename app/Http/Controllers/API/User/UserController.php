<?php

namespace Intranet\Http\Controllers\API\User;

use JWTAuth;
use Response;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{
    use Helpers;

    public function getUserInfo()
    {
        $user =  JWTAuth::parseToken()->authenticate();
        $token ="token";
        if ($user->IdPerfil == 2 || $user->IdPerfil == 1){
            $user->load('teacher');    
        }else if ($user->IdPerfil == 4){
            $user->load('accreditor');
        }else if ($user->IdPerfil == 5){
            $user->load('investigator');
        }
        return Response::json(compact('token', 'user'));
    }
}
