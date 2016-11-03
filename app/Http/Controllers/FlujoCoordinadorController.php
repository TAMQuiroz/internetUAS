<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;

use Intranet\Http\Requests;

use Session;
use Intranet\Models\Faculty;
use Intranet\Models\EducationalObjetive;
use Intranet\Models\DictatedCourses;
use Intranet\Http\Requests\EducationalObjetiveRequest;

use Intranet\Http\Services\Faculty\FacultyService;
use Intranet\Http\Services\StudentsResult\StudentsResultService;
use Intranet\Http\Services\EducationalObjetive\EducationalObjetiveService;
use Intranet\Http\Services\Aspect\AspectService;
use Intranet\Http\Services\Course\CourseService;
use Intranet\Http\Services\Teacher\TeacherService;
use Intranet\Http\Services\DictatedCourses\DictatedCoursesService;

use Intranet\Http\Requests\AspectRequest;
use Intranet\Http\Requests\CriterioResquest;
use Intranet\Http\Requests\StudentResultRequest;
use Intranet\Http\Requests\CriterioStoreRequest;
use Intranet\Http\Requests\CourseRequest;
use Intranet\Models\Aspect;
use Intranet\Models\criterion;
use Intranet\Models\StudentsResult;

class FlujoCoordinadorController extends Controller
{
	protected $aspectService;
	protected $studentsResultService;
    protected $educationalObjetiveService;
	protected $facultyService;
    protected $courseService;
    protected $teacherService;
    protected $dictatedCoursesService;

	public function __construct() {
		$this->aspectService = new AspectService();
		$this->studentsResultService = new StudentsResultService();
        $this->educationalObjetiveService = new EducationalObjetive();
		$this->facultyService = new FacultyService();
        $this->courseService = new CourseService();
        $this->teacherService = new TeacherService();
        $this->dictatedCoursesService = new DictatedCoursesService();
	}


    //


    public function index()
    {

    	$data['idEspecialidad']=$this->facultyService->getFacultyxDocente();

      	return view('flujoCoordinador.index',$data);
    }

    public function aspect_index($id) {

		$data['title'] = 'Aspectos';
		try {			
			$studentResults= $this->studentsResultService->findByFaculty2($id);
			$data['studentsResults'] = $studentResults;
			$data['aspects'] = $this->aspectService->findByRE($studentResults);
            $data['idEspecialidad']=$id;
		} catch(\Exception $e) {
			dd($e);
		}
		return view('flujoCoordinador.aspect_index', $data);
	}

	public function aspect_create(AspectRequest $request, $id) {
	
			$data['title'] = 'Nuevo Aspecto';
			$data['resultado']=$this->studentsResultService->findById($request->all());
            $data['idEspecialidad']=$id;
			return view('flujoCoordinador.aspect_create', $data);
				
	}

	public function aspect_store(Request $request,$id) {
		try {
			$this->aspectService->create($request->all());
		} catch(\Exception $e) {
			dd($e);
		}
		return redirect()->route('aspect_index.flujoCoordinador',$id)->with('success', 'El aspecto se ha registrado exitosamente');
	}

    //Criterios
    public function criterio_index ($id){

		$especialidad = Faculty::findOrFail($id);
		$resultados = $especialidad->studentsResults;
		return view('flujoCoordinador.criterio_index', ['resultados'=>$resultados, 'idEspecialidad' =>$id]);
    	//return "profesor creado";
    }

    public function criterio_create (CriterioResquest $request, $id){
    	//$idResultado = $request->get('resultado');
    	//$resultado= StudentsResult::findOrFail($idResultado);

    	$idAspecto = $request->get('aspecto');
    	$aspecto= Aspect::findOrFail($idAspecto);

    	return view('flujoCoordinador.criterio_create', ['idEspecialidad'=>$id, 'aspecto'=>$aspecto]);
    }

    public function criterio_store(CriterioStoreRequest $request, $id){
    	$criterio = new Criterion;

    	$criterio->IdAspecto= $request->idAspecto;
    	$criterio->Nombre= $request->nombre;
    	$criterio->Estado= 1;

    	$criterio->save();

    	return redirect()->route('criterio_index.flujoCoordinador', ['id' => $id])
                            ->with('success', 'El criterio se ha registrado exitosamente');

    }
    //Fin de criterio
    
    //objetivos educacionales
    public function objetivoEducacional_index ($id){

		$especialidad = Faculty::findOrFail($id);
		$objetivos = $especialidad->objectives;
		return view('flujoCoordinador.objetivoEducacional_index', ['objetivos'=>$objetivos, 'idEspecialidad' =>$id]);

    }

    public function objetivoEducacional_create ($id){
    	//return 'crear objetivo de la especialidad '.$id;
    	return view('flujoCoordinador.objetivoEducacional_create', ['idEspecialidad'=>$id]);
    }
    
    public function objetivoEducacional_store (EducationalObjetiveRequest $request, $id){

        //crear un nuevo objetivo educacional
        $numberOE = EducationalObjetive::where('IdEspecialidad',Session::get('faculty-code'))
									   ->where('deleted_at',null)->count();
		$numberOE = ($numberOE) + 1;
		$educationalObjetive = EducationalObjetive::create([
			'IdEspecialidad' => $id,
			'Numero' => $numberOE,
			'Descripcion' => $request->input('descripcion'),
			'Estado' => 1,
		]);

        return redirect()->route('objetivoEducacional_index.flujoCoordinador', ['id' => $id])
                            ->with('success', 'El objetivo educacional se ha registrado exitosamente');
    }

    public function studentResult_index($id){        

        $data['title'] = "Resultados Estudiantiles";
        $data['id'] = $id;
        try {
            $data['studentsResults'] = $this->studentsResultService->retrieveAllByFaculty($id);
            //dd($data['studentsResults']);
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un erroaar'); 
        }
        
        return view('flujoCoordinador.studentResult_index', $data);
    }

    public function studentResult_create($id){
        $data['title'] = "Nuevo Resultado Estudiantil";
        $data['id'] = $id;

        try {            
            //$data['educationalObjetives'] = $this->educationalObjetiveService->findByFaculty($id);     
            $data['educationalObjetives'] = EducationalObjetive::where('IdEspecialidad', Session::get('faculty-code'))
                                            ->where('deleted_at', null)->get();       
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        //dd($data['educationalObjetives']);
        return view('flujoCoordinador.studentResult_create', $data);
    }

    public function studentResult_store(StudentResultRequest $request, $id){
        try {
            $studentsResult = $this->studentsResultService->create($request->all());
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return redirect()->route('studentResult_index.flujoCoordinador',$id)->with('success', "El resultado estudiantil se ha registrado exitosamente");
    }

    public function end1 ($id){
        return view ('flujoCoordinador.end1', ['idEspecialidad'=>$id]);
    }

    public function courses_index($id){
        //$faculty_id = Session::get('faculty-code');
        $data['title'] = "Cursos";
        $data['idEspecialidad'] = $id;
        try {
            $data['faculty'] = $this->facultyService->find($id);
        } catch (Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }

        try {
            $data['courses'] = $this->courseService->retrieveByFaculty($id);
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }

        return view('flujoCoordinador.courses_index', $data);
    }
   
    public function courses_create($id){
        $data['title'] = 'Crear Curso';

        try {
            $data['idEspecialidad'] = $id;
            $data['faculties'] = $this->facultyService->retrieveAll();
            $data['studentResults'] = $this->studentsResultService->findByFaculty($id);
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return view('flujoCoordinador.courses_create', $data);
    }

    public function courses_store(CourseRequest $request, $id){

        try {
            $currentStudentsResults = $this->studentsResultService->findByFaculty();
            $this->courseService->createCourse($request->all(), $currentStudentsResults);
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }

        return redirect()->route('courses_index.flujoCoordinador', $id)->with('success', 'El curso se ha registrado exitosamente');
    }

    public function courses_edit(Request $request, $id, $idCourse){
        $data['title'] = 'Editar Curso';
        $data['idEspecialidad'] = $id;
        try {
            $data['faculties'] = $this->facultyService->retrieveAll();
            //dd('asas');
            $data['course'] = $this->courseService->findCourseByIdRegular($idCourse);
            //dd($data['course']);
            $data['studentResults'] = $this->studentsResultService->findByFaculty($id);
            //Needs to get it from the selected one in the courses table
            $data['teachers'] = $this->teacherService->retrieveAll();
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
       
        return view('flujoCoordinador.courses_edit', $data);
    }

    public function courses_update(Request $request, $id){
        try {
            $currentStudentsResults = $this->studentsResultService->findByFaculty($id);
            $this->courseService->updateCourse($request->all(), $currentStudentsResults);
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error');
        }
        return redirect()->route('courses_index.flujoCoordinador', $id)->with('success', 'Las modificaciones se han guardado exitosamente');
    }


    public function cursosCiclo_index($id){

        Session::put('id-academic-cycle', 1); //eliminar esto cuando alex termine

        $data['title'] = "Asignar Cursos al Ciclo";
        $data['idEspecialidad'] = $id;

        $idAcademicCycle = Session::get('id-academic-cycle');

        try {

            $data['courses'] = $this->dictatedCoursesService->getCoursesxCycleByCycle($idAcademicCycle);

        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error');
        }

        return view('flujoCoordinador.cursosCiclo_index', $data);
    }

    public function cursosCiclo_edit($id){
        $idAcademicCycle = Session::get('id-academic-cycle');
        //dd($idAcademicCycle);
        $data['title'] = 'Seleccionar Cursos';
        $data['idEspecialidad'] = $id;

        try {
            $data['courses'] = $this->courseService->retrieveByFaculty($id);            
            $data['dictatedCourses'] = $this->dictatedCoursesService->getCoursesxCycleByCycle($idAcademicCycle);
            //dd($data['dictatedCourses']);
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error');
        }
        return view('flujoCoordinador.cursosCiclo_edit', $data);
    }

    public function cursosCiclo_update(Request $request, $id){
        $idAcademicCycle = Session::get('id-academic-cycle');

        if(sizeof($request['check']) == 1){
            return redirect()->back()->with('warning','Debe haber al menos un curso dictado en el ciclo');
        }

        try {

            $code = $this->dictatedCoursesService->updateByNewCycle($request->all(), $idAcademicCycle);

        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error');
        }
        if($code){
            return redirect()->route('cursosCiclo_index.flujoCoordinador', $id)->with('success', 'Cursos Dictados en el Ciclo actualizados');
        } else{
            return redirect()->route('cursosCiclo_index.flujoCoordinador', $id)->with('success', 'Todos los Cursos Dictados no deben estar actualizados');
        }
    }

    public function cursosCicloHorario_index($id, $idCourse){
        $idAcademicCycle = Session::get('id-academic-cycle');
        $data['title'] = 'Asignar Horario al Curso';
        $data['idEspecialidad'] = $id;
        try {
            $data['course'] = $this->dictatedCoursesService->findCourseById($idCourse);
            $data['timetable'] = $this->dictatedCoursesService->retrieveTimeTablesByCourse($idCourse, $idAcademicCycle);
            $data['timetablexteacher'] = $this->dictatedCoursesService->retrieveAllTeachersByCourse($idCourse, $idAcademicCycle);
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error');
        }
        return view('flujoCoordinador.cursosCicloHorario_index', $data);    
    }

    public function cursosCicloHorario_create($id,$idCourse){
        $idAcademicCycle = Session::get('id-academic-cycle');
        $data['title'] = 'Nuevo Horario';
        $data['idEspecialidad'] = $id;
        try {
            $data['coursexcicle'] = $this->dictatedCoursesService->findNewCoursexCicle($idCourse,$idAcademicCycle);
            $data['coursexteachers'] = $this->dictatedCoursesService->findTeachersByCourses($idCourse);
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error');
        }

        return view('flujoCoordinador.cursosCicloHorario_create', $data);
    }

    public function cursosCicloHorario_store(Request $request,$id,$idCourse){
        try {
            $this->dictatedCoursesService->register($request->all());
            $data['coursexcicle'] = $this->dictatedCoursesService->findCoursexCicle($request->all());
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error');
        }
        return redirect()->route('cursosCicloHorario_index.flujoCoordinador', ['id' => $id, 'idCourse' => $idCourse])->with('success', 'Se registró el horario con éxito');

    }

    public function cursosCicloHorario_edit($id, $idCurso, $idHorario){
        $idAcademicCycle = Session::get('id-academic-cycle');

        $data['idEspecialidad'] = $id;
        try {
            $data['courseId'] = $idCurso;             
            $data['timetable'] = $this->dictatedCoursesService->findTimeTableById($idHorario);            
            $data['timetablexteacher'] = $this->dictatedCoursesService->findTeachersxTimeTableByTimeTable($idHorario);      
            $data['coursexcicle'] = $this->dictatedCoursesService->findCoursexCicleByCourse($idCurso, $idAcademicCycle);            
            $data['coursexteachers'] = $this->dictatedCoursesService->findTeachersByCourses($idCurso);
            
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error');
        }
        return view('flujoCoordinador.cursosCicloHorario_edit', $data);
    }

    public function cursosCicloHorario_update(Request $request, $id,$idCurso){
        try {
            $this->dictatedCoursesService->updateTimeTable($request->all());
            $data['coursexcicle'] = $this->dictatedCoursesService->findCoursexCicle($request->all());
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error');
        }//$id, $idCourse
        return redirect()->route('cursosCicloHorario_index.flujoCoordinador', ['id' => $id,'idCourse' => $request['courseId']])->with('success', 'Se actualizó el horario con éxito');
    }

    public function cursosCicloHorario_delete($idCourse, $idHorario){
        $id = Session::get('faculty-code');
        try{
            $this->dictatedCoursesService->deleteById($idHorario);
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error');
        }
        return redirect()->route('cursosCicloHorario_index.flujoCoordinador', ['id' => $id,'idCourse' => $idCourse])->with('success', 'Se eliminó el horario con éxito');
    }

}
