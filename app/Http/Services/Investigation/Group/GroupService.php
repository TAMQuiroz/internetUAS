<?php namespace Intranet\Http\Services\Investigation\Group;

use Intranet\Models\Teacher;
use Intranet\Models\Faculty;
use Intranet\Models\User;
use Intranet\Models\Accreditor;
use Intranet\Models\CoursexTeacher;
use Intranet\Models\Group;
use Intranet\Http\Services\User\UserService;
use Intranet\Http\Services\User\PasswordService;
use DB;
use Session;

class GroupService {


	public function retrieveAll()
    {
        return Group::get();
    }

	public function createGroup($request) {

		if(Session::get('user')->IdEspecialidad == 0){
            $especialidad = Session::get('faculty-code');
        }else{
            $especialidad = Session::get('user')->IdEspecialidad;
        }

        //$facultyName = $request['facultyName'];

        $group = Group::create([
            'nombre' => $request['groupName'],
            'id_especialidad' => $especialidad,
            'descripcion' => $request['groupDescription'],
            'id_lider' => $request['leaderCode'],
        ]);

        return $group;

	}

	public function findGroup($request)
    {
        $group = Group::where('id', $request['groupId'])->first();
        return $group;
    }
}