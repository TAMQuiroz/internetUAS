<?php namespace Intranet\Http\Services\TypeImprovementPlan;

use Intranet\Models\Teacher;
use Intranet\Models\Faculty;
use Intranet\Models\Suggestion;
use Intranet\Models\ImprovementPlan;
use Intranet\Models\TypeImprovementPlan;
use Intranet\Models\Cicle;
use DB;
use Session;

class TypeImprovementPlanService {
	
	public function retrieveAll() {
		return TypeImprovementPlan::get();
	}

	public function findByFaculty(){
		$typeImprovementPlan = TypeImprovementPlan::where('IdEspecialidad', Session::get('faculty-code'))
			->where('deleted_at', null)->get();
		return $typeImprovementPlan;
	}

	public function findTypeImprovementPlan($request) {
		$typeImprovementPlan = TypeImprovementPlan::where('IdTipoPlanMejora', $request['typeImprovementPlanId'])->first();
		return $typeImprovementPlan;
	}

	public function create($request) {

		$typeImprovementPlan = TypeImprovementPlan::create([
			'Codigo' => $request['code'],
			'Tema' => $request['theme'],
			'IdEspecialidad' => $data['specialty'] = Session::get('faculty-code'),
			'Descripcion' => $request['description']
			
		]);
	}

	public function update($request) {

		$typeImprovementPlan = TypeImprovementPlan::where('IdTipoPlanMejora', $request['typeImprovementPlanId'])
		//->where('deleted_at' -> null)
		->update(array(	'Codigo' => $request['code'],
						'Tema' => $request['theme'],
						'Descripcion' => $request['description']
		));
	}

	// Para eliminar logicamente -------------------------------------------------------------------------	

	// eliminar la entidad de tipo
	public function deleteType($request) {

		$typeImprovementPlan = TypeImprovementPlan::where('IdTipoPlanMejora', $request['typeImprovementPlanId'])->first();

		if(count($typeImprovementPlan->improvementPlan) == 0){
			$typeImprovementPlan->delete();
			return 1;
		}
		else{
			return 0;
		}
	}

	public function delete($request) {
		$teacher = Teacher::where('IdDocente', $request['teacherid'])->update(array('Vigente' => "0"));
	}

	
	public function getTypeImprovementPlan($typeImprovementPlanId) {
		$typeImprovementPlan = TypeImprovementPlan::where('IdTipoPlanMejora', $typeImprovementPlanId)->first();
		$data['typeImprovementPlan'] = $typeImprovementPlan;
		return $data;
	}

	// Funciones AJAX -------------------------------------------------------------------------	

	public function getCode($code) {

		$typeImprovementPlan = TypeImprovementPlan::where('Codigo', $code)
			->where('IdEspecialidad', Session::get('faculty-code'))
			->where('deleted_at', null)->first();

		$retVal = (is_null($typeImprovementPlan)) ? True : False ;
		$data['typeImprovementPlan'] = $retVal;
		$data['info']= $typeImprovementPlan;
		
		return $data;
	}

}