<?php namespace Intranet\Http\Services\user;

use Intranet\Models\User;
use Intranet\Models\Accreditor;
use Intranet\Models\Teacher;
use DB;
use Session;

class UserService {
    public function retrieveAll() {
        $users = User::get();
        $key = array_search('admin', array_column((Array) $users, 'Nombre'));
        unset($users[$key]);
        return $users;
    }

    public function findAccreditor() {
        $accreditors = Accreditor::where('IdEspecialidad', Session::get('faculty-code'))
            ->where('Vigente', 1)->get();
        return $accreditors;
    }

    public function getAccreditor($request) {
        $accreditor = Accreditor::where('IdUsuario', $request['userCode'])->first();
        return $accreditor;
    }
    public function getTeacher($request) {
        $teacher = Teacher::where('IdUsuario', $request['userCode'])->first();
        return $teacher;
    }

    public function getUser($request) {
        $user = User::where('IdUsuario', $request['userCode'])->first();
        return $user;
    }

    public function createUser($request) {
        $facultyCode = null;
        $password = bcrypt(123);

        if($request['profilecode']==4 || $request['profilecode'] > 5){ //Assuming that Acreditador is always 4 (is not erasable)
            $facultyCode = $request['facultyCode'];
        }

        $user = User::create([
            'Usuario' => $request['userusername'],
            'Contrasena' => $password,
            'IdPerfil' => $request['profilecode']
        ]);

        Accreditor::create([
            'Correo' => $request['useremail'],
            'Nombre' => $request['userfirstname'],
            'ApellidoPaterno' => $request['userlastname'],
            'ApellidoMaterno' => $request['userspanishlastname'],
            'IdEspecialidad' => $facultyCode,
            'IdUsuario' => $user->IdUsuario,
            'Vigente' => 1
        ]);

        return $user;
    }

    public function updateUser($request) {
        $facultyCode = null;
        
        if($request['profilecode']==4){ //Assuming that Acreditador is always 4 (is not erasable)
            $facultyCode = $request['facultyCode'];
        }

        User::where('IdUsuario', $request['user-id'])
            ->update([
                'Usuario' => $request['userusername'],
                'IdPerfil' => $request['profilecode']
            ]);

        Accreditor::where('IdAcreditador', $request['accreditor-id'])
            ->update([
                'Correo' => $request['useremail']
            ]);
    }

    public function deleteUser($request) {
        $user = User::where('IdUsuario', $request['user-id'])->first();
        $accreditor = Accreditor::where('IdUsuario', $request['user-id'])->first();
        Accreditor::where('IdUsuario', $request['user-id'])
            ->update([
                'Vigente' => 0
            ]);
        $user->delete();
    }

    public function getUsername($code)
    {
        $course = User::where('Usuario', $code)->first();
        $retVal = (is_null($course)) ? True : False ;
        $data['user'] = $retVal;
        return $data;
    }
    public function updateMyUserTeacher($request){
        Teacher::where('IdDocente', $request['accreditororteacher-id'])
            ->update([
                'Nombre' => $request['userfirstname'],
                'ApellidoPaterno' => $request['userlastname'],
                'ApellidoMaterno' => $request['userspanishlastname'],
                'Correo' => $request['useremail']
            ]);
    }
    public function updateMyUserAccreditor($request){
        Accreditor::where('IdAcreditador', $request['accreditororteacher-id'])
            ->update([
                'Nombre' => $request['userfirstname'],
                'ApellidoPaterno' => $request['userlastname'],
                'ApellidoMaterno' => $request['userspanishlastname'],
                'Correo' => $request['useremail']
            ]);
    }

}