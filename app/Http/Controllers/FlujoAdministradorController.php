<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;

use Intranet\Http\Requests;

use Intranet\Http\Services\Teacher\TeacherService;
use Intranet\Http\Services\User\UserService;
use Intranet\Http\Services\User\PasswordService;

use Intranet\Models\Faculty;
use Intranet\Models\teacher;

class FlujoAdministradorController extends Controller
{
    protected $teacherService;
    protected $userService;
    protected $passwordService;

    public function __construct() {
        $this->teacherService = new TeacherService();
        $this->userService = new UserService;
        $this->passwordService = new PasswordService;
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

    public function edit(Request $request)
    {
       
    }

    public function update(Request $request)
    {
       
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
    	return 'crear profesor de la especialidad '.$id;
    	//return view('flujoAdministrador.profesor_create');
    }
    
    public function profesor_store (){
    	/*Aqui hacer la funcion que guarde en la BD*/
    	//$this->facultyService->create($request->all());

    	/*Continua el flujo con ciclo academico*/
    	return redirect('flujoAdministrador/cicloAcademico');
    }
}
