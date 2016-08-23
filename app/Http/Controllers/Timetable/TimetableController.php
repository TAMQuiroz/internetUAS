<?php namespace Intranet\Http\Controllers\Timetable;

use View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Intranet\Http\Services\Teacher\TeacherService;
use Intranet\Http\Services\TimeTable\TimeTableService;

class TimetableController extends BaseController {

	protected $courseService;
	protected $timeTableService;

	public function __construct() {
		$this->teacherService = new TeacherService();
		$this->timeTableService = new TimeTableService();
	}

	public function index() {
		return view('timetables.index');
	}

	public function create(Request $request) {
		
		$data['title'] =  'Nuevo Horario';
		$data['courseId'] = $request['courseId'];
		$data['courseName'] = $request['courseName'];

		try {
		    $data['teachers'] = $this->teacherService->retrieveAll();
		} catch (\Exception $e) {
			dd($e);
		}
		return view('timetables.form', $data);
	}

	public function save(Request $request) {
		try {
			$this->timeTableService->create($request->all());
		} catch(\Exception $e) {
			dd($e);
		}
		return redirect()->route('index.courses')->with('success', 'El horario ha sido creado exitosamente');;
	}

	public function edit() {
		return view('timetables.edit');
	}
}