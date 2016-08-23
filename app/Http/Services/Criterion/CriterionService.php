<?php namespace Intranet\Http\Services\Criterion;

use Session;
use Intranet\Models\Period;
use Intranet\Models\Criterion;
use Intranet\Models\ConfFaculty;
use Intranet\Models\CriterionLevel;
use DB;

class CriterionService {

	public function retrieveAll() {
		return Criterion::get();
	}

	public function findCriterion($request) {
		$criterion = Criterion::where('IdCriterio', $request['criterion-code'])->first();
		return $criterion;
	}

	public function findCriterionByAspect($idAspect) {
		$criterions = Criterion::where('IdAspecto', $idAspect)->where('deleted_at', null)->get();
		return $criterions;
	}

	public function getCantLevels() {

		$period = Period::where('IdEspecialidad', Session::get('faculty-code'))->where('Vigente', 1)->first();
		if($period == null) return null;

		$confFaculty = ConfFaculty::where('IdEspecialidad', Session::get('faculty-code'))
			->where('IdPeriodo', $period->IdPeriodo)->first();
		return $confFaculty->CantNivelCriterio;
	}

	public function getConfFaculty() {

		$period = Period::where('IdEspecialidad', Session::get('faculty-code'))->where('Vigente', 1)->first();
		if($period == null) return null;

		$confFaculty = ConfFaculty::where('IdEspecialidad', Session::get('faculty-code'))
			->where('IdPeriodo', $period->IdPeriodo)->first();
		return $confFaculty;
	}

	public function findCriterionLevel($idCriteria) {
		$levels = CriterionLevel::where('IdCriterio', $idCriteria)->where('deleted_at', null)->get();
		return $levels;
	}

	public function create($request) {
		Criterion::create([
			'Nombre' => $request['criteria_new_name'],
			'IdAspecto' => $request['aspect-code'],
			'Estado' => 0
		]);
	}

	public function update($request) {
		Criterion::where('IdCriterio', $request['criteria_edit_code'])
			->where('deleted_at', null)
			->update([ 'Nombre' => $request['criteria_edit_name'] ]);
	}

	public function updateCriterionLevel($request) {
		$criterion = Criterion::where('IdCriterio', $request['criterioncode'])
			->where('deleted_at', null)
			->update([ 'Nombre' => $request['criterionname'] ]);

		$period = Period::where('IdEspecialidad', Session::get('faculty-code'))->where('Vigente', 1)->first();

		if ( array_key_exists('levelCodeCurrent', $request) ) {

			$idLevels = $request['levelCodeCurrent'];
			$valueLevels = $request['levelValueCurrent'];
			$descLevels = $request['levelDescCurrent'];
			$cant = count($idLevels);

			for( $i = 0; $i < $cant ; $i++ ){
				$criteriaLevel = CriterionLevel::create([
					'IdCriterio' => $request['criterioncode'],
					'Valor' => $valueLevels[$i],
					'Descripcion' => $descLevels[$i],
					'IdPeriodo' => $period->IdPeriodo
				]);
			}

			if ( array_key_exists('levelCode', $request) ) {
				$ids = $request['levelCode'];
				$cantIds = count($ids);
				for( $j = 0; $j < $cantIds ; $j++ ){
					$lvl = CriterionLevel::where('IdNivelCriterio', $ids[$j])->where('deleted_at', null)->first();
					$lvl->delete();
				}
			}
		}
		elseif ( array_key_exists('levelCodePast', $request) ) {

			$idLevels = $request['levelCodePast'];
			$descLevels = $request['levelDescPast'];
			$cant = count($idLevels);

			for( $i = 0; $i < $cant ; $i++ ){
				$criteriaLevel = CriterionLevel::where('IdNivelCriterio', $idLevels[$i])
					->where('deleted_at', null)
					->update(['Descripcion' => $descLevels[$i] ]);
			}
		}
	}

	public function deleteCriterion($request) {
		$criterion = Criterion::where('IdCriterio', $request['criterion-code'])->first();

		/*
		foreach($criterion->criterionLevel as $lvl){
			$lvl->delete();
		}
		*/
		if( count($criterion->criterionLevel) > 0){
			return 0;
		}
		$criterion->delete();
		return 1;
	}

	//AJAX Functions

	public function getCriterionById($criterionCode) {
		$criterion = Criterion::where('IdCriterio', $criterionCode)->where('deleted_at', null)->first();
		return $criterion;
	}
}