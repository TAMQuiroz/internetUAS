<?php namespace Intranet\Http\Controllers\MyUser;

use Auth;
use Hash;
use View;
use Illuminate\Http\Request;
use Intranet\Http\Services\User\UserService;
use Intranet\Http\Services\User\PasswordService;
use Intranet\Http\Services\Profile\ProfileService;
use Intranet\Http\Services\Faculty\FacultyService;
use Intranet\Http\Controllers\Controller as BaseController;
use Session;

class MyUserController extends BaseController {

    protected $userService;
    protected $facultyService;
    protected $profileService;
    protected $passwordService;

    public function __construct() {
        $this->userService = new UserService;
        $this->facultyService = new FacultyService;
        $this->profileService = new ProfileService;
        $this->passwordService = new PasswordService;
    }

    //Edit my user
    public function edit(Request $request) {
        
        try {
            $profileId = Session::get('user', 'relations')->user->IdPerfil;
            $data['faculties'] = $this->facultyService->retrieveAll();
            $accreditor = $this->userService->getAccreditor($request->all());
            $teacher = $this->userService->getTeacher($request->all());
            $data['user'] = $this->userService->getUser($request->all());
            $data['profiles'] = $this->profileService->findAll();
        } catch (\Exception $e) {
            dd($e);
        }
        switch ($profileId) {
            case 1:
            case 2:
                $data['myUserId'] = $teacher->IdDocente;
                $data['myUserEmail'] = $teacher->Correo;
                $data['myUserName'] = $teacher->Nombre;
                $data['myUserLNameFather'] = $teacher->ApellidoPaterno;
                $data['myUserLNameMother'] = $teacher->ApellidoMaterno;
                break;
            case 4:
            case 5:
                $data['myUserId'] = $accreditor->IdAcreditador;
                $data['myUserEmail'] = $accreditor->Correo;
                $data['myUserName'] = $accreditor->Nombre;
                $data['myUserLNameFather'] = $accreditor->ApellidoPaterno;
                $data['myUserLNameMother'] = $accreditor->ApellidoMaterno;
                break;
            default: return back();
        }

        return view('myUser.edit', $data);
    }

    public function update(Request $request) {
        $profileId = $request['profilecode'];
        try {
            switch ($profileId) {
                case 1:
                case 2:
                    $this->userService->updateMyUserTeacher($request->all());
                    break;
                case 4:
                case 5:
                    $this->userService->updateMyUserAccreditor($request->all());
                    break;
                default: return back();
            }
            $data['user'] = $request['user-id'];
            $data['password'] = $request['password'];
            $user= $this->passwordService->resetMyOwnPassword($data);

        } catch (\Exception $e) {
            dd($e);
        }
        return back()->with('success', 'Las modificaciones se han guardado exitosamente');
    }

    

    //View of users
    public function view(Request $request) {

        try {
            $data['accreditor'] = $this->userService->getAccreditor($request->all());
            $data['user'] = $this->userService->getUser($request->all());
            $request['profileCode'] = $data['user']->profile->IdPerfil;
            $data['profile'] = $this->profileService->find($request);
        } catch(\Exception $e) {
            dd($e);
        }
        return $data;
    }

    public function passwordForm($token)
    {
        return view('users.password_reset', compact('token'));
    }


}