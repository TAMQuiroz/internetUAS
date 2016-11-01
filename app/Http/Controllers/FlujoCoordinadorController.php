<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;

use Intranet\Http\Requests;

use Session;
use Intranet\Models\Faculty;
use Intranet\Models\EducationalObjetive;
use Intranet\Http\Requests\EducationalObjetiveRequest;
use Intranet\Http\Requests\InstrumentRequest;

use Intranet\Http\Services\Faculty\FacultyService;
use Intranet\Http\Services\StudentsResult\StudentsResultService;
use Intranet\Http\Services\EducationalObjetive\EducationalObjetiveService;
use Intranet\Http\Services\Aspect\AspectService;
use Intranet\Http\Services\Course\CourseService;
use Intranet\Http\Services\Teacher\TeacherService;

use Intranet\Http\Requests\AspectRequest;
use Intranet\Http\Requests\CriterioResquest;
use Intranet\Http\Requests\StudentResultRequest;
use Intranet\Http\Requests\CriterioStoreRequest;
use Intranet\Http\Requests\CourseRequest;
use Intranet\Models\Aspect;
use Intranet\Models\criterion;
use Intranet\Models\StudentsResult;
use Intranet\Models\MeasurementSource;

class FlujoCoordinadorController extends Controller
{
	protected $aspectService;
	protected $studentsResultService;
    protected $educationalObjetiveService;
	protected $facultyService;
    protected $courseService;
    protected $teacherService;

	public function __construct() {
		$this->aspectService = new AspectService();
		$this->studentsResultService = new StudentsResultService();
        $this->educationalObjetiveService = new EducationalObjetive();
		$this->facultyService = new FacultyService();
        $this->courseService = new CourseService();
        $this->teacherService = new TeacherService();

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
        $data['title'] = "Courses";
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
        $data['title'] = 'New Course';

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
        $data['title'] = 'Edit Course';
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
        //dd($id);
        try {
            $currentStudentsResults = $this->studentsResultService->findByFaculty($id);
            $this->courseService->updateCourse($request->all(), $currentStudentsResults);
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error');
        }
        return redirect()->route('courses_index.flujoCoordinador', $id)->with('success', 'Las modificaciones se han guardado exitosamente');
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

}
