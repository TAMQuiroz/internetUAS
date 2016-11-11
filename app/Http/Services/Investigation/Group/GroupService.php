<?php namespace Intranet\Http\Services\Investigation\Group;

use Intranet\Models\Teacher;
use Intranet\Models\Investigator;
use Intranet\Models\Faculty;
use Intranet\Models\User;
use Intranet\Models\Accreditor;
use Intranet\Models\CoursexTeacher;
use Intranet\Models\Group;
use Intranet\Models\Tutstudent;
use Intranet\Http\Services\User\UserService;
use Intranet\Http\Services\User\PasswordService;
use DB;
use Auth;
use Session;

class GroupService {


	public function retrieveAll($filters)
    {
        return Group::getFiltered($filters);
    }

	public function createGroup($request) {

		if(Session::get('user')->IdEspecialidad == 0){
            $especialidad = Session::get('faculty-code');
        }else{
            $especialidad = Session::get('user')->IdEspecialidad;
        }

        $group = Group::create([
            'nombre' => $request['nombre'],
            'id_especialidad' => $especialidad,
            'descripcion' => $request['descripcion'],
            'id_lider' => $request['lider'],
            'imagen' => null,
        ]);


        if(isset($request['imagen']) && $request['imagen'] != ""){
            $destinationPath = 'uploads/grupos/'; // upload path
            $extension = $request['imagen']->getClientOriginalExtension();
            $filename = $group->id.'.'.$extension; 
            $request['imagen']->move($destinationPath, $filename);

            $group->imagen = $destinationPath.$filename;
            $group->save();
        }

        return $group;

	}

    public function updateGroup($request, $id) {

        $group = Group::find($id);
        $group->update([
            'nombre' => $request['nombre'], 
            'descripcion' => $request['descripcion'], 
            'id_lider' => $request['lider']
        ]);
        if(isset($request['imagen']) && $request['imagen'] != ""){
            if(file_exists($group->imagen)){
                unlink($group->imagen);
            }

            $destinationPath = 'uploads/grupos/'; // upload path
            $extension = $request['imagen']->getClientOriginalExtension();
            $filename = $group->id.'.'.$extension; 
            $request['imagen']->move($destinationPath, $filename);

            $group->imagen = $destinationPath.$filename;
            $group->save();
        }
    }

    public function deleteGroup($id) {
        $group = Group::find($id);
        if($group && (count($group->investigators)!=0)){
            return $group;
        }else{
            if(file_exists($group->imagen)){
                unlink($group->imagen);
            }

            $group->delete();
        }
        return null;        
    }

	public function findGroup($request)
    {
        //$group = Group::where('id', $request['groupId'])->first();
        $group = Group::where('id', $request['groupId'])->first();
        return $group;
    }

    public function findGroupById($groupId)
    {
        //$group = Group::where('id', $request['groupId'])->first();
        $group = Group::where('id', $groupId)->first();
        return $group;
    }

    public function getNotSelectedInvestigators($id)
    {
        $group = Group::find($id);
        $ids = [];
        
        foreach ($group->investigators as $investigator) {
            array_push($ids,$investigator->id);
        }

        $investigators = Investigator::whereNotIn('id',$ids)->orderBy('nombre', 'asc')->get();

        return $investigators;
    }

    public function getNotSelectedStudents($id)
    {
        $group = Group::find($id);
        $ids = [];
        
        foreach ($group->students as $student) {
            array_push($ids,$student->id);
        }

        $students = Tutstudent::whereNotIn('id',$ids)->orderBy('nombre', 'asc')->get();

        return $students;
    }

    public function getNotSelectedTeachers($id)
    {
        $group = Group::find($id);
        $ids = [];
        
        foreach ($group->teachers as $teacher) {
            array_push($ids,$teacher->IdDocente);
        }
        array_push($ids, $group->leader->IdDocente);

        $teachers = Teacher::whereNotIn('IdDocente',$ids)->orderBy('Nombre', 'asc')->get();
        return $teachers;
    }

    public function checkLeader($idGroup)
    {
        $user = Auth::user();
        if($user->IdPerfil != 3){
            $teacher = Teacher::where('IdUsuario',$user->IdUsuario)->first();
            $group = Group::find($idGroup);
            $leader = $group->leader;

            return $teacher->IdDocente == $leader->IdDocente;
        }else{
            return false;
        }
    }
}