<?php namespace Intranet\Http\Services\TimeTable;

use Intranet\Http\Services\Faculty\FacultyService;
use Intranet\Http\Services\Period\PeriodService;
use Intranet\Http\Services\StudentsResult\StudentsResultService;
use Intranet\Models\Report;
use Intranet\Models\Score;
use Intranet\Models\TimeTable;
use Intranet\Models\Student;
use Intranet\Models\TimeTablexTeacher;
use Session;
use DB;

class TimeTableService {

    // obtener todos los resultados estudiantiles
    protected $studentResultsService;
    protected $facultyService;
    protected $periodService;

    public function __construct() {
        $this->studentResultsService = new StudentsResultService();
        //$this->timeTableService = new TimeTableService();
        $this->facultyService = new FacultyService();
        $this->periodService = new PeriodService();
    }

    public function retrieveAll() {
        return TimeTable::get();
    }

    public function findActiveTimeTables() {
        $timeTables = TimeTable::where('deleted_at', null);
        return $timeTables;
    }

    // obtener horarios por usuario
    public function timeTablesByUser() {
        $timeTablexTeachers = TimeTablexTeacher::where('IdDocente',Session::get('user')->IdDocente)
            ->where('deleted_at', null)->get();

        $arrayTeachersTT = array();
        foreach ($timeTablexTeachers as $ttxt){
            array_push($arrayTeachersTT,$ttxt->timetable);
        }
        return $arrayTeachersTT;
    }

    // obtener horarios por usuario
    public function timeTablesByUserCourses($dictatedCourses) {

        $arrayTeachersTT = $this->timeTablesByUser();

        $arrayCurrentTT = array();
        foreach ($dictatedCourses as $dc){
            foreach ($dc->timeTables as $tt){
                array_push($arrayCurrentTT,$tt);
            }
        }

        $arrayTT = array();
        $timeTables = TimeTable::where('deleted_at', null)->get();
        foreach ($timeTables as $tt){
            if(in_array($tt,$arrayCurrentTT) and in_array($tt,$arrayTeachersTT)){
                array_push($arrayTT,$tt);
            }
        }
        return $arrayTT;
    }

    public function retrieveTimeTableByCoursesxCycle($coursexcicle){
        $timetables = TimeTable::whereIn('IdCursoxCiclo', $coursexcicle)->get();        
        return $timetables;
    }


    // obtener la entidad de resultado estudiantil
    public function find($request) {
        $timeTable = TimeTable::where('IdHorario', $request['id'])->first();
        return $timeTable;
    }

    // crear la entidad de resultado estudiantil
    public function create($request) {

        $timeTable = TimeTable::create([
            'IdCursoEvaluado' => $request['courseId'],
            'Codigo' => $request['code'],
            'Promedio' => 0,
            'Porcentaje' => 0,
            'TotalCumplen' => 0,
            'TotalAlumnos' => 0
        ]);

        if ( array_key_exists('teacher', $request) ){
            foreach($request['teacher'] as $idTeacher){
                $timeTablexTeacher = TimeTablexTeacher::create([
                    'IdHorario' => $timeTable->IdHorario,
                    'IdDocente' => $idTeacher
                ]);
            }
        }
    }

    // eliminar la entidad de resultado estudiantil
    public function delete($request) {
        $timeTable = TimeTable::where('IdHorario', $request['id'])
            ->where('deleted_at', null);

        $timeTable->delete();
    }

    // obtenet los alumnos del horario
    public function findStudents($request) {
        $student = Student::where('IdHorario', $request['id'])
            ->where('deleted_at', null)->get();
        return $student;
    }

    // obtenet las calificaciones del horario
    public function findScores($request) {
        $scores = Score::where('IdHorario', $request['id'])
            ->where('deleted_at', null)->get();
        return $scores;
    }

    public function findScoresByStudentResults($request, $studentsResults, $schedule) {
        $allScores = [];//1 x 3 + 1
        foreach ($studentsResults as $studentResult){
            foreach ($studentResult->criterions as $criterion){
                $scores = Score::where('IdHorario', $request['id'])->
                where('IdCriterio', $criterion->IdCriterio)->
                where('IdHorario', $schedule->IdHorario)->
                where('deleted_at', null)->get();
                foreach ($scores as $score) {
                    array_push($allScores, $score);
                }
            }
        }
        //dump($allScores);

        return $allScores;
    }

    // guardar calificacion
    public function saveTable($request) {

        //$idTimeTable = $request['idTimeTable'];

        foreach ($request as $key => $value){
            $posS = strrpos($key, '/');
            $posG = strrpos($key, '-');
            $timeTable = substr($key, 0, $posS);
            $student = substr($key, $posS + 1, $posG);
            $criterion = substr($key, $posG + 1);

            if($value != 0) {
                $score = Score::where('IdCriterio', $criterion)
                    ->where('IdHorario', $timeTable)
                    ->where('IdAlumno', $student)
                    ->where('deleted_at', null)
                    ->update(['Nota' => $value]);

                if($score == null){
                    $score = Score::create([
                        'IdCriterio' => $criterion,
                        'IdHorario' => $timeTable,
                        'IdAlumno' => $student,
                        'Nota' => $value
                    ]);
                }
            }
            else{
                $score = Score::where('IdCriterio', $criterion)
                    ->where('IdHorario', $timeTable)
                    ->where('IdAlumno', $student)
                    ->where('deleted_at', null)->first();

                if($score != null){
                    $score->delete();
                }
            }
        }
    }

    public function finish($request) {
        $timetable = TimeTable::where('IdHorario', $request['id'])->where('deleted_at', null)->first();
        /*
        //TODO AQUI SE DEBE SALVAR HORARIOXCRITERIO
        foreach ($aspect->criterion as $criterion){
            $scores = $this->timeTableService->findScoresByCriterion($criterion->IdCriterio);
            $countPassed = 0;
            $total = 0;
            //luego sacamos los alumnos x criterio
            foreach ($scores as $score){
                //finalmente vemos cuales pasaron y cuales no y calculamos el porcentaje de cada criterio
                if($conf->NivelEsperado <= $score->Nota){
                    $countPassed++;
                }
                $total++;
            }
            $criteria = new EvaluatedPerformanceMatrixLineDetail();
            array_push($criteria->criterions, $criterion);
            if($total>0){array_push($criteria->criterionsRating, $countPassed/ $total);}

            array_push($evaluatedPerformanceMatrixLineDetail, $criteria);

            /*
             SchedulexCriterion
    protected $table = "HorarioxCriterio";
    protected $primaryKey = "IdHorarioxCriterio";
    protected $fillable = ['IdHorario', 'IdCriterio', 'TotalAlumnos', 'TotalCumplen'
        , 'Porcentaje', 'Promedio'];*/
        /*  $acumulatedCriterionGrade += $countPassed/ $total;
          SchedulexCriterion::create(IdHorario => ,
                                     IdCriterio => ,
                                     TotalAlumnos =>,
                                     TotalCumplen =>,
                                     Porcentaje =>,
                                     Promedio =>);

      }


      //TODO AQUI SE DEBE SALVAR HORARIOXASPECTO
      //TODO AQUI SE DEBE SALVAR HORARIOXRESULTADO
      /*
      $studentResults = $this->studentResultsService->findResultEvaluated();
      $conf= $this->facultyService->findConfFaculty(Session::get('faculty-code'), Session::get('period-code'));
      $data['periods'] = $this->periodService->getAll(Session::get('faculty-code'));
      $data['matrixLines'] = [];

      if($studentResults!=null){
          foreach($studentResults as $studentResult){
              $evaluatedPerformanceMatrixLine = new EvaluatedPerformanceMatrixLine();
              $evaluatedPerformanceMatrixLine ->studentResult = $studentResult;

              $acumulatedAspectGrade = 0;
              $aspectIterations = 0;
              //sacamos los aspectos de los resultados estudiantiles
              //TODO AQUI SE DEBE SALVAR HORARIOXCRITERIO

              if($studentResult->aspects !=null){
                  foreach ($studentResult->aspects as $aspect){
                      $acumulatedCriterionGrade = 0;
                      $iterations = 0;
                      $evaluatedPerformanceMatrixLineDetail = []; //For the details of such aspects

                      foreach ($aspect->criterion as $criterion){
                          $scores = $this->timeTableService->findScoresByCriterion($criterion->IdCriterio);
                          $countPassed = 0;
                          $total = 0;
                          //luego sacamos los alumnos x criterio
                          foreach ($scores as $score){
                              //finalmente vemos cuales pasaron y cuales no y calculamos el porcentaje de cada criterio
                              if($conf->NivelEsperado <= $score->Nota){
                                  $countPassed++;
                              }
                              $total++;
                          }
                          $criteria = new EvaluatedPerformanceMatrixLineDetail();
                          array_push($criteria->criterions, $criterion);
                          if($total>0){array_push($criteria->criterionsRating, $countPassed/ $total);}

                          array_push($evaluatedPerformanceMatrixLineDetail, $criteria);

                          if($total>0){$acumulatedCriterionGrade += $countPassed/ $total;}
                          $iterations++;
                      }

                      $acumulatedAspectGrade = $acumulatedCriterionGrade / $iterations;
                      $aspectIterations ++;
                      array_push($evaluatedPerformanceMatrixLine->aspects, $aspect);
                      if($iterations>0){array_push($evaluatedPerformanceMatrixLine->aspectsRating, $acumulatedCriterionGrade / $iterations);}
                      array_push($evaluatedPerformanceMatrixLine->aspectsDetail, $evaluatedPerformanceMatrixLineDetail);

                      //TODO AQUI SE DEBE SALVAR HORARIOXASPECTO
                      SchedulexAspect::create();
                  }
              }
              $evaluatedPerformanceMatrixLine->studentResult =$studentResult;
              if($aspectIterations>0){$evaluatedPerformanceMatrixLine->studentResultRating = $acumulatedAspectGrade /$aspectIterations;}
              //Aplicamos regla de 3 simple para los resultados estudiantiles
              //TODO AQUI SE DEBE SALVAR HORARIOXRESULTADO

              array_push($data['matrixLines'], $evaluatedPerformanceMatrixLine );
          }
      }*/


    }

    // guardar cambios del informe del curso
    public function report($request) {

        $id = $request['idReport'];

        if($id == 0){
            Report::create([
                'IdHorario' => $request['idTimeTable'],
                'Titulo' => $request['title'],
                'Descripcion' => $request['description']
            ]);
        }
        else{
            Report::where('IdInforme', $id)
                ->update([
                    'Titulo' => $request['title'],
                    'Descripcion' => $request['description']
                ]);
        }
    }

    //AJAX Functions

    // obtenet las calificaciones del criterio
    public function findScoresByCriterion($criterion) {
        $scores = Score::where('IdCriterio', $criterion)
            ->where('deleted_at', null)->get();

        return $scores;
    }

    public function findScoresByCriterionAndCycle($criterion, $cycle) {
        $scoresxcycle = [];
        $scores = Score::where('IdCriterio', $criterion)->where('deleted_at', null)->get();

        //Of each score I search the Schedule, Of each schedule I search the CourseXCycle
        foreach ($scores as $score){
            if($score->timeTable->courseXCicle->IdCicloAcademico == $cycle->IdCicloAcademico){
                array_push($scoresxcycle, $score);
            }
        }
        return $scoresxcycle;
    }
}