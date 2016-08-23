<?php

namespace Intranet\Http\Controllers\StudyPlan;

use View;
use Session;
use Illuminate\Http\Request;
use Intranet\Http\Services\Cicle\CicleService;
use Intranet\Http\Services\Period\PeriodService;
use Intranet\Http\Services\Course\CourseService;
use Illuminate\Routing\Controller as BaseController;

class StudyPlanController extends BaseController
{
    protected $cicle_service;
    protected $course_service;
    protected $period_service;

    public function __construct()
    {
        $this->cicle_service  = new CicleService;
        $this->course_service = new CourseService;
        $this->period_service = new PeriodService;
    }


    public function index()
    {
        $faculty_id = Session::get('faculty-code');
        $semesters = $this->cicle_service->retrieveAll('desc');
        $data = [];

        if(! $semesters->isEmpty() ){
            $data['semester_id'] = $semester_id =  $semesters->first()->IdCicloAcademico;
            $data['semesters'] = $semesters;
            $data['actual_semester'] = $semester_id;
            $data['courses_grouped'] = $this->course_service
                                            ->findCoursesBySemester($faculty_id, $semester_id, 'desc')
                                            ->groupBy('NivelAcademico');

        }

        return view('studyPlan.index', $data);
    }

    public function getCourses($semester_id)
    {
        $faculty_id = Session::get('faculty-code');
        $data['courses_grouped'] = $this->course_service
                                        ->findCoursesBySemester($faculty_id, $semester_id, 'desc')
                                        ->groupBy('NivelAcademico');
        $data['semester_id'] = $semester_id;
        return response()->view('studyPlan.courses', $data);
    }

    public function create()
    {
        $data['title'] = 'Nuevo Plan de Estudios';

        return view('studyPlan.form', $data);
    }

    public function view($course_id, $semester_id)
    {
        $data['course'] = $this->course_service->findCourseById($course_id);
        $data['schedules'] = $schedules = $this->course_service
                                  ->findSchedules($course_id, $semester_id)
                                  ->map(function($schedule){
                                    $schedule->numEvaluated = $this->course_service->numEvaluatedBySchedule($schedule->IdHorario);
                                    return $schedule;
                                  });
        $conf_period = $this->period_service->getBySemester($semester_id);
        $data['studentResults'] = $this->course_service
                                       ->findStudentResultsInputByCourse($course_id, $semester_id)
                                       ->map(function($sr) use($schedules, $conf_period) {
                                            $sr->performanceMatrix = $this->course_service->makePerformanceMatrix($sr->studentsResult->criterions, $schedules, $conf_period->NivelEsperado);
                                            return $sr;
                                       });

        return view('studyPlan.view', $data);
    }

}