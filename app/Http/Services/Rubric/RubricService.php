<?php namespace Intranet\Http\Services\Rubric;

use Intranet\Models\Rubric;
use Intranet\Models\Aspect;
use Intranet\Models\Criterion;
use Intranet\Models\StudentsResult;
use Intranet\Models\CriterionLevel;
use DB;

class RubricService {

	public function retrieveAll() {
		return Rubric::get();
	}

	public function getRubricsByRE($idStudentsResult) {
		$rubrics = Rubric::where('IdResultadoEstudiantil', $idStudentsResult)->get();
		return $rubrics;
	}
	public function findRubric($request) {
		$rubric = Rubric::where('IdRubrica', $request['rubric-code'])->first();
		return $rubric;
	}

	public function createRubric($request) {
		$rubric = Rubric::create([
			'Nombre' => $request['rubric-name']
		]);

		if(array_key_exists('aspect', $request)) {
			foreach($request['aspect'] as $asp){
				$aspect = Aspect::where('IdAspecto', $asp)
								->where('deleted_at', null)
								->update(['IdRubrica' => $rubric['id']]);
			}
		}
	}

	public function updateRubric($request) {

		$rubric = Rubric::where('IdRubrica', $request['rubric-code'])
		->where('deleted_at', null)
		->update(['Nombre' => $request['rubric-name']]);

		$aspects = Aspect::where('IdRubrica', $request['rubric-code'])->get();

		if ( array_key_exists('aspectItem', $request) ){
			foreach($request['aspectItem'] as $aspect){
				$pos = strrpos($aspect, '-');
				$id = substr($aspect, 0, $pos);
				$name = substr($aspect, $pos + 1);

				if($id == 0){
					$newAspect = Aspect::create([
						'IdRubrica' => $request['rubric-code'],
						'Nombre' => $name
					]);
				}
				else{
					$updateAspect = Aspect::where('IdAspecto', $id)
					->where('deleted_at', null)
					->update(['Nombre' => $name]);

					foreach($aspects as $asp){
						if($asp->IdAspecto == $id){
							$asp->IdAspecto = -1;
						}
					}
				}
			}
			foreach($aspects as $asp){
				if($asp->IdAspecto  != -1){
					$aspDeleted = Aspect::where('IdAspecto', $asp->IdAspecto)
					->where('deleted_at', null);
					$aspDeleted->delete();
				}
			}
		}

	}

	public function deleteRubric($request) {
		$rubric = Rubric::where('IdRubrica', $request['rubric-code'])
		->where('deleted_at', null);

		$aspects = Aspect::where('IdRubrica', $request['rubric-code'])
						->where('deleted_at', null)->get();

		foreach($aspects as $asp){
			$criterias = Criterion::where('IdAspecto', $asp->IdAspecto)
				->where('deleted_at', null)->get();

			foreach($criterias as $crt){
				$levels = CriterionLevel::where('IdCriterio', $crt->IdCriterio)
				->where('deleted_at', null)->get();

				foreach($levels as $lvl){
					$lvl->delete();
				}
				$crt->delete();
			}
			$asp->delete();
		}
		$rubric->delete();
	}

	public function aspectsByRubric($request) {
		$aspects = Aspect::where('IdRubrica', $request['rubric-code'])->where('deleted_at', null)->get();
		return $aspects;
	}
	//AJAX Functions

	public function getAspectsByRubricId($rubricCode) {
		$rubric = Rubric::where('IdRubrica', $rubricCode)->where('deleted_at', null)->get();

		$data['info'] = $rubric;
		$data['aspects'] = Aspect::where('IdRubrica', $rubricCode)->where('deleted_at', null)->get();
		return $data;
	}
}