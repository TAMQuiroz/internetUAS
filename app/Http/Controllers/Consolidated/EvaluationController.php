<?php namespace Intranet\Http\Controllers\Consolidated;

use Intranet\Http\Services\StudentsResult\StudentsResultService;
use Intranet\Http\Services\TimeTable\TimeTableService;
use View;
use Illuminate\Http\Request;
use Intranet\Http\Services\Consolidated\EvaluationService;
use Illuminate\Routing\Controller as BaseController;
use Session;

use Carbon;
use PDF;
use Barryvdh\Snappy;


class EvaluationController extends BaseController {

    protected $timeTableService;
    protected $studentsResultService;
    protected $evaluationService;

    public function __construct() {
        $this->studentsResultService = new StudentsResultService();
        $this->timeTableService = new TimeTableService();
        $this->evaluationService = new EvaluationService();
    }

    public function index() {
        try {
            $data['academicCycle'] = $this->evaluationService->getAllAcademicCycles2();
            $data['cycle']= null;
            $data['cyclexresult']= null;
            $data['dictatedcourses']= null;
            $data['contribution']= null;
        } catch(\Exception $e) {
            dd($e);
        }

        return view('consolidated.evaluation.index', $data);

    }

    public function view(Request $request) {
        try {
            $data['academicCycle'] = $this->evaluationService->getAllAcademicCycles();
            $data['cycle']= $this->evaluationService->getCycle($request->all());
            $data['cyclexresult']= $this->evaluationService->getResults($request->all());
            $data['dictatedcourses']= $this->evaluationService->getCourses($request->all());
            $data['contribution']= $this->evaluationService->getContribution($request->all());
        } catch(\Exception $e) {
            dd($e);
        }

        return response()->view('consolidated.evaluation.index', $data);
    }

    public function view_matrix_advance() {
        $data = [];
        try{
            //$data['cycles'] = $this->evaluationService->getCycles();
            $data['current'] = $academicCycle = Session::get('academic-cycle');
            //dd($data);
            $data['schedules'] = $schedules = $this->evaluationService->getSchedules(Session::get('faculty-code'), $academicCycle);
            $data['progress'] = [];

            foreach($schedules as $schedule){
                $studentsResults = $this->studentsResultService->findREByCourse($schedule->coursexcycle->IdCurso);
                //$cant = $this->studentsResultService->countCriteria($studentsResults); //number of criterions
                $request['id'] = $schedule->IdHorario;
                $students = $this->timeTableService->findStudents($request);
                //$scores = $this->timeTableService->findScoresByStudentResults($request, $studentsResults, $schedule);
                $scores = $this->timeTableService->findScores($request);
                
                if(count($scores) == 0){
                    $progress  = 0;
                } else {
                    $progress = $this->studentsResultService->getProgress($studentsResults, $scores, count($students));
                }
                array_push($data['progress'], $progress);
            }


        }catch(\Exception $e){
            //dd($e);
            $data['cycles'] = [];
            $data['current'] = [];
            $data['schedules'] = [];
            $data['progress'] = [];
        }
        return view('consolidated.evaluation.status', $data);
    }

    public function search_matrix_advance(Request $request) {
        try {
            $data['cycles'] = $this->evaluationService->getCycles();
            $academicCycle = 0;
            foreach ($data['cycles'] as $cyclear){
                if($cyclear->IdCicloAcademico == $request->all()['academicCycle']){
                    $academicCycle = $cyclear;
                    break;
                }
            }
            $data['current'] = $academicCycle;

            $data['schedules'] = $schedules = $this->evaluationService->getSchedules(Session::get('faculty-code'), $academicCycle);
            $data['progress'] = [];

            foreach($schedules as $schedule){
                $studentsResults = $this->studentsResultService->findREByCourse($schedule->coursexcycle->IdCurso);
                //$cant = $this->studentsResultService->countCriteria($studentsResults); //number of criterions
                $request['id'] = $schedule->IdHorario;
                $students = $this->timeTableService->findStudents($request);
                //$scores = $this->timeTableService->findScoresByStudentResults($request, $studentsResults, $schedule);
                $scores = $this->timeTableService->findScores($request);

                if(count($scores) == 0){
                    $progress  = 0;
                } else {
                    $progress = $this->studentsResultService->getProgress($studentsResults, $scores, count($students));
                }
                array_push($data['progress'], $progress);
            }

        } catch(\Exception $e) {
            //dd($e);
            $data['cycles'] = [];
            $data['current'] = [];
            $data['schedules'] = [];
            $data['progress'] = [];
        }
        return view('consolidated.evaluation.status', $data);
    }

    public function downloadAsPdf(Request $request) {
        try {
            $data['academicCycle'] = $this->evaluationService->getAllAcademicCycle();
            $data['cycle']= $this->evaluationService->getCycle($request->all());
            $data['cyclexresult']= $this->evaluationService->getResults($request->all());
            $data['dictatedcourses']= $this->evaluationService->getCourses($request->all());
            $data['contribution']= $this->evaluationService->getContribution($request->all());
        } catch(\Exception $e) {
            dd($e);
        }

        $mytime = Carbon\Carbon::now()->format('d-m-Y');

        $pdf = PDF::loadView('consolidated.evaluation.indexPdf', $data);

        return $pdf->download('Consolidado de Evaluación '.$mytime.'.pdf');
    }
}