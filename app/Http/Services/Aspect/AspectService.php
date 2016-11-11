<?php namespace Intranet\Http\Services\Aspect;

use Intranet\Models\Aspect;
use Intranet\Models\Rubric;
use Intranet\Models\Criterion;
use Intranet\Models\CriterionLevel;
use DB;

class AspectService {
	
	public function retrieveAll() {
		return Aspect::get();
	}

	// obtener todos los aspectos del periodo actual y de la especialidad 
	public function findByRE($studentResults) {
		if($studentResults == null){
			return null;
		}

		$ar =  array();
		foreach($studentResults as $sr){ 
			$aspects = Aspect::where('IdResultadoEstudiantil', $sr->IdResultadoEstudiantil)->where('deleted_at', null)->orderBy("Nombre","ASC")->get();
			foreach($aspects as $aspect){
				array_push($ar, $aspect);
			}
		}
		return $ar;
	}

	public function findAspect($request) {
		$aspect = Aspect::where('IdAspecto', $request['aspect-code'])->first();
		return $aspect;
	}

	public function getAspectsByRubric($idRubric) {
		$aspects = Aspect::where('IdRubrica', $idRubric)->get();
		return $aspects;
	}

	public function create($request) {
		$aspect = Aspect::create([
			'IdResultadoEstudiantil' => $request['studentsResult_new_code'],
			'Nombre' => $request['aspect_new_name'],
			'Estado' => 0
		]);
	}
	
	public function update($request) {
		$aspect = Aspect::where('IdAspecto', $request['aspect_edit_code'])
        	->update([
				'Nombre' => $request['aspect_edit_name']//,
				//'IdResultadoEstudiantil' => $request['studentsResult_edit_code']
			]);
		/*
        $criterias = Criterion::where('IdAspecto', $request['aspect-code'])->get();

        if ( array_key_exists('criteriaItem', $request) ){
			foreach($request['criteriaItem'] as $item){
				$pos = strrpos($item, '-');
				$itemId = substr($item, 0, $pos);
				$itemName = substr($item, $pos + 1);

				if($itemId == 0){
					$criteria = Criterion::create([
						'IdAspecto' => $request['aspect-code'],
						'Nombre' => $itemName
					]);
				}
				else{
					$criteria = Criterion::where('IdCriterio', $itemId)
					->where('deleted_at', null)
					->update(['Nombre' => $itemName]);

					foreach($criterias as $crt){	
						if($crt->IdCriterio == $itemId){
							$crt->IdCriterio = -1;
						}
					}
				}
			}
			foreach($criterias as $crt){	
				if($crt->IdCriterio  != -1){
					$crt->delete();
				}
			}
		}
		*/
	}

	public function deleteAspect($request) {
		$aspect = Aspect::where('IdAspecto', $request['aspect-code'])
						->where('deleted_at', null)->first();

		/*
		$criterias = Criterion::where('IdAspecto', $request['aspect-code'])
			->where('deleted_at', null)->get();

		foreach($criterias as $crt){
			$levels = CriterionLevel::where('IdCriterio', $crt->IdCriterio)
			->where('deleted_at', null)->get();

			foreach($levels as $lvl){
				$lvl->delete();
			}
			$crt->delete();
		}
		*/
		if( count($aspect->criterion)>0 ) {
			return 0;
		}		
		$aspect->delete();
		return 1;
	}

	public function findCriterias($request) {
		$criteria = Criterion::where('IdAspecto', $request['aspect-code'])->where('deleted_at', null)->get();
		return $criteria;
	}

	//AJAX Functions

	public function getAspectById($aspectCode){
		$aspect = Aspect::where('IdAspecto', $aspectCode)
						->where('deleted_at', null)->first();
		return $aspect;
	}

	public function getCriteriaByAspectId($aspectCode) {
		$aspect = Aspect::where('IdAspecto', $aspectCode)->where('deleted_at', null)->get();

		$data['info'] = $aspect;
		$data['criteria'] = Criterion::where('IdAspecto', $aspectCode)->where('deleted_at', null)->get();
		return $data;
	}
}