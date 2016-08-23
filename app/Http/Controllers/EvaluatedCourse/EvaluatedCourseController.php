<?php namespace Intranet\Http\Controllers\EvaluatedCourse;

use View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Intranet\Http\Services\Cicle\CicleService;
use Intranet\Http\Services\Course\CourseService;
use Intranet\Http\Services\EvaluatedCourse\EvaluatedCourseService;
use Intranet\Http\Services\StudentsResult\StudentsResultService;


class EvaluatedCourseController extends BaseController {

	protected $evaluatedCourseService;
	protected $cicleService;
	protected $courseService;
	protected $studentsResultService;

	public function __construct() {
		$this->evaluatedCourseService = new EvaluatedCourseService();
		$this->cicleService = new CicleService();
		$this->courseService = new CourseService();
		$this->studentsResultService = new StudentsResultService();
	}

	public function index() {
		$data['title'] = "Cursos Evaluados en el ciclo";
		try {
			$data['pickedcourses'] = $this->courseService->retrieveAll();
			$data['notPickedcourses'] = $this->courseService->retrieveAll();
			//$cicle['cicle'] = $this->cicleService->findActualCicle();
			//$data['pickedcourses'] = $this->EvaluatedCourseService->getEvaluatedCoursesByAcademicCicleId($cicle);
			//$data['notPickedcourses'] = $this->EvaluatedCourseService->getNotEvaluatedCoursesByAcademicCicleId($cicle);
		} catch(\Exception $e) {
			dd($e);
		}
		return view('courses.pick', $data);
	}

	public function edit(Request $request) {

		$data['title'] = 'Editar Curso Evaluado';

		try {
			$data['studentsResults'] = $this->studentsResultService->findByFacultyPeriod();
			$data['course'] = $this->courseService->findCourse($request->all());
		} catch (\Exception $e) {
			dd($e);
		}
		return view('courses.editEvaluatedCourse', $data);

	}
}