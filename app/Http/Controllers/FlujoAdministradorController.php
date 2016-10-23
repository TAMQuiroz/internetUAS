<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;

use Intranet\Http\Requests;

use Intranet\Http\Services\Teacher\TeacherService;
use Intranet\Http\Services\User\UserService;
use Intranet\Http\Services\User\PasswordService;
use Intranet\Http\Services\Faculty\FacultyService;


use Session;
use Intranet\Models\Faculty;
use Intranet\Models\teacher;

class FlujoAdministradorController extends Controller
{
    protected $teacherService;
    protected $userService;
    protected $passwordService;
    protected $facultyService;

    public function __construct() {
        $this->teacherService = new TeacherService();
        $this->userService = new UserService;
        $this->passwordService = new PasswordService;
        $this->facultyService = new FacultyService;
    }

    public function index()
    {
      return view('flujoAdministrador.facultad_create');
    }


    public function create()
    {
       
    }

    public function save(Request $request)
    {
      
    }

    public function facultad_edit($id)
    {
       $data['title'] = 'Edit Faculty';
        try {
            $data['fac'] =Faculty::where('IdEspecialidad', $id)->first();
        } catch (\Exception $e) {
            dd($e);
        }
        return view('flujoAdministrador.facultad_edit',$data);
    }

    public function facultad_update(Request $request)
    {
       try {
            $this->facultyService->update_without_coordinator($request);
        } catch(\Exception $e) {
            dd($e);
        }
        return redirect()->route('profesor_index.flujoAdministrador', ['id' => $request->get('facultyId')]);
    }

    public function delete(Request $request)
    {
       
    }

    //facultades
    public function facultad_create (){
    	return view('flujoAdministrador.facultad_create');
    }

    public function facultad_store (Request $request){
    	/*Aqui hacer la funcion que guarde en la BD*/
    	$facultad= new faculty();
    	$facultad->nombre=$request->get('nombre');
    	$facultad->codigo=$request->get('codigo');
    	$facultad->descripcion=$request->get('descripcion');
    	

    	$facultad->save();

    	/*Continua el flujo con profesores*/
    	return redirect()->route('profesor_index.flujoAdministrador', ['id' => $facultad->IdEspecialidad]);
    }


    //profesores
    public function profesor_index ($id){

		$especialidad = Faculty::findOrFail($id);
		$profesores = $especialidad->teachers;
		return view('flujoAdministrador.profesor_index', ['teachers'=>$profesores, 'idEspecialidad' =>$id]);
    	
    }



    public function profesor_create ($id){
    	//return 'crear profesor de la especialidad '.$id;
    	return view('flujoAdministrador.profesor_create', ['idEspecialidad'=>$id]);
    }
    
    public function profesor_store (Request $request, $id){
    	
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
