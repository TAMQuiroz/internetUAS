<?php namespace Intranet\Http\Services\EvaluatedCourse;

use Intranet\Models\EvalutedCourse;
use Intranet\Models\StudentsResult;
use DB;

class EvaluatedCourseService {


public function getEvaluatedCoursesByAcademicCicleId(/*$academicCicleCode*/) {
		$evaluatedCourses = EvaluatedCourse::get();
		//$evaluatedCourses = EvaluatedCourse::where('IdCicloAcademico', $academicCicleCode)->where('deleted_at', null)->get();
		
		$data['info'] = $evaluatedCourses;
		return $data;
}

public function getNotEvaluatedCoursesByAcademicCicleId(/*$academicCicleCode*/) {
		$notEvaluatedCourses = EvaluatedCourse::get();
		//$notEvaluatedCourses = EvaluatedCourse::where('IdCicloAcademico', $academicCicleCode)->where('deleted_at', null)->get();
		
		$data['info'] = $notEvaluatedCourses;
		return $data;
}

public function deleteEvaluatedCourse($request) {
		$EvaluatedCourse = EvaluatedCourse::where('IdCursoEvaluado', $request['evaluatedCourse_code'])
		->where('deleted_at', null);
		$EvaluatedCourse->delete();
}

public function findEvaluatedCourse($request) {
		$course = EvalutedCourse::where('IdCursoEvaluado', $request['evaluatedCourse-code'])->first();
		return $course;
}
}