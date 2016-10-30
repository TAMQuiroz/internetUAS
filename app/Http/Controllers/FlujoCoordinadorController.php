<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;

use Intranet\Http\Requests;
use Intranet\Models\criterion;

class FlujoCoordinadorController extends Controller
{
    //profesores
    public function criterio_index ($id){

		$especialidad = Faculty::findOrFail($id);
		$objetivos = $especialidad->objetives;
		return view('flujoAdministrador.profesor_index', ['teachers'=>$profesores, 'idEspecialidad' =>$id]);
    	//return "profesor creado";
    }



    public function criterio_create ($id){
    	//return 'crear profesor de la especialidad '.$id;
    	return view('flujoAdministrador.profesor_create', ['idEspecialidad'=>$id]);
    }
    
    public function criterio_store (Request $request, $id){
    	
        //crear un usuario 
        $password = bcrypt(123);

        $user = User::create([
            'Usuario' => $request->input('teachercode'),
            'Contrasena' => $password,
            'IdPerfil' => 2
        ]);

        //crear un nuevo profesor
        $teacher = Teacher::create([
            'Correo' => $request->input('teacheremail'),
            'Nombre' => $request->input('teachername'),
            'Codigo' => $request->input('teachercode'),
            'ApellidoPaterno' => $request->input('teacherlastname'),
            'ApellidoMaterno' => $request->input('teachersecondlastname'),
            'IdEspecialidad' => $id, //$data['specialty']= Session::get('faculty-code'),
            'IdUsuario' => $user->IdUsuario,
            'Vigente' => intval($request->input('teacherstatus')),
            'Descripcion' => $request->input('teacherdescription'),
            'Cargo' => $request->input('teacherposition')
        ]);

        //enviar el corrreo al profesor:
        if ($user) {
            $this->passwordService->sendSetPasswordLink($user, $request->input('teacheremail'));
        }

        return redirect()->route('profesor_index.flujoAdministrador', ['id' => $id])
                            ->with('success', 'El profesor se ha registrado exitosamente');
    }



}
