<?php

namespace Intranet\Http\Controllers\Psp\PspProcess;

use Illuminate\Http\Request;
use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;

use Intranet\Http\Services\Course\CourseService;
use Intranet\Http\Services\Faculty\FacultyService;
use Intranet\Http\Services\Psp\PspProcessService;
use Intranet\Http\Services\User\PasswordService;
use Intranet\Http\Services\User\UserService;

use Intranet\Models\PspProcess;
use Intranet\Models\PspProcessxTeacher;

use Carbon\Carbon;
use Auth;
use Session;

class PspProcessController extends Controller
{
	public function __construct() {
        $this->courseService = new CourseService;
        $this->facultyService = new FacultyService;
    }
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$academicCycle = Session::get('academic-cycle');
    	if($academicCycle!=null){
            $proc = PspProcess::where('idEspecialidad',Session::get('faculty-code'))->first();

			if($proc != null){					
				//$proc = PspProcess::where('Vigente',1)->first()->where('idEspecialidad',Session::get('faculty-code'))->first();
		    	$this->pspprocessservice = new PspProcessService;
		    	$proceso = $this->pspprocessservice->find();
		    	$teachers = $this->pspprocessservice->retrieveTeachers($proceso->idCurso);
		        $data = [
		            'proceso'    =>  $proceso,
		            'profesores' =>  $teachers,
		        ];
	    	}else{
	    		$data = [
		            'proceso'    =>  null,
		            'profesores'    =>  null,
		        ];
	    		
	    	}
    	}else{
    		$data = [
		            'proceso'    =>  null,
		            'profesores'    =>  null,
		        ];
    	}
    	
    	return view('psp.pspProcess.index',$data);
    }

    public function create()
    {
        $proc = PspProcess::where('idEspecialidad',Session::get('faculty-code'))->first();
    	$academicCycle = Session::get('academic-cycle');

    	if($academicCycle!=null){
    		if($proc != null){					
				//$proc = PspProcess::where('Vigente',1)->first()->where('idEspecialidad',Session::get('faculty-code'))->first();
		    	$this->pspprocessservice = new PspProcessService;
		    	$proceso = $this->pspprocessservice->find();
		    	$teachers = $this->pspprocessservice->retrieveTeachers($proceso->idCurso);
		    	$faculty_id = Session::get('faculty-code');
		    	$cycle_id = $this->facultyService->findCycle($faculty_id)->IdCicloAcademico; 
		    	$courses=null;
		        $data = [
		            'proceso'    =>  $proceso,
		            'profesores' =>  $teachers,
		            'courses' => $courses,
		            'cycle' => $cycle_id
		        ];
	    	}else{
	    		$faculty_id = Session::get('faculty-code');
		    	$cycle_id = $this->facultyService->findCycle($faculty_id)->IdCicloAcademico; 
		    	$order='asc';
		    	try {
		 		   	$courses =   	$this->courseService->findCoursesBySemester($faculty_id,$cycle_id,$order)->lists('Nombre','IdCurso');
		 		   	$var=count($courses);
                    if($var==0){
                        $courses=null;
                    }
                    $data = [ 'proceso'    =>  null,
		            		'profesores'    =>  null,
		            		'courses' => $courses, 'cycle' => $cycle_id];
		 		   	
		        } catch(\Exception $e) {
		            redirect()->back()->with('warning','Ha ocurrido un error'); 
		        }
	    	}
	    	return view('psp.pspProcess.create',$data);
    	}
    	else{
    		return redirect()->route('pspProcess.index')->with('warning','Primero se debe iniciar un ciclo'); 
    	}
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->pspprocessservice = new PspProcessService;
    	try{
    		$proceso                   = new PspProcess;
    		$proceso->numero_Fases = 0;
    		$proceso->numero_Plantillas = 0;
    		$proceso->max_tam_plantilla = 0;
    		$proceso->idEspecialidad = Session::get('faculty-code');
    		$proceso->idCurso = $request['IdCurso'];
    		$proceso->idCiclo = $request['idCiclo']; //el mismo idcicloacademico que se encuentra en tabla cicloxespecialida
    		$teachers = $this->pspprocessservice->retrieveTeachers($proceso->idCurso);
    		if($teachers!=null){
    			$proceso->save();
    			$this->passwordService = new PasswordService;
				$this->usersservice = new UserService;
    			foreach ($teachers as $teacher) { //crear accesos para profesores
    				$acceso = new PspProcessxTeacher;
    				$acceso->idPspProcess = $proceso->id;
    				$acceso->IdDocente = 	$teacher['IdDocente'];
    				$acceso->save();
    				//encontrar usuario de profesor
                    /*
    				$usuario = $this->usersservice->getUser($teacher['IdUsuario']);
                    dd($usuario);
    				if ($usuario) {
		                $this->passwordService->sendSetPasswordLink($usuario, $teacher['Correo']);
		            }*/
    			}
    			return redirect()->route('pspProcess.index')->with('success', 'El modulo se ha activado exitosamente');
    		}
    		else
    			return redirect()->back()->with('warning', 'El curso debe tener al menos un profesor a cargo');
    	}catch (Exception $e){
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    public function destroy()
    {
     try {
            $proceso   = PspProcess::where('idEspecialidad',Session::get('faculty-code'))->first();

            $proceso->delete();

            return redirect()->route('pspProcess.index')->with('success', 'El modulo Psp se ha cerrado exitosamente');
        } catch (Exception $e){
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }  
    }
}
