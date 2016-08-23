<?php namespace Intranet\Http\Controllers\DictatedCourses;

use View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Intranet\Http\Services\Cicle\CicleService;
use Intranet\Http\Services\DictatedCourses\DictatedCoursesService;
use Intranet\Http\Services\Course\CourseService;
use Intranet\Http\Services\EvaluatedCourse\EvaluatedCourseService;
use Intranet\Http\Services\StudentsResult\StudentsResultService;
use Session;


class DictatedCoursesController extends BaseController {

	protected $dictatedCoursesService;
	protected $studentsResultService;

	public function __construct() {

		$this->dictatedCoursesService = new DictatedCoursesService();
		$this->studentsResultService = new StudentsResultService();
	}

	public function index() {

		$data['title'] = "Cursos Dictados en el Ciclo";

		try {
			if(Session::get('academic-cycle')!=null){
				$data['dictatedCourses'] = $this->dictatedCoursesService->retrieveAllCoursesxCycle();
			}
		} catch(\Exception $e) {
			dd($e);
		}

		return view('dictatedCourses.index', $data);
	}

	public function edit(Request $request) {

		$data['title'] = 'Seleccionar Cursos a Dictarse en el Ciclo';

		try {
			$data['courses'] = $this->dictatedCoursesService->retrieveAllCourses();
			$data['dictatedCourses'] = $this->dictatedCoursesService->retrieveAllCoursesxCycle();
		} catch (\Exception $e) {
			dd($e);
		}
		return view('dictatedCourses.edit', $data);

	}

	public function update(Request $request) {
		try {
			$code = $this->dictatedCoursesService->update($request->all());
		} catch(\Exception $e) {
			dd($e);
		}
		if($code){
			return redirect()->route('index.dictatedCourses')->with('success', 'Cursos Dictados en el Ciclo actualizados');
		} else{
			return redirect()->route('index.dictatedCourses')->with('success', 'Todos los Cursos Dictados no deben estar actualizados');
		}

	}

	public function view(Request $request) {

		try {
			$data['studentsResults'] = $this->studentsResultService->findByFacultyPeriod();
			$data['course'] = $this->dictatedCoursesService->findCourse($request->all());
			$data['timetable'] = $this->dictatedCoursesService->retrieveAllTimeTables($request->all());
			$data['timetablexteacher'] = $this->dictatedCoursesService->retrieveAllTeachers($request->all());

			//dd($data);
		} catch (\Exception $e) {
			dd($e);
		}
		return view('dictatedCourses.view', $data);

	}

	public function timetable(Request $request) {
		try {
			$data['coursexcicle'] = $this->dictatedCoursesService->findCoursexCicle($request->all());
			$data['coursexteachers'] = $this->dictatedCoursesService->findTeachers($request->all());
		} catch (\Exception $e) {
			dd($e);
		}

		//dd($data);
		return view('dictatedCourses.timetable', $data);

	}

	public function register(Request $request) {
		try {
			$this->dictatedCoursesService->register($request->all());
			$data['coursexcicle'] = $this->dictatedCoursesService->findCoursexCicle($request->all());
		} catch (\Exception $e) {
			dd($e);
		}
		return redirect()->route('view.dictatedCourses', ['courseId' => $request['courseId']])->with('success', 'Se registró el horario con éxito');

	}

	public function delete(Request $request) {
		try{
			$this->dictatedCoursesService->delete($request);
		} catch (\Exception $e) {
			dd($e);
		}
		return redirect()->route('view.dictatedCourses', ['courseId' => $request['courseId']])->with('success', 'Se eliminó el horario con éxito');
	}

	public function editTimeTable(Request $request) {

		try {
			$data['timetable'] = $this->dictatedCoursesService->findTimeTable($request->all());
			$data['timetablexteacher'] = $this->dictatedCoursesService->findTeachersxTimeTable($request->all());
			$data['courseId'] = $request['courseId'];
			$data['coursexcicle'] = $this->dictatedCoursesService->findCoursexCicle($request->all());
			$data['coursexteachers'] = $this->dictatedCoursesService->findTeachers($request->all());
		} catch (\Exception $e) {
			dd($e);
		}
		return view('dictatedCourses.timetableEdit', $data);

	}

	public function updateTimeTable(Request $request) {
		try {
			$this->dictatedCoursesService->updateTimeTable($request->all());
			$data['coursexcicle'] = $this->dictatedCoursesService->findCoursexCicle($request->all());
		} catch (\Exception $e) {
			dd($e);
		}
		return redirect()->route('view.dictatedCourses', ['courseId' => $request['courseId']])->with('success', 'Se actualizó el horario con éxito');

	}

	public function getCodigo($codeT) {
		try{
			$data['timetable'] = $this->dictatedCoursesService->getCodigo($codeT);
		} catch(\Exception $e) {
			dd($e);
		}
		return json_encode($data);
	}

}