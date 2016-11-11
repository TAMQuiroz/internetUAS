<?php namespace Intranet\Http\Services\DictatedCourses;

use Intranet\Models\Teacher;
use Intranet\Models\Faculty;
use Intranet\Models\Course;
use Intranet\Models\Cicle;
use Intranet\Models\DictatedCourses;
use Intranet\Models\CoursexTeacher;
use Intranet\Models\TimeTable;
use Intranet\Models\TimeTablexTeacher;
use Intranet\Models\Contribution;
use Intranet\Models\CyclexResult;
use Intranet\Models\CoursexCycle;
use DB;
use Session;

class DictatedCoursesService {
	
	public function retrieveAll() {
		return DictatedCourses::get();
	}

	public function retrieveAllCoursesxCycle() {
		$coursesxcicle = DictatedCourses::where('IdCicloAcademico', Session::get('academic-cycle')->IdCicloAcademico)->get();
		return $coursesxcicle;
	}

	public function getCoursesxCycleByCycle($idAcademicCycle) {
		$coursesxcicle = DictatedCourses::where('IdCicloAcademico', $idAcademicCycle)->get();
		return $coursesxcicle;
	}

	public function getCoursesxCycleByCycleByFaculty($idAcademicCycle, $idEspecialidad) {	
		$courses = Course::where('IdEspecialidad',$idEspecialidad)->get()->pluck('IdCurso')->toArray();
		$coursesxcycle = DictatedCourses::whereIn('IdCurso', $courses)->get();
		$cxc = [];
		foreach ($coursesxcycle as $cxcycle) {
			if($cxcycle->IdCicloAcademico == $idAcademicCycle){
				array_push($cxc, $cxcycle);
			}
		}
		
		return $cxc;
	}

	public function retrieveAllCourses(){
		return Course::where('IdEspecialidad', Session::get('faculty-code'))->orderby('NivelAcademico','DESC')->get();
	}

	public function findCourse($request) {
		$course = Course::where('IdCurso', $request['courseId'])->first();
		return $course;
	}

	public function findTeachers($request) {
		$teachers = CoursexTeacher::where('IdCurso', $request['courseId'])->get();
		return $teachers;
	}

	public function findTimeTable($request) {
		$timetable = TimeTable::where('Idhorario', $request['timetableId'])->first();
		return $timetable;
	}

	public function retrieveAllTimeTables($request) {
		$coursesxcicle = DictatedCourses::where('IdCurso', $request['courseId'])
										->where('IdCicloAcademico', Session::get('academic-cycle')->IdCicloAcademico)->first();

		$timetable = TimeTable:: where('IdCursoxCiclo', $coursesxcicle->IdCursoxCiclo)->get();

		return $timetable;
	}

	public function findTeachersxTimeTable($request) {
		$teacherxtimetable = TimeTablexTeacher::where('IdHorario', $request['timetableId'])->get();
		return $teacherxtimetable;
	}

	public function retrieveAllTeachers($request) {
		$coursesxcicle = DictatedCourses::where('IdCurso', $request['courseId'])
										->where('IdCicloAcademico', Session::get('academic-cycle')->IdCicloAcademico)->first();

		$timetable = TimeTable:: where('IdCursoxCiclo', $coursesxcicle->IdCursoxCiclo)->get();


		$coleccion = array();
		foreach ($timetable as $time) {

			$timetablexteacher = TimeTablexTeacher:: where('IdHorario', $time->IdHorario)->get();
			array_push($coleccion, $timetablexteacher);

		}

		return $coleccion;
	}

	public function retrieveCoursesxCycleByCourse($courses){
    	$coursesxcicle = DictatedCourses::whereIn('IdCurso', $courses)->get();
		return $coursesxcicle;    	 
    }

	public function findCoursexCicle($request) {
		$coursesxcicle = DictatedCourses::where('IdCurso', $request['courseId'])
										->where('IdCicloAcademico', Session::get('academic-cycle')->IdCicloAcademico)->first();
		return $coursesxcicle;
	}

	
	public function update($request) {

		if(count($_REQUEST['check']) != 1){

			$cursos = DictatedCourses::where('IdCicloAcademico', Session::get('academic-cycle')->IdCicloAcademico)->get();

			for($j=0; $j<count($cursos); $j++){
					$presente = false;
					for($z=1; $z<count($_REQUEST['check']);$z++){
						if($cursos[$j]->IdCurso == $_REQUEST['check'][$z]){
							$presente = true;
						}
					}
					if($presente == false){
						$cdic = DictatedCourses::where('IdCurso', $cursos[$j]->IdCurso)
											 ->where('IdCicloAcademico', Session::get('academic-cycle')->IdCicloAcademico)
											 ->first();
        				$cdic->delete();
					}
					
			}

			for ($i=1; $i<count($_REQUEST['check']); $i++)
			{	

				$cursoCiclo = DictatedCourses::where('IdCurso',$_REQUEST['check'][$i])
											 ->where('IdCicloAcademico', Session::get('academic-cycle')->IdCicloAcademico)->first();
				
				if($cursoCiclo == null){

					$DictatedCourses =  DictatedCourses::create([
						'IdCurso' => $_REQUEST['check'][$i],
						'IdCicloAcademico' => Session::get('academic-cycle')->IdCicloAcademico
					]);
				}
				
			}
			return 1;
		}else{

			$cdic = DictatedCourses::where('IdCicloAcademico', Session::get('academic-cycle')->IdCicloAcademico)->get();
			foreach ($cdic as $borrar) {
				$borrar->delete();
			}	
        	return 0;
		}
		
	}

	public function register($request) {

		$TimeTable = TimeTable::create([
			'IdCursoxCiclo' => $request['idT'],
			'Codigo' => $request['codeT'],
			//'TotalAlumnos' => $request['totalA']
		]);

		for ($i=0; $i<count($_REQUEST['teacher']); $i++)
		{
			$timetableteacher = TimeTablexTeacher::where('IdHorario', $TimeTable->IdHorario)
												 ->where('IdDocente', $_REQUEST['teacher'][$i])
												 ->get();
			
			if(count($timetableteacher) == 0){
				$TimeTablexTeacher = TimeTablexTeacher::create([
					'IdHorario' => $TimeTable->IdHorario,
					'IdDocente' =>$_REQUEST['teacher'][$i],
				]);
			}	
		}

		//Colocando Evaluado si es que contribuye según Matriz de Aporte

		$aporte = Contribution::where('IdCurso', $request['courseId'])->get();

		if(count($aporte)!= 0 || $aporte != null){
			$variable = false;
			for($i=0; $i<count($aporte); $i++){
				$resultadoxciclo = CyclexResult::where('IdCicloAcademico', Session::get('academic-cycle')->IdCicloAcademico)
											   ->where('IdResultadoEstudiantil', $aporte[$i]->IdResultadoEstudiantil)
											   ->first();
				if($resultadoxciclo != null){
					$variable = true;
					break;
				}
			}
			if($variable){

				$cxc = CoursexCycle::where('IdCursoxCiclo',  $request['idT'])
								   ->where('IdCurso', $request['courseId'])
				->update(array(	'Evaluado' => 1));

			}

		}

	}

	public function delete($request) {
		$timetablexteacher = TimeTablexTeacher::where('IdHorario', $request['timetableId'])->get();

		foreach($timetablexteacher as $txt){
			$txt->delete();
		}

		$timetable = TimeTable::where('IdHorario', $request['timetableId'])->first();
		$timetable->delete();

	}

	public function updateTimeTable($request) {

		//$TimeTable = TimeTable::where('IdHorario', $request['idT'])->update(array(	'TotalAlumnos' => $request['totalA']));

		$timetablexteacher = TimeTablexTeacher::where('IdHorario', $request['idT'])->get();

		for($j=0; $j<count($timetablexteacher); $j++){
					$presente = false;
					for($z=0; $z<count($_REQUEST['teacher']);$z++){
						if($timetablexteacher[$j]->IdDocente == $_REQUEST['teacher'][$z]){
							$presente = true;
						}
					}
					if($presente== false){
						$txt = TimeTablexTeacher::where('IdHorarioxDocente', $timetablexteacher[$j]->IdHorarioxDocente)->first();
        				$txt->delete();
					}
					
		}


		for ($i=0; $i<count($_REQUEST['teacher']); $i++)
		{
			$timetableteacher = TimeTablexTeacher::where('IdHorario', $request['idT'])
												 ->where('IdDocente', $_REQUEST['teacher'][$i])
												 ->get();
			
			if(count($timetableteacher) == 0){
				$TimeTablexTeacher = TimeTablexTeacher::create([
					'IdHorario' => $request['idT'],
					'IdDocente' =>$_REQUEST['teacher'][$i],
				]);
			}	
		}


	}

	public function getCodigo($codeT) {

		$timetable = TimeTable::where('Codigo', $codeT)->get();
		$retVal = true;

		for($i=0; $i<count($timetable);$i++){
			$coursexcycle = DictatedCourses::where('IdCursoxCiclo', $timetable[$i]->IdCursoxCiclo)->first();
			if(Session::get('academic-cycle')->IdCicloAcademico==$coursexcycle->IdCicloAcademico){
				//$variable = $timetable[$i];
				$retVal = false;
				break;
			}

		}
		$data['timetable'] = $retVal;
		//$data['info'] = $variable;
		return $data;
	}	

	public function setCoursesEvaluated(){

        $courses = Course::where('IdEspecialidad', Session::get('faculty-code'))
            ->where('deleted_at', null)->get();

        foreach ($courses as $crs) {
            foreach ($crs->contributions as $cntr) {
            	foreach ($cntr->studentsResult->cyclexResult as $cxr) {

            		if(Session::get('academic-cycle') != null and $cxr->IdCicloAcademico == Session::get('academic-cycle')->IdCicloAcademico and $cntr->Valor > 0){
	                	//dd($cyclexResult);
	                    DictatedCourses::where([
	                        'IdCurso' => $crs->IdCurso,
	                        'IdCicloAcademico' => Session::get('academic-cycle')->IdCicloAcademico
	                    ])
	                    ->update([
							'Evaluado' => '1'
						]);	
            		}
            	}                
            }
        }

    }

    /* Flujo coordinador*/

    public function findNewCoursexCicle($idCourse, $idAcademicCycle) {
		$coursesxcicle = DictatedCourses::where('IdCurso', $idCourse)
										->where('IdCicloAcademico', $idAcademicCycle)->first();
		return $coursesxcicle;
	}

	public function findTeachersByCourses($idCourse) {
		$teachers = CoursexTeacher::where('IdCurso', $idCourse)->get();
		return $teachers;
	}

	public function updateByNewCycle($request, $idAcademicCycle) {

		if(count($_REQUEST['check']) != 1){

			$cursos = DictatedCourses::where('IdCicloAcademico', $idAcademicCycle)->get();

			for($j=0; $j<count($cursos); $j++){
					$presente = false;
					for($z=1; $z<count($_REQUEST['check']);$z++){
						if($cursos[$j]->IdCurso == $_REQUEST['check'][$z]){
							$presente = true;
						}
					}
					if($presente == false){
						$cdic = DictatedCourses::where('IdCurso', $cursos[$j]->IdCurso)
											 ->where('IdCicloAcademico', $idAcademicCycle)
											 ->first();
        				$cdic->delete();
					}
					
			}

			for ($i=1; $i<count($_REQUEST['check']); $i++)
			{	

				$cursoCiclo = DictatedCourses::where('IdCurso',$_REQUEST['check'][$i])
											 ->where('IdCicloAcademico', $idAcademicCycle)->first();
				
				if($cursoCiclo == null){

					$DictatedCourses =  DictatedCourses::create([
						'IdCurso' => $_REQUEST['check'][$i],
						'IdCicloAcademico' => $idAcademicCycle
					]);
				}
				
			}
			return 1;
		}else{

			$cdic = DictatedCourses::where('IdCicloAcademico', $idAcademicCycle)->get();
			foreach ($cdic as $borrar) {
				$borrar->delete();
			}	
        	return 0;
		}
		
	}

	public function findCourseById($idCourse) {
		$course = Course::where('IdCurso', $idCourse)->first();
		return $course;
	}

	public function retrieveTimeTablesByCourse($idCourse, $idAcademicCycle) {
		$coursesxcicle = DictatedCourses::where('IdCurso', $idCourse)
										->where('IdCicloAcademico', $idAcademicCycle)->first();

		$timetable = TimeTable:: where('IdCursoxCiclo', $coursesxcicle->IdCursoxCiclo)->get();

		return $timetable;
	}

	public function retrieveAllTeachersByCourse($idCourse, $idAcademicCycle) {
		$coursesxcicle = DictatedCourses::where('IdCurso', $idCourse)
										->where('IdCicloAcademico', $idAcademicCycle)->first();
		$timetable = TimeTable:: where('IdCursoxCiclo', $coursesxcicle->IdCursoxCiclo)->get();
		$horarioxProfe = array();
		foreach ($timetable as $time) {
			$timetablexteacher = TimeTablexTeacher:: where('IdHorario', $time->IdHorario)->get();
			array_push($horarioxProfe, $timetablexteacher);
		}

		return $horarioxProfe;
	}

	public function findTimeTableById($idHorario) {
		$timetable = TimeTable::where('Idhorario', $idHorario)->first();
		return $timetable;
	}

	public function findTeachersxTimeTableByTimeTable($idHorario) {
		$teacherxtimetable = TimeTablexTeacher::where('IdHorario', $idHorario)->get();
		return $teacherxtimetable;
	}

	public function findCoursexCicleByCourse($idCourse, $idAcademicCycle) {
		$coursesxcicle = DictatedCourses::where('IdCurso', $idCourse)
										->where('IdCicloAcademico', $idAcademicCycle)->first();
		return $coursesxcicle;
	}

	public function deleteById($idHorario) {
		$timetablexteacher = TimeTablexTeacher::where('IdHorario', $idHorario)->get();

		foreach($timetablexteacher as $txt){
			$txt->delete();
		}

		$timetable = TimeTable::where('IdHorario', $idHorario)->first();
		$timetable->delete();

	}

}