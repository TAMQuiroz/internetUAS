<?php

namespace Intranet\Http\Controllers\Auth;

use Auth;
use Session;
use Validator;
use Intranet\User;
use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Http\Services\Profile\ProfileService;
use Intranet\Http\Services\Teacher\TeacherService;
use Intranet\Http\Services\Cicle\CicleService;
use Intranet\Http\Services\Auth\AuthService;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Intranet\Exceptions\InvalidCredentialsException;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/myfaculties';


    protected $authService;
    protected $profileService;
    protected $teacherService;
    protected $cicleService;


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        $this->authService = new AuthService();
        $this->teacherService = new TeacherService();
        $this->cicleService = new CicleService();
        $this->profileService = new ProfileService();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    public function authenticate(Request $request)
    {
        try {
            if ($request['user']=="")   return back()->with('error', 'Debe ingresar su identificación de usuario.');
            if ($request['password']=="")   return back()->with('error', 'Debe ingresar su contraseña.');
            if (count($request['user'])>20)   return back()->with('error', 'El usuario no puede tener más de 20 caracteres.');
            if (count($request['password'])>100)   return back()->with('error', 'La contraseña no puede tener más de 100 caracteres.');
            $userSession = $this->authService->attemp($request->only('user', 'password')); //THIS SENDS BACK THE USER (CORRECT)

            $permissions= $this->profileService->findPermission($userSession->IdPerfil);
            $actions = array(0);
            foreach($permissions as $per){
                array_push($actions, $per->IdAccion);
            }

            if($userSession->IdPerfil == 2 || $userSession->IdPerfil == 1){
                $user = $this->authService->findTeacher($userSession->IdUsuario);
            }else if($userSession->IdPerfil == 4){
                $user = $this->authService->findAccreditor($userSession->IdUsuario);
            }else if($userSession->IdPerfil == 5){
                $user = $this->authService->findInvestigator($userSession->IdUsuario);
            }else if($userSession->IdPerfil == 6){
                $user = $this->authService->findSupervisor($userSession->IdUsuario);
                $user->Vigente = 1;
            }else if($userSession->IdPerfil == 0) {
                $user = $this->authService->findStudent($userSession->IdUsuario);
                $user->Vigente = 1;
                $user->idFaculty = $user->id_especialidad;
            }else{
                $user = null;
            }
            if($user == null) { //es admin
                $default=(Object)['IdDocente'=> '0','Nombre'=>'Administrador','IdEspecialidad' =>'0','ApellidoPaterno'=>'del','ApellidoMaterno'=>'Sistema','Vigente'=>1,'IdPerfil'=>'3', 'IdUsuario'=>'1'];
                $user=$default;
            }

            if($user->Vigente!=1) {
                $message = "Ya no tiene acceso al sistema";
            }
            else {
                Session::put('user',$user);
            }

            Session::put('actions',$actions);
        } catch (InvalidCredentialsException $e) {
            return back()->with('error', 'El usuario y/o la contraseña no son válidos.');
        }

        Auth::login($userSession);

        return redirect('/myfaculties');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
