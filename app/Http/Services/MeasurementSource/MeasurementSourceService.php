<?php namespace Intranet\Http\Services\MeasurementSource;

use Session;
use Intranet\Models\SourcexCoursexCriterionxCycle;
use Intranet\Models\MeasurementSource;
use Intranet\Models\PeriodxMeasurement;
use Intranet\Models\Course;
use Intranet\Models\TimeTable;
use Intranet\Models\CoursexCycle;
use DB;

class MeasurementSourceService {
	

	// obtener todos 
	public function retrieveAll() {
		return MeasurementSource::get();
	}

	// obtener todos de la especialidad
	public function allByFaculty() {
		$sources = MeasurementSource::where('IdEspecialidad', Session::get('faculty-code'))
			->where('deleted_at', null)->get();
		return $sources;
	}

	public function allMeasuringxPeriod() {
		$sources = PeriodxMeasurement::where('IdPeriodo', Session::get('period-code'))->get();
		return $sources;
	}
	
	public function findSxCxCxC($request) {
		/*
		//$horario = TimeTable::where('IdHorario', $request['id'])->first();
		//$curso = CoursexCycle::where('IdCursoxCiclo', $horario->IdCursoxCiclo)->first();
		$sxcxcxc = SourcexCoursexCriterionxCycle::where('IdCurso',$curso->IdCurso)
			->where('IdCriterio', $request['criterion'])
			->where('IdFuenteMedicion', $request['measuring'])
			->where('IdCicloAcademico', Session::get('academic-cycle')->IdCicloAcademico)
			->where('deleted_at', null)->get();
		*/
		$sxcxcxc = SourcexCoursexCriterionxCycle::where('IdFuentexCursoxCriterioxCiclo',$request['measuring'])->where('deleted_at', null)->first();

		return $sxcxcxc;
	}

	public function findMxCByCourse($idCourse) {
		$sources = SourcexCoursexCriterionxCycle::where('IdCurso',$idCourse)
			->where('IdCicloAcademico',Session::get('academic-cycle')->IdCicloAcademico)
			->where('deleted_at', null)->get();
		return $sources;
	}

	public function findMeasuringByCourse($msrxcrt) {
		$sources = MeasurementSource::where('IdEspecialidad', Session::get('faculty-code'))
			->where('deleted_at', null)->get();

		$ar = array();
        foreach ($sources as $src) {
   		    foreach ($msrxcrt as $mxc) {
                if($src->IdFuenteMedicion == $mxc->IdFuenteMedicion){
                    array_push($ar, $src);
                    break;
                }
  	        }
        }
		return $ar;
	}

	public function findMeasuringByCriterion($idCourse, $idCriterion) {
		$sources = SourcexCoursexCriterionxCycle::where('IdCurso',$idCourse)	
			->where('IdCicloAcademico',Session::get('academic-cycle')->IdCicloAcademico)
			->where('IdCriterio',$idCriterion)		
			->where('deleted_at', null)->get();
		return $sources;
	}

	public function saveMesuringByCourse($request) {

		$sources = SourcexCoursexCriterionxCycle::where('IdCurso',$request['courseId'])	
			->where('IdCicloAcademico',Session::get('academic-cycle')->IdCicloAcademico)
			->where('deleted_at', null)->get();

		foreach ($sources as $src) {
			$src->delete();
		}

		if ( array_key_exists('stRstCheck', $request) ){
			foreach($request['stRstCheck'] as $mxc){
				$pos = strrpos($mxc, '-');
				$c = intval(substr($mxc, 0, $pos));
				$m = intval(substr($mxc, $pos + 1));

				$s = SourcexCoursexCriterionxCycle::create([
					'IdCurso' => $request['courseId'],
					'IdCicloAcademico' => Session::get('academic-cycle')->IdCicloAcademico,
					'IdCriterio' => $c,
					'IdFuenteMedicion' => $m
				]);
			}
		}		
	}

	// Para el registrar -------------------------------------------------------------------------

	public function create($request) {

		$source = MeasurementSource::create([
			'IdEspecialidad' => Session::get('faculty-code'),
			'Nombre' =>  $request['source_new_name']
		]);
	}
	
	// Para el guardar cambios -------------------------------------------------------------------------
	
	// actulizar la entidad de resultado estudiantil
	public function update($request) {
		$source = MeasurementSource::where('IdFuenteMedicion', $request['code'])
			->where('deleted_at', null)
			->update([
				'Nombre' => $request['source_edit_name']
			]);	
	}

	// Para eliminar logicamente -------------------------------------------------------------------------	

	// eliminar la entidad de resultado estudiantil
	public function delete($request) {
		$source = MeasurementSource::where('IdFuenteMedicion', $request['id'])
			->where('deleted_at', null)->first();
		$source->delete();
	}

}