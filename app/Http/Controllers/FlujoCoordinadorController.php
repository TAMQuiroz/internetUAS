<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;

use Intranet\Http\Requests;

use Session;
use Intranet\Models\Faculty;
use Intranet\Models\EducationalObjetive;
use Intranet\Models\DictatedCourses;
use Intranet\Http\Requests\EducationalObjetiveRequest;
use Intranet\Http\Requests\InstrumentRequest;

use Intranet\Http\Services\Faculty\FacultyService;
use Intranet\Http\Services\StudentsResult\StudentsResultService;
use Intranet\Http\Services\EducationalObjetive\EducationalObjetiveService;
use Intranet\Http\Services\Aspect\AspectService;
use Intranet\Http\Services\Course\CourseService;
use Intranet\Http\Services\Teacher\TeacherService;
use Intranet\Http\Services\MeasurementSource\MeasurementSourceService;
use Intranet\Http\Services\Period\PeriodService;
use Intranet\Http\Services\Cicle\CicleService;
use Intranet\Http\Services\DictatedCourses\DictatedCoursesService;
use Intranet\Http\Services\User\PasswordService;
use Intranet\Http\Services\AcademicCycle\AcademicCycleService;

use Intranet\Http\Requests\AspectRequest;
use Intranet\Http\Requests\CriterioResquest;
use Intranet\Http\Requests\StudentResultRequest;
use Intranet\Http\Requests\CriterioStoreRequest;
use Intranet\Http\Requests\CourseRequest;
use Intranet\Models\Aspect;
use Intranet\Models\User;
use Intranet\Models\Course;
use Intranet\Models\Teacher;
use Intranet\Models\Criterion;
use Intranet\Models\AcademicCycle;
use Intranet\Models\StudentsResult;
use Intranet\Models\MeasurementSource;
use DB;


class FlujoCoordinadorController extends Controller
{
	protected $aspectService;
	protected $studentsResultService;
    protected $educationalObjetiveService;
	protected $facultyService;
    protected $courseService;
    protected $teacherService;
    protected $periodService;
    protected $dictatedCoursesService;
    protected $passwordService;
    protected $academicCycleService;
    protected $measurementSourceService;

	public function __construct() {
		$this->aspectService = new AspectService();
		$this->studentsResultService = new StudentsResultService();
        $this->educationalObjetiveService = new EducationalObjetiveService();
		$this->facultyService = new FacultyService();
        $this->courseService = new CourseService();
        $this->teacherService = new TeacherService();
        $this->measureService= new MeasurementSourceService();
        $this->periodService= new PeriodService();
        $this->cicleService=new CicleService();
        $this->dictatedCoursesService = new DictatedCoursesService();
        $this->passwordService= new PasswordService();
        $this->academicCycleService= new AcademicCycleService();
        $this->measurementSourceService = new MeasurementSourceService();
	}

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
			redirect()->back()->with('warning','Ha ocurrido un error');
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
			redirect()->back()->with('warning','Ha ocurrido un error');
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
    	$criterio->Estado= 0;

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
            $data['studentsResults'] = $this->studentsResultService->retrieveByFaculty($id);
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un erroaar'); 
        }
        
        return view('flujoCoordinador.studentResult_index', $data);
    }

    public function studentResult_create($id){
        $data['title'] = "Nuevo Resultado Estudiantil";
        $data['id'] = $id;

        try {               
            $data['educationalObjetives'] = EducationalObjetive::where('IdEspecialidad', $id)
                                            ->where('deleted_at', null)->get();       
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        //dd($data['educationalObjetives']);
        return view('flujoCoordinador.studentResult_create', $data);
    }

    public function studentResult_store(StudentResultRequest $request, $id){
        try {
            $studentsResult = $this->studentsResultService->createByFaculty($request->all(),$id);
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

    public function courses_delete($idCourse){
        $id = Session::get('faculty-code');
        try{
            $this->courseService->deleteCourseById($idCourse);
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error');
        }
        return redirect()->route('courses_index.flujoCoordinador', $id)->with('success', 'Se eliminó el curso con éxito');
    }
    

    ///inicializando periodos y ciclos

    public function createPeriod($id)
    {
        $data['title'] = 'Iniciar Nuevo Periodo';
        $data['idEspecialidad'] = $id;
        //dd("hola2");
        try {
            $data['semesters'] = $this->facultyService->AllCycleAcademic();
            $data['measures'] = $this->measureService->allByFaculty2($id);
            $data['studentsResults'] = $this->studentsResultService->findByFaculty2($id);
            $data['educationalObjetives'] = $this->educationalObjetiveService->findByFaculty2($id);
            
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error');
        }
        //dd("hola");
        return view('flujoCoordinador.period_create', $data);
    }

    public function viewPeriod($id)
    {
        $data['title'] = 'Información del Periodo Actual';

        try {
            $data['idEspecialidad']=$id;
            $data['period'] = $this->periodService->get(Session::get('period-code'));
            $data['semesters'] = $this->facultyService->AllCycleAcademic();
            $data['measures'] = $this->measureService->allByFaculty2(Session::get('period-code'));
            $data['period_semesters'] = $this->cicleService->getCicleByPeriod(Session::get('period-code'));
            $data['studentsResults'] = $this->studentsResultService->findByFaculty();
            $data['educationalObjetives'] = $this->educationalObjetiveService->findByFaculty();
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error');
        }
        return view('flujoCoordinador.period_view', $data);
    }

    public function continuePeriod(Request $request,$id)
    {
        $data['title'] = 'Información del Periodo Actual';
        $request1=$request->all();
        try {
            $data['idEspecialidad']=$id;

            $faculty=$this->facultyService->getId($id);
            $data['especialidad']=$faculty;

            $cicloFin=$this->academicCycleService->getById($request1['cycleEnd']);
            $data['fechaCicloFin']=$cicloFin->Descripcion;
            $cicloInicio=$this->academicCycleService->getById($request1['cycleStart']);
            $data['fechaCicloInicio']=$cicloInicio->Descripcion;

            $data['facultyAgreementLevel']=$request1['facultyAgreementLevel'];
            $data['facultyAgreement']=$request1['facultyAgreement'];
            $data['criteriaLevel']=$request1['criteriaLevel'];


            /*
            $regular_professors = isset($request['regular_professors'])?$request['regular_professors']:[];
            $course->regularProfessors()->sync($regular_professors);
*/

            $measures = (array_key_exists('measures', $request1))?$request1['measures']: [];
            //dd($measures);
            $educationalObjetives = (array_key_exists('objCheck', $request1))?$request1['objCheck']: [];
            $studentsResults = (array_key_exists('stRstCheck', $request1))?$request1['stRstCheck']: [];
            $aspects = (array_key_exists('aspCheck', $request1))?$request1['aspCheck']: [];
            $criterions = (array_key_exists('crtCheck', $request1))?$request1['crtCheck']: [];

            $studentResultsAll = StudentsResult::where('IdEspecialidad', $id)
            ->where('deleted_at', null)->get();
            $educationalObjetivesAll = EducationalObjetive::where('IdEspecialidad', $id)
            ->where('deleted_at', null)->get();
            $data['educationalObjetivesAll']=$educationalObjetivesAll;
            $data['educationalObjetives']=$educationalObjetives;
            $data['studentResultAll']=$studentResultsAll;
            $data['studentsResults']=$studentsResults;
            $data['aspects']=$aspects;
            $data['criterions']=$criterions;



            ///para usarlo en el guardado
            $data['cycleStart']=$request1['cycleStart'];
            $data['cycleEnd']=$request1['cycleEnd'];

            $data['measures']=$request1['measures'];
            $data['objCheck']=$request1['objCheck'];
            $data['stRstCheck']=$request1['stRstCheck'];
            $data['aspCheck']=$request1['aspCheck'];
            $data['crtCheck']=$request1['crtCheck'];


        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error');
        }
        return view('flujoCoordinador.period_continue', $data);
    }

    public function storePeriod2(Request $request, $facultyAgreementLevel, $facultyAgreement, $criteriaLevel ,$cycleStart, $cycleEnd, $measures, $objCheck, $stRstCheck, $aspCheck, $crtCheck, $idEspecialidad)
    {
        try {       
            dd("hola");
            $period = $this->facultyService->createFaculty($facultyAgreementLevel, $facultyAgreement, $criteriaLevel ,$cycleStart, $cycleEnd, $measures, $objCheck, $stRstCheck, $aspCheck, $crtCheck, $idEspecialidad);

            //dd($facultyAgreementLevel);
            Session::put('period-code', $period->IdPeriodo);

        } catch (Exception $e) { 
            redirect()->back()->with('warning','Ha ocurrido un error');
        }

        return $this->initAcademicCycle($id);
    }

    public function storePeriod(Request $request, $id)
    {
        try {
            $period = $this->facultyService->createConfFaculty($request->all(), $id);

            Session::put('period-code', $period->IdPeriodo);

        } catch (Exception $e) { 
            redirect()->back()->with('warning','Ha ocurrido un error');
        }

        return $this->initAcademicCycle($id);
    }
      


    
    public function createAcademicCycle($id) {
        $data['title'] = 'Información del Ciclo Actual';
        $data['teachers'] = $this->teacherService->findTeacherByFaculty($id);
        $data['idEspecialidad']=$id;
        try {
            $cycle = Session::get('academic-cycle');
            $data['cycle'] = $cycle;
            if($cycle!=null){
                    $data['dateI'] = date('d/m/Y',strtotime($cycle->FechaInicio.''));
                    $data['dateF'] = date('d/m/Y',strtotime($cycle->FechaFin.''));
            }
            else{
                    $data['dateI'] = null;
                    $data['dateF'] = null;

            }

        $data['cicle'] = $this->facultyService->findCycle($id);
        $data['cycleAcademic'] = $this->facultyService->AllCyclesAcademics();
        $data['results'] = $this->facultyService->allResultsInPeriod();
        if(Session::get('academic-cycle')!= null){
            $data['cyclexresults'] = $this->facultyService->findResultsxCycle(Session::get('academic-cycle')->IdCicloAcademico);
        }else{
            $data['cyclexresults'] = null;
        }

        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error');
        }
        return view('flujoCoordinador.academicCycle_create', $data);
        
    }

    public function viewAcademicCycle($id) {
        $data['title'] = 'Información del Ciclo Actual';
        $data['teachers'] = $this->teacherService->findTeacherByFaculty( Session::get('faculty-code'));
        $data['idEspecialidad'] = $id;
        try {
            $cycle = Session::get('academic-cycle');
            $data['cycle'] = $cycle;
            if($cycle!=null){
                    $data['dateI'] = date('d/m/Y',strtotime($cycle->FechaInicio.''));
                    $data['dateF'] = date('d/m/Y',strtotime($cycle->FechaFin.''));
            }
            else{
                    $data['dateI'] = null;
                    $data['dateF'] = null;

            }
        $data['cicle'] = $this->facultyService->findCycle(Session::get('faculty-code'));
        $data['period'] = $this->facultyService->findPeriod(Session::get('faculty-code'));
        if(Session::get('academic-cycle')!= null){
            $data['cyclexresults'] = $this->facultyService->findResultsxCycle(Session::get('academic-cycle')->IdCicloAcademico);
        }



        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error');
        }
        return view('flujoCoordinador.academicCycle_view', $data);
    }

    public function storeAcademicCycle(Request $request,$id) {
        try {
            $data['idEspecialidad'] = $id;
            $data['title'] = 'Crear Profesor';
            $data['idEspecialidad']=$id;
            $cycle = $this->facultyService->createCycle($request->all());
            $info = 1;
            
            $this->facultyService->activateCycle($request->all());
            $cycle = $this->facultyService->findCycle(Session::get('faculty-code'));
            Session::forget('academic-cycle');
            Session::set('academic-cycle',$cycle);
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error');
        }
        
        return redirect()->route('end3.flujoCoordinador',$data)->with('success', 'Inició el Ciclo Académico');
        
    }

    

    public function initPeriod($id)
    {
        try {
            $data['idEspecialidad']=$id;
            //dd(Session::get('period-code'));
            if(Session::get('period-code')!=null){
                return $this->viewPeriod($id);
            }else{
                return $this->createPeriod($id);
            }
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error');
        }
        
    }

    public function initAcademicCycle($id)
    {
        try {
            $data['idEspecialidad']=$id;
            
            if(Session::get('academic-cycle')!=null){
                return $this->viewAcademicCycle($id);
            }else{
                return $this->createAcademicCycle($id);
            }
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error');
        }
        
    }



    //AJAX
    public function aspectosDelResultado(Request $request){
       
        $idResultado= $request->get('resultado');
        $resultadoEstudiantil= StudentsResult::findOrFail($idResultado);

        $aspectos = $resultadoEstudiantil->aspects;
        //return "llegue hasta aqui". $resultadoEstudiantil->;
        return $aspectos->lists('Nombre', 'IdAspecto');
    }

    //instrumentos
    public function instrumento_index ($id){

        $especialidad = Faculty::findOrFail($id);
        $instrumentos = $especialidad->instruments;
        return view('flujoCoordinador.instrumento_index', ['instrumentos'=>$instrumentos, 'idEspecialidad' =>$id]);

    }

    public function instrumento_create ($id){
        //return 'crear objetivo de la especialidad '.$id;
        return view('flujoCoordinador.instrumento_create', ['idEspecialidad'=>$id]);
    }
    
    public function instrumento_store (InstrumentRequest $request, $id){

        //crear un nuevo instrumento
        
        $measurementSource = MeasurementSource::create([
            'IdEspecialidad' => $id,
            'Nombre' => $request->input('nombre'),
        ]);

        return redirect()->route('instrumento_index.flujoCoordinador', ['id' => $id])
                            ->with('success', 'El instrumento se ha registrado exitosamente');
    }

    //profesores
    public function profesor_index ($id){

        $especialidad = Faculty::findOrFail($id);
        $profesores = $especialidad->teachers;
        return view('flujoCoordinador.profesor_index', ['teachers'=>$profesores, 'idEspecialidad' =>$id]);
        //return "profesor creado";
    }



    public function profesor_create ($id){
        //return 'crear profesor de la especialidad '.$id;
        return view('flujoCoordinador.profesor_create', ['idEspecialidad'=>$id]);
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

        return redirect()->route('profesor_index.flujoCoordinador', ['id' => $id])
                            ->with('success', 'El profesor se ha registrado exitosamente');
    }

    public function end2 ($id){
        return view ('flujoCoordinador.end2', ['idEspecialidad'=>$id]);
    }
    
    public function end3 ($id){
        return view ('flujoCoordinador.end3', ['idEspecialidad'=>$id]);
    }

    public function end4 ($id){
        return view ('flujoCoordinador.end4', ['idEspecialidad'=>$id]);
    }

    public function cursosCiclo_index($id){


        Session::put('id-academic-cycle', 1); //eliminar esto cuando alex termine

        $data['title'] = "Asignar Cursos al Ciclo";
        $data['idEspecialidad'] = $id;

        $idAcademicCycle = Session::get('id-academic-cycle');

        try {
            $data['courses'] = $this->dictatedCoursesService->getCoursesxCycleByCycleByFaculty($idAcademicCycle, $id);
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


    public function instrumentosDelCurso_index($id){
        $cursosDelCicloyEspecialidad =[];
        $data['title'] = "Cursos Dictados en el Ciclo";
        $facultad = Faculty::findOrFail($id);

        $data['facultad']=$facultad;

        try {
            if(Session::get('academic-cycle')!=null){
              
                $cursosDelCicloyEspecialidad =  DB::table('cursoxciclo')
                                        ->join('curso', 'curso.IdCurso', '=', 'cursoxciclo.IdCurso')

                                        ->select('curso.*')

                                        ->where ('curso.IdEspecialidad', '=', $id)
                                        ->where ('cursoxciclo.IdCicloAcademico', '=', Session::get('academic-cycle')->IdCicloAcademico)

                                        //->orderBy('cliente.apellidoPaterno', 'asc')
                                        ->get(); 
                $data['dictatedCourses']= $cursosDelCicloyEspecialidad;
                //$data['dictatedCourses']= $this->courseService->retrieveByFacultyandCicle($id);

                //$data['dictatedCourses'] = $this->dictatedCoursesService->retrieveAllCoursesxCycle();
            }
        } catch(\Exception $e) {
            return redirect()->back()->with('warning', 'Ha ocurrido un error instrumentosDelCurso_index');
        }
        //return $cursosDelCicloyEspecialidad;

        return view('flujoCoordinador.instrumentosDelCurso_index', ['title'=> 'Cursos Dictados en el Ciclo',
                                                                    'facultad'=> $facultad,
                                                                    'cursos' => $cursosDelCicloyEspecialidad
                                                                    ]);
    }

    public function instrumentosDelCurso_edit($id, $idCurso){

        $curso= Course::findOrFail($idCurso);
        $index=0;
        try{
            $data['course'] = $curso;
            $index=1;
            $data['idEspecialidad']= $id;
            $index=2;

            $data['sources'] = $this->measurementSourceService->allMeasuringxPeriod();
            $index=3;

            $data['msrxcrt'] = $this->measurementSourceService->findMxCByCourse($idCurso);
            $index=4;

            $studentsResults = $this->studentsResultService->findResultEvaluated();
            $index=5;

            $data['studentsResults'] = $this->courseService->findStudentsResultsByCourse($idCurso, $studentsResults);
            $index=6;

            
            



        } catch (\Exception $e) {
        //    return $e ;
            return redirect()->back()->with('warning', 'Ha ocurrido un error en instrumentosDelCurso_edit');
        }
        
        return view('flujoCoordinador.instrumentosDelCurso_edit', $data);
    }

    public function instrumentosDelCurso_update (Request $request, $id, $idCurso){
        try {
            $this->measurementSourceService->saveMesuringByCourse($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'Ha ocurrido un error instrumentosDelCurso_update');
        }

        return redirect()->route('instrumentosDelCurso_index.flujoCoordinador', $id)->with('success', "Las modificaciones se han guardado exitosamente");       
    }

    public function contributions($id) {
        $data = [];
        try {
            //dd($id);
            $data['idEspecialidad']=$id;
            $data['currentStudentsResults'] = $this->studentsResultService->findByFacultyAndCicle();
            //dd($data['currentStudentsResults']);
            $data['courses']= $this->courseService->retrieveByFacultyandCicle($id);
            //dd("hola");
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error contributions'); 
        }
        return view('flujoCoordinador.contributions', $data);
    }

    public function updateContributions(Request $request,$id) {
        if(!isset($request['selectorContVal'])){
            return redirect()->back()->with('warning','La matriz de aporte no puede estar vacia.');
        }

        try {
            $this->courseService->updateContributions($request->all());
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error updateContributions'); 
        }
        return redirect()->route('instrumentosDelCurso_index.flujoCoordinador',$id)->with('success', 'La matriz de aporte ha sido actualizada con exito.');
    }


}
