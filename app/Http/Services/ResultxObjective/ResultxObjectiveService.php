<?php namespace Intranet\Http\Services\ResultxObjective;

use Intranet\Models\ResultxObjective;
use Intranet\Models\StudentsResult;
use DB;

class ResultxObjectiveService {
	
	public function retrieveAll() {
		return ResultxObjective::get();
	}

	// asociar los reultados estudiantiles a un objetivo educacional
	public function createResultxObjective($request) {
		$resultxObjective = ResultxObjective::create([
			'IdResultadoEstudiantil' => $request['IdResultadoEstudiantil'],
			'IdObjetivoEducacional' => $request['IdObjetivoEducacional'],
			'IdCicloAcademico' => $request['IdCicloAcademico']
		]);		
	}

	// obtener los objetivos educacionales asociados a un reultado estudiantil	
	public function findStudentsResult($request) {
		$educationalObjetive = ResultxObjective::where([
			'IdResultadoEstudiantil', $request['resultxObjective-studentsResult'],
			'IdCicloAcademico', $request['resultxObjective-cycle']
			])
			->first();
		return $educationalObjetive;
	}

	// obtener los reultados estudiantiles asociados a un objetivo educacional
	public function findEducationalObjetive($idStudentsResult, $idCycle) {
		$resultxObjective = ResultxObjective::where([
				'IdResultadoEstudiantil' => $idStudentsResult,
				'IdCicloAcademico' => $idCycle
			]);
		return $resultxObjective;
	}

	public function deleteResultxObjective($request) {
		$resultxObjective = ResultxObjective::where('IdResultadoEducacionalxObjetivo', $request['resultxObjective-code'])
		->where('deleted_at', null);
		$resultxObjective->delete();
	}

}