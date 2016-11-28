<?php

namespace Intranet\Http\Controllers\Psp\PspProcess;

use Illuminate\Http\Request;
use Intranet\Http\Requests;
use Intranet\Http\Requests\pspProcessEditRequest;
use Intranet\Http\Controllers\Controller;

use Intranet\Http\Services\Course\CourseService;
use Intranet\Http\Services\Faculty\FacultyService;
use Intranet\Http\Services\Psp\PspProcessService;
use Intranet\Http\Services\User\PasswordService;
use Intranet\Http\Services\User\UserService;

use Intranet\Models\PspProcess;
use Intranet\Models\Student;
use Intranet\Models\PspStudent;
use Intranet\Models\PspProcessxTeacher;
use Intranet\Models\PspProcessxSupervisor;
use Intranet\Models\Teacher;
use Intranet\Models\CoursexTeacher;

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
            $cyclexcurso = $this->facultyService->findCycle($faculty_id);
            $idCicloAcademico = $cyclexcurso->IdCicloAcademico;
            $idCiclo = $cyclexcurso->IdCiclo; 
            $order='asc';
            $courses =  $this->courseService->findCoursesBySemester($faculty_id,$idCicloAcademico,$order)->lists('Nombre','IdCurso');
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
                'cycle' => $idCiclo
            ];
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

            $existe = 0;
            if(count($profesores)==0){
                $profesores = CoursexTeacher::where('IdCurso',$proceso->idcurso)->get();
                $existe = 1;
            }
            foreach ($profesores as $profesor) {
                if($existe==0){
                    $request = [
                    'idProceso'      =>  $proceso->id,
                    'idProfesor' =>$profesor->iddocente,
                    ];    
                    $profesorAct = Teacher::find($profesor->iddocente);
                }else{
                    $request = [
                    'idProceso'      =>  $proceso->id,
                    'idProfesor' =>$profesor->IdDocente,
                    ];    
                    $profesorAct = Teacher::find($profesor->IdDocente);    
                }
                
                $prof = $profesorAct->es_supervisorpsp;
                if($prof == null){
                    $students = $this->pspprocessservice->haveStudents($request);
                    foreach ($students as $student) {
                        $upd = Student::find($student->IdAlumno);
                        $upd->lleva_psp = null;
                        $upd->save();

                        $pspstudent = PspStudent::where('idalumno',$student->IdAlumno)->where('idpspprocess',$id)->first();
                        if($pspstudent!=null)
                            $pspstudent->delete();
                    }    
                }
                
                $ids = [];
                array_push($ids, $proceso->id);
                
                if($existe==0){
                    if($prof !=null){
                        $activos = PspProcessxTeacher::where('iddocente',$profesorAct->IdDocente)->whereNotIn('idpspprocess',$ids)->get();

                        if(count($activos) == 0){
                            $profesorAct->es_supervisorpsp = null;
                            $profesorAct->save();
                        }
                    }
                    $profesor->delete();
                }
            }
            
            $supervisors = PspProcessxSupervisor::where('idpspprocess',$id)->get();
            foreach ($supervisors as $supervisor) {
                $supervisor->delete();
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

                //crear registro en pspstudents
                $pspstudent = new PspStudent;
                $pspstudent->idalumno = $student->IdAlumno;
                $pspstudent->idpspprocess = $request['idProceso'];
                $pspstudent->save();
            }

            $data = [
                'proceso'      =>  $proceso,
                'profesores' =>$teachers,

            ];
        return redirect()->route('pspProcess.show', $data)->with('success', 'Se dieron accesos a los alumnos del horario correctamente');
    }

        public function editconf($id)
    {
        $psp    = PspProcess::find($id);

        $data = [
            'psp'    =>  $psp,
        ];
        return view('psp.pspProcess.confedit', $data);
    }

        public function updateconf(pspProcessEditRequest $request, $id)
    {
        try {
            $psp    = PspProcess::find($id);
            $psp->max_tam_plantilla  = $request['Tamaño_Maximo_de_Archivo'];
            $psp->numero_Plantillas  = $request['Numero_maximo_de_Plantillas'];
            $psp->numero_Fases  = $request['Numero_maximo_de_Fases'];
            $psp->save();
            return redirect()->route('pspProcess.conf')->with('success', 'Se ha actualizado la configuracion exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }

    }

    public function indexconf()
    {
        $academicCycle = Session::get('academic-cycle');
        $proc=null;
        if($academicCycle!=null){
            if(Auth::User()->IdPerfil==3){  
                $proc = PspProcess::get();
            } else {
                $teacher = Teacher::where('IdUsuario',Auth::User()->IdUsuario)->first(); 
                $procxt= PspProcessxTeacher::where('iddocente',$teacher->IdDocente)->get(); 
                $proc = array(); 
                $r = count($procxt);   
                if($r>0){
                    foreach($procxt as $p){
                        $proc[]=PspProcess::find($p->idpspprocess);
                    }
                }
            }
            if($proc != null){                  
                $data = [
                    'procesos'    =>  $proc,
                ];
            }else{
                $data = [
                    'procesos'    =>  null,
                ];                
            }
        }
        else{
            $data = [
                    'procesos'    =>  null,
                ];
        }
        return view('psp.pspProcess.confindex',$data);
    }

}
