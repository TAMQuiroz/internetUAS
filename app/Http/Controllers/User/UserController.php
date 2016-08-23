<?php

namespace Intranet\Http\Controllers\User;

use Auth;
use Hash;
use View;
use Illuminate\Http\Request;
use Intranet\Http\Services\User\UserService;
use Intranet\Http\Services\User\PasswordService;
use Intranet\Http\Services\Profile\ProfileService;
use Intranet\Http\Services\Faculty\FacultyService;
use Intranet\Http\Controllers\Controller as BaseController;

class UserController extends BaseController {

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

    public function index() {
        $data = [];
        try {
            $data['users'] = $this->userService->findAccreditor();
        } catch(\Exception $e) {
            dd($e);
        }
        return view('users.index', $data);
    }

    //Creation of users
    public function create() {
        $data = [];
        try {
            $data['faculties'] = $this->facultyService->retrieveAll();
            $data['profiles'] = $this->profileService->findAll();
        } catch (\Exception $e) {
            dd($e);
        }
        return view('users.form', $data);
    }

    public function save(Request $request) {
        try {
            $user = $this->userService->createUser($request->all());
        } catch(\Exception $e) {
            dd($e);
        }

        if ($user) {
            $this->passwordService->sendSetPasswordLink($user, $request->input('useremail'));
        }

        return redirect()->route('index.users')->with('success', 'El colaborador se ha registrado exitosamente');;
    }

    //Modify users
    public function edit(Request $request) {
        try {
            $data['faculties'] = $this->facultyService->retrieveAll();
            $data['accreditor'] = $this->userService->getAccreditor($request->all());
            $data['user'] = $this->userService->getUser($request->all());
            $data['profiles'] = $this->profileService->findAll();
        } catch (\Exception $e) {
            dd($e);
        }

        return view('users.edit', $data);
    }

    public function update(Request $request) {
        try {
            $this->userService->updateUser($request->all());
            $request['userCode'] = $request['user-id'];
            $user= $this->userService->getUser($request);
            if(Hash::check($request['password'], $user->Contrasena)){
                $this->passwordService->sendSetPasswordLink($user, $request->input('useremail'));
            }
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect()->route('index.users')->with('success', 'Las modificaciones se han guardado exitosamente');
    }

    //Deletion of users
    public function delete(Request $request) {
        try{
            $this->userService->deleteUser($request->all());
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect()->route('index.users')->with('success', 'El registro ha sido eliminado exitosamente');
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

    public function resetPassword(Request $request)
    {
        if(! $this->passwordService->isValid($request->only('token', 'user')))
        {
            return back()->with('error', 'El enlace ya no es válido');
        }
        $user = $this->passwordService->resetPassword($request->all('user', 'password', 'token'));
        Auth::login($user);
        return redirect('/');
    }

    public function getUsername($code)
    {
        try{
            $data['user'] = $this->userService->getUsername($code);
        } catch(\Exception $e) {
            dd($e);
        }
        return json_encode($data);
    }
}