<?php namespace Intranet\Http\Services\Course;

use DB;
use Session;
use Intranet\Models\Cicle;
use Intranet\Models\CoursexCycle;
use Intranet\Models\Score;
use Intranet\Models\Course;
use Intranet\Models\Schedule;
use Intranet\Models\Contribution;
use Intranet\Models\StudentsResult;
use Intranet\Models\CoursexTeacher;
use Intranet\Models\DictatedCourses;

class CourseService
{
    public function retrieveAll()
    {
        return Course::get();
    }

    public function retrieveByFacultyandCicle($faculty_id)
    {
        $courses = [];
        if(Session::get('academic-cycle') != null){
            $IdCicloAcademico=Session::get('academic-cycle')->IdCicloAcademico;
            if($IdCicloAcademico){
                $coursesxCycles = CoursexCycle::where('IdCicloAcademico', $IdCicloAcademico)
                    ->where('deleted_at', null)->get();
                
                if($coursesxCycles){
                    foreach ($coursesxCycles as $coursesxCycle){
                        if($coursesxCycle->course!=null){
                            if($coursesxCycle->course->IdEspecialidad == $faculty_id &&
                                    $coursesxCycle->course->deleted_at == null){
                                array_push($courses, $coursesxCycle->course);
                            }
                        }
                    }
                    return $courses;
                }else{
                    return $courses;
                }
            }else{
                return $courses;
            }
        }else{
            return $courses;
        }

    }

    public function retrieveByFaculty($faculty_id)
    {
        return Course::where('IdEspecialidad', $faculty_id)->get();
    }

    public function findCourse($request)
    {
        $course = Course::where('IdCurso', $request['courseCode'])->with('regularProfessors.faculty')->first();
        return $course;
    }

    public function findCourseById($course_id)
    {
        $course = Course::where('IdCurso', $course_id)->first();
        return $course;
    }

    public function findCourseByIdRegular($course_id)
    {
        $course = Course::where('IdCurso', $course_id)->with('regularProfessors.faculty')->first();
        return $course;
    }
    public function findCoursesByTeacher($teacher_id)
    {
        $coursesxTeacher = CoursexTeacher::where('IdDocente', $teacher_id)->get();

        $dictatedCourses = [];
        foreach($coursesxTeacher as $coursexT){
            $course = Course::where('IdCurso', $coursexT->IdCurso)->
            where("deleted_at", null)->first();

            if(!empty($course)){
                array_push($dictatedCourses, $course);
            }
        }
        return $dictatedCourses;
    }

    public function findCoursesBySemester($faculty_id, $semester_id, $order)
    {
        return Course::where('IdEspecialidad', $faculty_id)
                    ->orderBy('NivelAcademico', $order)
                    ->with('semesters')
                    ->whereHas('semesters', function($query) use($semester_id) {
                        $query->where('CursoxCiclo.IdCicloAcademico', $semester_id);
                    })->get();
    }

    public function createCourse($request, $currentStudentsResults) {

        if(Session::get('user')->IdEspecialidad == 0){
            $especialidad = Session::get('faculty-code');
        }else{
            $especialidad = Session::get('user')->IdEspecialidad;
        }

        if(isset($request['checkboxelective'])){
            $courseacademiclevel = -1;
        }else{
            $courseacademiclevel = $request['courseacademicLevel'];
        }

        $course = Course::create([
            'Nombre' => $request['coursename'],
            'Codigo' => $request['coursecode'],
            'NivelAcademico' => $courseacademiclevel,
            'IdEspecialidad' => $especialidad,
            'Especialidad_p'=> $_POST['facultycode']
        ]);

        $regular_professors = isset($request['regular_professors'])?$request['regular_professors']:[];
        $course->regularProfessors()->sync($regular_professors);
        
    }

    public function updateCourse($request, $currentStudentsResults) {

        if(isset($request['checkboxelective'])){
            $courseacademiclevel = -1;
        }else{
            $courseacademiclevel = $request['course-academicLevel'];
        }
        Course::where('IdCurso', $request['course-id'])
            ->update(['Nombre'=> $request['course-name'], 'NivelAcademico' => $courseacademiclevel]);
        $course = Course::where('IdCurso', $request['course-id'])->first();
        $regular_professors = isset($request['regular_professors'])?$request['regular_professors']:[];
        $course->regularProfessors()->sync($regular_professors);
        if ( array_key_exists('objsCheck', $request) ){
            foreach ($currentStudentsResults as $currentStudentResult){
                $alreadyCreated = false;
                foreach($request['objsCheck'] as $idObj){
                    if($currentStudentResult->IdResultadoEstudiantil == $idObj){
                        Contribution::where([
                            'IdCurso' => $course->IdCurso,
                            'IdCicloAcademico' => Session::get('academic-cycle')->IdCicloAcademico,
                            'IdResultadoEstudiantil' => $idObj,
                        ])->update(['Valor'=> 1]);
                        $alreadyCreated = true;
                        break;
                    }
                }

                if(!$alreadyCreated){
                    Contribution::where([
                        'IdCurso' => $course->IdCurso,
                        'IdCicloAcademico' => Session::get('academic-cycle')->IdCicloAcademico,
                        'IdResultadoEstudiantil' => $currentStudentResult->IdResultadoEstudiantil,
                    ])->update(['Valor'=> 0]);
                }
            }
        }
    }

    public function deleteCourse($request) {
        $course = Course::where('IdCurso', $request['course-id'])->first();
        $course->delete();

        $coursexcycle = DictatedCourses::where('IdCurso', $request['course-id'])->get();

        foreach ($coursexcycle as $cxc) {
            $cxc->delete();
        }

        $contribution = Contribution::where('IdCurso', $request['course-id'])->get();

        foreach ($contribution as $c) {
            $c->delete();
        }

    }

    public function findCoursesWithStudentsResults(){
        $returnedCourses = [];
        $courses = Course::where('deleted_at', null)->get();
        foreach ($courses as $course) {
            $contributions = Contribution::where("IdCurso", $course->IdCurso)->where("deleted_at", null)
                ->where("IdCicloAcademico", Session::get('academic-cycle')->IdCicloAcademico)->first();

            if(!empty($contributions)){
                array_push($returnedCourses, $course);
            }
        }
        return $returnedCourses;
    }

    public function updateContributions($request){

        $studentResults = StudentsResult::where('IdEspecialidad', Session::get('faculty-code'))
            ->where('deleted_at', null)->get();

        foreach ($studentResults as $sr){
            foreach ($sr->contributions as $cnt){
                $cnt->delete();
            }
        }

        if ( array_key_exists('selectorContVal', $request) ){

            foreach($request['selectorContVal'] as $item){
                $pos = strrpos($item, '-');
                $idRes = substr($item, 0, $pos);
                $idCurs = substr($item, $pos + 1);

                Contribution::create([
                    'IdCurso' => $idCurs,
                    'IdResultadoEstudiantil' => $idRes,
                    'Valor' => 1
                ]);

                /*
                $contribution = Contribution::where("IdCurso", $idCurs)
                    ->where("IdResultadoEstudiantil", $idRes)
                    ->where("deleted_at", null)->first();

                if($contribution == null){
                    Contribution::create([
                        'IdCurso' => $idCurs,
                        'IdResultadoEstudiantil' => $idRes,
                        'Valor' => 1
                    ]);
                }
                else{
                    $contribution->update(['Valor'=> 1]);
                }
                */

                /*
                $tok = strtok($idObj, ",");
                $idRes =$tok;
                $tok = strtok(",");
                $idCurs =$tok;
                $tok = strtok(",");
                $val =$tok;
                Contribution::where([
                    'IdCurso' => $idCurs,
                    'IdCicloAcademico' => Session::get('academic-cycle')->IdCicloAcademico,
                    'IdResultadoEstudiantil' => $idRes
                ])->first()->update(['Valor'=> $val]);
                */
            }
        }
    }

    public function getCode($code) {
        $course = Course::where('Codigo', $code)->first();
        $retVal = (is_null($course)) ? True : False ;
        $data['course'] = $retVal;
        return $data;
    }

    public function findStudentsResultsByCourse($courseId, $studentsResults){

        $contributions = Contribution::where('IdCurso',$courseId)
            ->where('deleted_at',null)->get();

        $ar= array();
        foreach ($studentsResults as $stdRst) {
            foreach ($contributions as $cntr) {
                if($cntr->IdResultadoEstudiantil == $stdRst->IdResultadoEstudiantil and $cntr->Valor >0){
                    array_push($ar, $stdRst);
                }
            }
        }

        return $ar;
    }

    public function findSchedules($course_id, $semester_id)
    {
        return Schedule::whereHas('coursexcycle', function($q) use($course_id, $semester_id) {
            $q->where('IdCurso', $course_id);
            $q->where('IdCicloAcademico', $semester_id);
        })->with('professors', 'courseEvidences')->get();
    }

    public function numEvaluatedBySchedule($schedule_id)
    {
        return Score::where('IdHorario', $schedule_id)->groupBy('IdAlumno')->get()->count();
    }

    public function findScores($schedule_id)
    {
        return Score::where('IdHorario', $schedule_id)->get();
    }

    public function findStudentResultsInputByCourse($course_id, $semester_id)
    {
        $period_id = Cicle::where('IdCicloAcademico', $semester_id)->first()->IdPeriodo;

        $sr = Contribution::where('IdCurso', $course_id)->with('studentsResult.criterions.aspect')->get();

        return $sr;
    }

    public function makePerformanceMatrix($criterions, $schedules, $criteria_level)
    {
        $perf_matrix = [];

        //Big Guanira movement
        foreach ($schedules as $s) {
            $scores = $this->findScores($s->IdHorario);
            $cant_criterions = $total_by_schedule = 0;
            foreach($criterions as $c) {
                $cant_criterions ++;
                //filter and count just the scores who are over the criteria level, elegant as fuck
                $cant_students =  $scores->filter(function ($v, $k) use($c, $criteria_level) {
                    return $v->IdCriterio == $c->IdCriterio && $v->Nota >= $criteria_level;
                })->count();
                $perf_matrix[$s->IdHorario][$c->IdCriterio] = ($s->TotalAlumnos == 0)?0:(100*$cant_students/$s->TotalAlumnos);

                $total_by_schedule += ($s->TotalAlumnos == 0)?0:(100*$cant_students/$s->TotalAlumnos);
            }
            $perf_matrix[$s->IdHorario]['total'] = ($cant_criterions==0)?0:($total_by_schedule/$cant_criterions);
        }

        $total = 0;
        foreach($criterions as $c) {
            $total_by_criterion = $cant_schedules = 0;
            foreach($schedules as $s) {
                $cant_schedules++;
                $total_by_criterion += $perf_matrix[$s->IdHorario][$c->IdCriterio];
            }
            $perf_matrix['total'][$c->IdCriterio] = ($cant_schedules == 0)?0:($total_by_criterion/$cant_schedules);
            $total += ($cant_schedules == 0)?0:($total_by_criterion/$cant_schedules);
        }

        $perf_matrix['total']['total'] = ($criterions->count() == 0)?0:($total/$criterions->count());

        return $perf_matrix;
    }

}