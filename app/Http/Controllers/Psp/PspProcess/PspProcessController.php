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
use Intranet\Models\Student;
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
            $proc = PspProcess::where('idEspecialidad',Session::get('faculty-code'))->first(); //si existe al menos uno

			if($proc != null){					
				//$proc = PspProcess::where('Vigente',1)->first()->where('idEspecialidad',Session::get('faculty-code'))->first();
		    	$this->pspprocessservice = new PspProcessService;
		    	$proceso = $this->pspprocessservice->find();
		        $data = [
		            'procesos'    =>  $proceso,
		        ];
	    	}else{
	    		$data = [
		            'procesos'    =>  null,
		        ];
	    		
	    	}
    	}else{
    		$data = [
		            'procesos'    =>  null,
		        ];
    	}
    	return view('psp.pspProcess.index',$data);
    }

    public function create()
    {
    	$academicCycle = Session::get('academic-cycle');

    	if($academicCycle!=null){
            $faculty_id = Session::get('faculty-code');
            $cycle_id = $this->facultyService->findCycle($faculty_id)->IdCicloAcademico; 
            $order='asc';
            $courses =  $this->courseService->findCoursesBySemester($faculty_id,$cycle_id,$order)->lists('Nombre','IdCurso');
            $var=count($courses);
            if($var==0){
                $array=null;
            }else{
                $this->pspprocessservice = new PspProcessService;
                $procesos = $this->pspprocessservice->find();
                $array = $courses->toArray();
                foreach ($procesos as $proceso) {
                    unset($array[$proceso['idcurso']]);
                }
            }

            $data = [
                'courses' => $array,
                'cycle' => $cycle_id
            ];
            dd($data);
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
    		$proceso->idcurso = $request['IdCurso'];
    		$proceso->idCiclo = $request['idCiclo']; //el mismo idcicloacademico que se encuentra en tabla cicloxespecialida
    		$teachers = $this->pspprocessservice->retrieveTeachers($proceso->idCurso);
			$proceso->save();
			
			return redirect()->route('pspProcess.index')->with('success', 'El modulo se ha activado exitosamente');
    		
    	}catch (Exception $e){
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    public function show($id)
    {
        $this->pspprocessservice = new PspProcessService;
        $proceso = $this->pspprocessservice->findById($id);
        $teachers = $this->pspprocessservice->retrieveTeachers($proceso->idcurso);
        $cont=0;
        foreach ($teachers as $teacher) {
            $existe=PspProcessxTeacher::where('idPspProcess',$id)->where('IdDocente',$teacher['IdDocente'])->first();
            $alt= [
                'idProfesor' => $teacher['IdDocente'],
                'idProceso' => $id,
            ];

            $students = $this->pspprocessservice->haveStudents($alt);

            if($students == null || (count($students)==0)){
                $teacher['psp']=0;
                $teacher['alumnos']=0;
            }
            else{
                if( $students[0]->lleva_psp != 1)
                    $teacher['psp']=0;
                else
                    $teacher['psp']=1;
                $teacher['alumnos']=1;
            }

            if($existe!=null){
                $teacher['activo'] = 1;
            }else
                $teacher['activo'] = 0;
            array_push($teachers, $teacher);
            $cont++;
        }
        array_splice($teachers, 0,$cont);
        $data = [
            'proceso'      =>  $proceso,
            'profesores' =>$teachers,
        ];
        return view('psp.pspProcess.show',$data);
    }

    public function destroy($id)
    {
     try {
            $proceso   = PspProcess::where('id',$id)->first();
            $profesores = PspProcessxTeacher::where('idpspprocess',$id)->get();
            $this->pspprocessservice = new PspProcessService;
            foreach ($profesores as $profesor) {
                $request = [
                    'idProceso'      =>  $proceso->id,
                    'idProfesor' =>$profesor->iddocente,
                ];
                $students = $this->pspprocessservice->haveStudents($request);
                foreach ($students as $student) {
                    $upd = Student::find($student->IdAlumno);
                    $upd->lleva_psp = null;
                    $upd->save();
                }
                $profesor->delete();
            }


            $proceso->delete();

            return redirect()->route('pspProcess.index')->with('success', 'El modulo Psp se ha cerrado exitosamente');
        } catch (Exception $e){
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }  
    }

    public function activateTeacher(Request $request)
    {
            $acceso = new PspProcessxTeacher;
            $acceso->idPspProcess = $request['idProceso'];
            $acceso->IdDocente =    $request['idProfesor'];
            $acceso->save();

            $this->pspprocessservice = new PspProcessService;
            $proceso = $this->pspprocessservice->findById($request['idProceso']);
            $teachers = $this->pspprocessservice->retrieveTeachers($proceso->idcurso);
            
            $cont=0;
            foreach ($teachers as $teacher) {
                $existe=PspProcessxTeacher::where('idPspProcess',$request['idProceso'])->where('IdDocente',$teacher['IdDocente']);
                if($existe!=null){
                    $teacher['activo'] = 1;
                }else
                    $teacher['activo'] = 0;
                array_push($teachers, $teacher);
                $cont++;
            }
            array_splice($teachers, 0,$cont);

            $data = [
                'proceso'      =>  $proceso,
                'profesores' =>$teachers,
            ];
        return redirect()->route('pspProcess.show', $data)->with('success', 'El profesor se activo correctamente');
    }

    public function activateStudents(Request $request)
    {
            $this->pspprocessservice = new PspProcessService;
            $students = $this->pspprocessservice->haveStudents($request);
            $proceso = $this->pspprocessservice->findById($request['idProceso']);
            $teachers = $this->pspprocessservice->retrieveTeachers($proceso->idcurso);

            foreach ($students as $student) {
                $upd = Student::find($student->IdAlumno);
                $upd->lleva_psp = 1;
                $upd->save();
            }

            $data = [
                'proceso'      =>  $proceso,
                'profesores' =>$teachers,

            ];
        return redirect()->route('pspProcess.show', $data)->with('success', 'Se dieron accesos a los alumnos del horario correctamente');
    }
}
