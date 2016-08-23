<?php namespace Intranet\Http\Controllers\MyCourses;

use View;
use Session;
use Illuminate\Http\Request;
use Intranet\Http\Services\Course\CourseService;
use Intranet\Http\Services\DictatedCourses\DictatedCoursesService;

use Intranet\Http\Services\Criterion\CriterionService;
use Intranet\Http\Services\Faculty\FacultyService;
use Intranet\Http\Services\Cicle\CicleService;
use Intranet\Http\Services\Teacher\TeacherService;

use Intranet\Http\Services\TimeTable\TimeTableService;
use Intranet\Http\Services\StudentsResult\StudentsResultService;
use Illuminate\Routing\Controller as BaseController;



use Intranet\Models\Student;

class MyCoursesController extends BaseController {

	protected $courseService;
	protected $dictatedCoursesService;
	protected $facultyService;
	protected $cicleService;
	protected $teacherService;
	protected $timeTableService;
	protected $criterionService;

	public function __construct() {
		$this->courseService = new CourseService();
		$this->dictatedCoursesService = new DictatedCoursesService();
		$this->facultyService = new FacultyService();
		$this->cicleService = new CicleService();
		$this->teacherService = new TeacherService();
		$this->criterionService = new CriterionService();
		$this->timeTableService = new TimeTableService();
		$this->studentsResultService = new StudentsResultService();
	}

	public function index() {
		$data['title'] = "Mis Cursos";
		//$data['user'] = Session::get('user');
		try {
			if(Session::get('academic-cycle') == null)
			{
				$data['currentCycle']  = null;
			}
			else
			{
				$data['currentCycle'] = Session::get('academic-cycle');		
				$this->dictatedCoursesService->setCoursesEvaluated();		
				$dictatedCourses = $this->dictatedCoursesService->retrieveAllCoursesxCycle();				
				$data['timeTables'] = $this->timeTableService->timeTablesByUserCourses($dictatedCourses);			
			}			
			$data['cycles'] = $this->cicleService->retrieveAll();
			$dictatedCoursesAll = $this->dictatedCoursesService->retrieveAll();
			$data['timeTablesAll'] = $this->timeTableService->timeTablesByUserCourses($dictatedCoursesAll);	
		} catch(\Exception $e) {
			dd($e);
		}
		//dd($data);
		return view('myCourses.index', $data);
	}

	public function tableView(Request $request) {
		$data['title'] = "Tabla de Desempeño";
		try {
			$confFaculty = $this->criterionService->getConfFaculty();
			$data['cantLevels']= $confFaculty->CantNivelCriterio;
			$data['minLevel'] = $confFaculty->NivelEsperado;
			$data['timeTable'] = $this->timeTableService->find($request->all());
			$data['studentsResults'] = $studentsResults = $this->studentsResultService->findREByCourse($data['timeTable']->courseXCicle->course->IdCurso);
			$data['students'] = $students = $this->timeTableService->findStudents($request->all());
			$data['scores'] = $scores = $this->timeTableService->findScores($request->all());
			$data['progress'] = count($scores) == 0 ? 0 : $this->studentsResultService->getProgress($studentsResults, $scores, count($students));

		} catch(\Exception $e) {
			dd($e);
		}
		return view('myCourses.table-view', $data);
	}

	public function tableEdit(Request $request) {
		$data['title'] = "Tabla de Desempeño";
		try {
			$confFaculty = $this->criterionService->getConfFaculty();
			$data['cantLevels']= $confFaculty->CantNivelCriterio;
			$data['minLevel'] = $confFaculty->NivelEsperado;
			$data['timeTable'] = $this->timeTableService->find($request->all());
			$data['studentsResults'] = $studentsResults = $this->studentsResultService->findREByCourse($data['timeTable']->courseXCicle->course->IdCurso);
			$data['students'] = $students = $this->timeTableService->findStudents($request->all());
			$data['scores'] = $scores = $this->timeTableService->findScores($request->all());
			$data['progress'] = count($scores) == 0 ? 0 : $this->studentsResultService->getProgress($studentsResults, $scores, count($students));
			//round( ( $countScores * 100.0 ) / ( intval($cant) * count($students) * 1.0 ) , 2)

		} catch(\Exception $e) {
			dd($e);
		}
		return view('myCourses.table-edit', $data);
	}

	public function saveTable(Request $request) {
		
		try {
			$this->timeTableService->saveTable($request->all());

		} catch(\Exception $e) {
			dd($e);
		}
		return redirect()->route('index.myCourses')->with('success', "Las calificaciones de los alumnos se han registrado exitosamente");
	}

	public function finish(Request $request) {
		
		try {
			$this->timeTableService->finish($request->all());

		} catch(\Exception $e) {
			dd($e);
		}
		return redirect()->route('index.myCourses')->with('success', "Ha culminado la tabla de desempeño");
	}

	public function reportView(Request $request) {
		$data['title'] = "Informe de Curso";
		try {
			$data['timeTable'] = $this->timeTableService->find($request->all());
		} catch(\Exception $e) {
			dd($e);
		}
		return view('myCourses.report-view', $data);
	}

	public function reportEdit(Request $request) {
		$data['title'] = "Informe de Curso";
		try {
			$data['timeTable'] = $this->timeTableService->find($request->all());
		} catch(\Exception $e) {
			dd($e);
		}
		return view('myCourses.report-edit', $data);
	}

	public function reportSave(Request $request) {
		try {
			$this->timeTableService->report($request->all());
		} catch(\Exception $e) {
			dd($e);
		}
		return redirect()->route('index.myCourses')->with('success', "Las modificaciones se han guardado exitosamente");
	}

}