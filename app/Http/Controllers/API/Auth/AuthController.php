<?php

namespace Intranet\Http\Controllers\API\Auth;

use JWTAuth;
use Response;
use Illuminate\Http\Request;
use Intranet\Models\Faculty;
use Intranet\Http\Services\Auth\AuthService;
use Intranet\Exceptions\InvalidCredentialsException;
use Illuminate\Routing\Controller as BaseController;

class AuthController extends BaseController
{
    protected $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function authenticate(Request $request)
    {
        try {
            $user = $this->authService->attemp($request->only('user', 'password'));
        } catch (InvalidCredentialsException $e) {
            return Response::json([
                    'error'   => 'invalid_credentials',
                    'message' => $e->getMessage()
                ], $e->getCode());
        }

        try {
            $token = JWTAuth::fromUser($user);
        } catch (Exception $e) {
            return Response::json([
                'error'   => 'could_not_create_token',
                'message' => 'There was a problem in the server',
            ], 500);
        }

        if ($user->IdPerfil == 2 || $user->IdPerfil == 1){
            $user->load('professor');
        }else if ($user->IdPerfil == 4){
            $user->load('accreditor');
        }else if ($user->IdPerfil == 5){
            $user->load('investigator');
            $user->load('professor');
        }else if ($user->IdPerfil == 6){
            //funcion que carga la informacion del supervisor
        }

        return Response::json(compact('token', 'user'));
    }

}