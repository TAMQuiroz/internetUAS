<?php namespace Intranet\Http\Services\EducationalObjetive;

use Session;
use Intranet\Models\EducationalObjetive;
use Intranet\Models\StudentsResult;
use	Intranet\Models\ResultxObjective;
use	Intranet\Models\PeriodxObjective;
use DB;

class EducationalObjetiveService {
	
	public function retrieveAll() {
		return EducationalObjetive::get();
	}

	// obtener todos los objetivos educacionales de la especialidad 
	public function findByFaculty() {

		$educationalObjetives = EducationalObjetive::where('IdEspecialidad', Session::get('faculty-code'))
			->where('deleted_at', null)->get();

		return $educationalObjetives;
	}

	// obtener todos los objetivos educacionales del periodo actual y de la especialidad 
	public function findByFacultyPeriod() {

		if (Session::get('period-code')==null)
			return null;

		$periodxObjectives = PeriodxObjective::where('IdPeriodo', Session::get('period-code'))
			->where('deleted_at', null)->get();

		$educationalObjetives = EducationalObjetive::where('IdEspecialidad', Session::get('faculty-code'))
			->where('deleted_at', null)->get();

		$ar =  array();
		foreach($periodxObjectives as $pxobj){ 
			foreach($educationalObjetives as $obj){
				if($pxobj->IdObjetivoEducacional == $obj->IdObjetivoEducacional){
					array_push($ar, $obj);
				}
			}
		}
		return $ar;
	}

	public function findFacultyEducationalObjetive($request) {	
		$educationalObjetive = EducationalObjetive::where('IdEspecialidad', $request['educationalObjetive_facultyCode'])
		->where('deleted_at', null);
		return $educationalObjetive;
	}

	public function findEducationalObjetive($request) {
		$educationalObjetive = EducationalObjetive::where('IdObjetivoEducacional', $request['educationalObjetive_code'])->first();
		return $educationalObjetive;
	}

	public function findByIdEducationalObjetive($id) {
		$educationalObjetive = EducationalObjetive::where('IdObjetivoEducacional', $id)->first();
		return $educationalObjetive;		
	}

	// obtener la entidad de resultado estudiantil por Id
	public function getResultxObjective($request) {
		$resultxObjective = ResultxObjective::where('IdObjetivoEducacional', $request['educationalObjetive_code'])
			->where('deleted_at', null)->get();
		return $resultxObjective;
	}

	public function create($request) {

		$numberOE = EducationalObjetive::where('IdEspecialidad',Session::get('faculty-code'))
									   ->where('deleted_at',null)->count();
		$numberOE = ($numberOE) + 1;
		$educationalObjetive = EducationalObjetive::create([
			'IdEspecialidad' => Session::get('faculty-code'),
			'Numero' => $numberOE,
			//'Numero' => $request['number'],
			'Descripcion' => $request['description']
		]);

		if ( array_key_exists('stRstCheck', $request) ){
			foreach($request['stRstCheck'] as $idstRst){
				$resultxObjective = ResultxObjective::create([
					'IdObjetivoEducacional' => $educationalObjetive->IdObjetivoEducacional,
					'IdResultadoEstudiantil' => $idstRst
				]);
			}
		}

	}

	public function update($request) {
		$educationalObjetive = EducationalObjetive::where('IdObjetivoEducacional', $request['code'])
			->where('deleted_at', null)
			->update([
				'Descripcion' => $request['description'],
				//'Numero' => $request['number']							
			]);

		$resultxObjective = ResultxObjective::where('IdObjetivoEducacional', $request['code'])
			->where('deleted_at', null)->get();

		foreach($resultxObjective as $rxo){
			$rxo->delete();
		}

		if ( array_key_exists('stRstCheck', $request) ){
			foreach($request['stRstCheck'] as $idRest){
				$resultxObjective = ResultxObjective::create([
					'IdObjetivoEducacional' => $request['code'],
					'IdResultadoEstudiantil' => $idRest
				]);
			}
		}
	}

	public function delete($request) {
		$educationalObjetive = EducationalObjetive::where('IdObjetivoEducacional', $request['id'])
			->where('deleted_at', null)->first();

		foreach($educationalObjetive->resultxObjective as $rxo){
			$rxo->delete();
		}
		
		$educationalObjetive->delete();
	}

	public function studentsResultsByEducationalObjetive($request) {
		$studentResults = StudentsResult::where('IdObjetivoEducacional', $request['educationalObjetive_code'])->where('deleted_at', null)->get();
		return $studentResults;
	}
	//AJAX Functions

	public function getStudentResultsByEducationalObjetiveId($educationalObjetiveCode) {
		$educationalObjetive = EducationalObjetive::where('IdObjetivoEducacional', $educationalObjetiveCode)->where('deleted_at', null)->get();

		$data['info'] = $educationalObjetive;
		$data['studentResults'] = StudentsResult::where('IdObjetivoEducacional', $educationalObjetiveCode)->where('deleted_at', null)->get();
		return $data;

		/*
		$studentResults = studentResult::where('IdObjetivoEducacional', $request['educationalObjetiveCode'])->where('deleted_at', null)->get();
		return $aspects;
		*/
	}

	public function getEducationalObjetiveById($educationalObjetiveCode) {
		$educationalObjetive = EducationalObjetive::where('IdObjetivoEducacional', $educationalObjetiveCode)->first();
		return $educationalObjetive;
	}

	public function getEducationalObjetivesByFaculty($idFaculty) {
		$educationalObjetives = EducationalObjetive::where('IdEspecialidad', $idFaculty)->get();
		return $educationalObjetives;
	}

	// Funciones AJAX -------------------------------------------------------------------------	

	public function getNumber($number) {
		$educationalObjetive = EducationalObjetive::where('Numero', $number)
			->where('IdEspecialidad', Session::get('faculty-code'))
			->where('deleted_at', null)->first();

		$retVal = (is_null($educationalObjetive)) ? True : False ;
		$data['educationalObjetive'] = $retVal;
		$data['info']= $educationalObjetive;
		return $data;
	}

}