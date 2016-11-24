<?php

namespace Intranet\Http\Controllers\API\Faculty;

use JWTAuth;
use Response;
use Intranet\Models\CoursexTeacher;
use Intranet\Models\Course;
use Intranet\Models\Student;
use Intranet\Models\Schedule;
use Intranet\Models\CoursexCycle;
use Intranet\Models\ResultxObjective;
use Intranet\Models\Cicle;
use Intranet\Models\Rubric;
use Intranet\Models\Aspect;
use Intranet\Models\Teacher;
use Intranet\Models\Score;
use Illuminate\Http\Request;
use Intranet\Models\Faculty;
use Dingo\Api\Routing\Helpers;
use Intranet\Models\Suggestion;
use Intranet\Models\StudentsResult;
use Intranet\Models\ImprovementPlan;
use Intranet\Models\EvaluatedCourses;
use Intranet\Models\EducationalObjetive;
use Intranet\Models\CourseEvidence;
use Intranet\Models\AcademicCycle;
use Intranet\Models\FileCertificate;
use Intranet\Http\Services\Course\CourseService;
use Intranet\Http\Services\Period\PeriodService;
use Intranet\Http\Services\Faculty\FacultyService;
use Illuminate\Routing\Controller as BaseController;
use Intranet\Http\Services\TimeTable\TimeTableService;
use Intranet\Models\Wrappers\EvaluatedPerformanceMatrixLine;
use Intranet\Http\Services\StudentsResult\StudentsResultService;
use Intranet\Models\Wrappers\EvaluatedPerformanceMatrixLineDetail;
use Intranet\Models\Evaluation;
use Intranet\Models\Contribution;
class FacultyController extends BaseController
{
    use Helpers;

    public function __construct()
    {
        $this->facultyService= new FacultyService;
        $this->course_service = new CourseService;
        $this->period_service = new PeriodService;
        $this->studentResultsService = new StudentsResultService();
        $this->timeTableService = new TimeTableService();
    }

    private function getUserSpecialtyId($user){
      $idEspecialidad = 0;
      if ($user->IdPerfil == 2 || $user->IdPerfil == 1){
            $user->load('professor');
            $idEspecialidad = $user->professor->IdEspecialidad;    
        }else if ($user->IdPerfil == 4){
            $user->load('accreditor');
            $idEspecialidad = $user->accreditor->IdEspecialidad;    
        }else if ($user->IdPerfil == 5){
            $user->load('investigator');
            $idEspecialidad = $user->investigator->IdEspecialidad;    
        }
        return $idEspecialidad;
    }

    public function get(Request $request)
    {
        $date = date('Y-m-d H:i:s', $request->get('since', 0));
        $user = JWTAuth::parseToken()->authenticate();

        $faculties = collect();

        if ($user->isAdmin()){
          $faculties = Faculty::lastUpdated($date)->get();
        }else{
          $idEspecialidad = $this->getUserSpecialtyId($user);
          $faculties = Faculty::lastUpdated($date)->where('IdEspecialidad', $idEspecialidad)->get();
        }

        $faculties->load('teacher');
        return $this->response->array($faculties->toArray());
    }

    public function getSpecialty(Request $request){
      $user = JWTAuth::parseToken()->authenticate();
      $idEspecialidad = $this->getUserSpecialtyId($user);
      $specialty = Faculty::where('IdEspecialidad',$idEspecialidad)->first();
      $specialty->load('teacher');
      return Response::json($specialty); 
    }

    public function getEducationalObjectives($faculty_id, Request $request)
    {
        $date = date('Y-m-d H:i:s', $request->get('since', 0));
        $objectives = EducationalObjetive::lastUpdated($date)
                                           ->where('idEspecialidad', $faculty_id)
                                           ->get();

        return $this->response->array($objectives->toArray());
    }

    public function getStudentsResult($faculty_id, $eos_id, Request $request)
    {
        $date = date('Y-m-d H:i:s', $request->get('since', 0));

        $results = StudentsResult::lastUpdated($date)
                                   ->where('idEspecialidad', $faculty_id)
                                   ->whereHas('resultxObjective',function($query) use ($eos_id){
                                      $query->where('ResultadoxObjetivo.IdObjetivoEducacional',$eos_id);
                                   })
                                   ->get();
        


        return $this->response->array($results->toArray());
    }

    public function getEvaluatedCourses($faculty_id, Request $request)
    {
        $date = date('Y-m-d H:i:s', $request->get('since', 0));

        $academic_semester = Cicle::where('Vigente', 1)->first();
        $user = JWTAuth::parseToken()->authenticate();
        if($user->IdPerfil == 3){
          $courses = Course::lastUpdated($date)
                             ->where('IdEspecialidad', $faculty_id)
                             ->orderBy('NivelAcademico', 'asc')
                             ->orderBy('IdCurso', 'asc')
                             ->get();
        } else {
          $courses = Course::lastUpdated($date)
                             ->where('IdEspecialidad', $faculty_id)
                             ->orderBy('NivelAcademico', 'asc')
                             ->orderBy('IdCurso', 'asc')
                             ->with('semesters')
                             ->whereHas('semesters', function($query) use ($academic_semester) {
                                $query->where('CursoxCiclo.IdCicloAcademico', $academic_semester->IdCicloAcademico);
                                $query->whereNull('CursoxCiclo.deleted_at');
                             })
                             ->get();
        }
        return $this->response->array($courses->toArray());
      }


    public function getCourseSchedule($course_id,$academic_cycle_id){
        $coursexcycle = CoursexCycle::where('IdCurso',$course_id)->where('IdCicloAcademico',$academic_cycle_id)->first();
        $schedules = Schedule::where('IdCursoxCiclo',$coursexcycle->IdCursoxCiclo)
                             ->with('professors')
                             ->with('courseEvidences')
                             ->get();

        return Response::json($schedules);
    }

    public function getCourseContribution($course_id, $cycle_id){
      $conts = Contribution::where('IdCurso',$course_id)->where('IdCicloAcademico', $cycle_id)->where("deleted_at", null)->with('studentsResult')->get();
      $res = collect();

      foreach($conts as $cont){
        $res->push($cont->studentsResult);

      }
      return $res;
    }


    public function getEvaluatedCoursesBySemester($faculty_id, $semester_id)
    {
      $academic_semester = Cicle::where('IdCicloAcademico',$semester_id)
                                ->where('IdEspecialidad',$faculty_id)
                                ->first();
      $courses = [];
      if ($academic_semester) {
        $coursexteachers = CoursexCycle::where('IdCicloAcademico',$academic_semester->IdCicloAcademico)
                                       ->get();
        
        foreach ($coursexteachers as $key => $value) {
          $course = Course::where('IdCurso',$value->IdCurso)->first();
          $schedules = Schedule::where('IdCursoxCiclo',$value->IdCursoxCiclo)->get();
          $schedules->load('professors');
          $schedules->load('courseEvidences');
          $course['schedule'] = $schedules;
          array_push($courses, $course);
        }
      }
      return $this->response->array($courses);
    }

    public function getAspects($sr_id,Request $request)
    {
        $date = date('Y-m-d H:i:s', $request->get('since', 0));
        $aspects = Aspect::lastUpdated($date)
                           ->where('IdResultadoEstudiantil',$sr_id)
                           ->get();

        return $this->response->array($aspects->toArray());
    }

    public function getTeachers($faculty_id, Request $request)
    {
        $date = date('Y-m-d H:i:s', $request->get('since', 0));
        $teachers = Teacher::lastUpdated($date)->where('IdEspecialidad', $faculty_id)->get();

        return $this->response->array($teachers->toArray());
    }

    public function getSuggestions($faculty_id, Request $request)
    {
        $date = date('Y-m-d H:i:s', $request->get('since', 0));
        $suggestions = Suggestion::lastUpdated($date)
                                 ->with('teacher', 'improvementPlan')
                                 ->where('IdEspecialidad', $faculty_id)
                                 ->get();

        return $this->response->array($suggestions->toArray());
    }

    public function getImprovementsPlans($faculty_id, Request $request)
    {
        $date = date('Y-m-d H:i:s', $request->get('since', 0));
        $improvement_plans = ImprovementPlan::lastUpdated($date)
                                            ->where('IdEspecialidad', $faculty_id)
                                            ->with('typeImprovementPlan', 'teacher' , 'file')
                                            ->get();

        return $this->response->array($improvement_plans->toArray());
    }

    public function getCourseReport($faculty_id, $course_id, $semester_id)
    {
        $data['course'] = $this->course_service->findCourseById($course_id);
        $data['schedules'] = $schedules = $this->course_service
                          ->findSchedules($course_id, $semester_id)
                          ->map(function($schedule){
                                $schedule->numEvaluated = $this->course_service
                                                               ->numEvaluatedBySchedule($schedule->IdHorario);
                            return $schedule;
                          });

        $conf_period = $this->period_service->getBySemester($semester_id);
        $data['studentResults'] = $this->course_service
                                       ->findStudentResultsInputByCourse($course_id, $semester_id)
                                       ->map(function($sr) use($schedules, $conf_period) {
                                            $sr->performanceMatrix = $this->course_service->makePerformanceMatrix($sr->studentsResult->criterions, $schedules, $conf_period->NivelEsperado);
                                            return $sr;
                                       });

        return view('studyPlan.api', $data);
    }

    public function getMeasureReport($faculty_id)
    {
        $cycle = $this->facultyService->findCycle($faculty_id);
        if (is_null($cycle)) return '';

        $studentResults = $this->studentResultsService->findResultEvaluated($cycle);
        $conf = $this->facultyService->findConfFaculty($faculty_id, $cycle->IdPeriodo);
        $data['inYoRush'] = $cyclesInBetween = $this->period_service->findAllCyclesInBetweenPeriod(
        $conf->cycleAcademicStart->Descripcion, $conf->cycleAcademicEnd->Descripcion);

        $data['matrixLines'] = [];

        if($studentResults!=null){
            foreach($studentResults as $studentResult){
                $evaluatedPerformanceMatrixLine = new EvaluatedPerformanceMatrixLine();
                $evaluatedPerformanceMatrixLine ->studentResult = $studentResult;

                $acumulatedAspectGrade = 0;
                $aspectIterations = 0;
                //sacamos los aspectos de los resultados estudiantiles
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
                    }
                }
                $evaluatedPerformanceMatrixLine->studentResult =$studentResult;
                if($aspectIterations>0){$evaluatedPerformanceMatrixLine->studentResultRating = $acumulatedAspectGrade /$aspectIterations;}
                //Aplicamos regla de 3 simple para los resultados estudiantiles
                array_push($data['matrixLines'], $evaluatedPerformanceMatrixLine );
            }
        }

      return view('consolidated.results.api', $data);
    }

    public function getTeacherCourses($teacher_id){
      $user = JWTAuth::parseToken()->authenticate();
      //especialidad
      $idEspecialidad = $this->getUserSpecialtyId($user);
      //ciclo actual de la especialidad
      $cicloxespecialidad = Cicle::where('IdEspecialidad',$idEspecialidad)
                                 ->where('Vigente', 1)->first();
      $courses = [];
      if($cicloxespecialidad){
        //cursos de ese ciclo academico
        $coursexcycle = CoursexCycle::where('IdCicloAcademico',$cicloxespecialidad->IdCicloAcademico)->get();
        //para esos cursos tengo que ver que sean los cursos del profe
        foreach ($coursexcycle as $key => $value) {
          $coursexteacer = CoursexTeacher::where('IdCurso',$value->IdCurso)
                          ->where('IdDocente',$teacher_id)->first();
          if($coursexteacer){
            $course = Course::where('IdCurso',$coursexteacer->IdCurso)->first();
            $schedules = Schedule::where('IdCursoxCiclo',$value->IdCursoxCiclo)->get();
            $course['schedule'] = $schedules;
            array_push($courses, $course);
          }
        }
      }
      return Response::json($courses);
    }

    public function getStudentsbySchedule($schedule_id){
      $students = Student::where('IdHorario',$schedule_id)->get();
      return Response::json($students);
    }

    public function getEffortTable($academic_cycle_id, $course_id, $schedule_id, $student_id){
      //sacamos el cursoxciclo del curso que queremos ver sus resultados
      $coursexteachers = CoursexCycle::where('IdCicloAcademico',$academic_cycle_id)
                                     ->where('IdCurso',$course_id)
                                     ->first();
      //sacamos los horarios del curso en el ciclo                                     
      
      $schedules = Schedule::where('IdCursoxCiclo',$coursexteachers->IdCursoxCiclo)->get();

      $scores = Score::where('IdHorario', $schedule_id)
                     ->where('IdAlumno', $student_id)
                     ->get();
      $scores->load('criterion');
      return Response::json($scores);
    }

}
