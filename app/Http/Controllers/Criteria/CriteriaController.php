<?php namespace Intranet\Http\Controllers\Criteria;

use View;
use Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Intranet\Http\Services\Aspect\AspectService;
use Intranet\Http\Services\Criterion\CriterionService;
use Intranet\Http\Services\Faculty\FacultyService;
use Intranet\Http\Services\Period\PeriodService;

class CriteriaController extends BaseController {

	protected $aspectService;
	protected $criterionService;
	protected $facultyService;
	protected $periodService;

	public function __construct() {
		$this->aspectService = new AspectService();
		$this->criterionService = new CriterionService();
		$this->facultyService = new FacultyService();
		$this->periodService = new PeriodService();
	}

	public function save(Request $request) {
		try {
			$this->criterionService->create($request->all());
		} catch(\Exception $e) {
			dd($e);
		}
		return redirect()->route('view.aspects',['aspect-code'=>$request['aspect-code']])->with('success', 'El aspecto se ha registrado exitosamente');
	}
	
	public function edit(Request $request) {
		$data['title'] = 'Editar Criterio';
		try {
			//$data['aspect'] = $this->aspectService->getAspectById($request['aspect-code']);
			$data['criterion'] = $this->criterionService->getCriterionById($request['criterion-code']);
			$cantLevels = $this->criterionService->getCantLevels();
			$levels = $this->criterionService->findCriterionLevel($request['criterion-code']);
			$data['cantLevels'] = $cantLevels;
			$data['valor'] = 1;
			$data['levels'] = $levels;

			$cant = count($levels);
			if ($cant == 0){
				$data['message'] = 'No hay niveles asociados. Debe registrar los '.$cantLevels.' niveles necesarios.';
				$data['caso'] = 1;
			}
			elseif ($cantLevels != $cant) {
				$data['message'] = 'Se ha cambiado la cantidad de niveles. Para corregir debe registrar los '.$cantLevels.' niveles necesarios.';
				$data['caso'] = 2;
			}
			else{
				$data['message'] = '';
				$data['caso'] = 3;
			}
		} catch (\Exception $e) {
			dd($e);
		}
		return view('criteria.edit', $data);
	}

	public function update(Request $request) {
		try{
			$this->criterionService->update($request->all());
		} catch (\Exception $e) {
			dd($e);
		}
		return redirect()->route('view.aspects',['aspect-code'=>$request['aspect-code']])->with('success', 'Las modificaciones se han guardado exitosamente');
	}

	public function updateCriterionLevel(Request $request) {
		try{
			$this->criterionService->updateCriterionLevel($request->all());
		} catch (\Exception $e) {
			dd($e);
		}
		return redirect()->route('view.aspects',['aspect-code'=>$request['aspectcode']])->with('success', 'Las modificaciones se han guardado exitosamente');
	}

	public function view(Request $request) {
		$data['title'] = 'Criterio';
		try {
			$data['criterion'] = $this->criterionService->getCriterionById($request['criterion-code']);
			$data['periods'] = $this->periodService->getAll(Session::get('faculty-code'));
			/*
			$cantLevels = $this->criterionService->getCantLevels();
			$levels = $this->criterionService->findCriterionLevel($request['criterion-code']);
			$data['levels'] = $levels;
			//$data['cant'] = $cantLevels;

			$cant = count($levels);
			if ($cant == 0){
				$data['message'] = 'No hay niveles asociados. Para corregir debe editar el Criterio.';
			}
			elseif ($cantLevels != $cant) {
				$data['message'] = 'Se ha cambiado la cantidad de niveles. Para corregir debe editar el Criterio.';
			}
			else {
				$data['message'] = '';
			}
			*/
		} catch (\Exception $e) {
			dd($e);
		}
		return view('criteria.view', $data);
	}

	public function delete(Request $request) {
		$msg = 1;
		try{
			$msg = $this->criterionService->deleteCriterion($request->all());
		} catch (\Exception $e) {
			dd($e);
		}
		if($msg == 1) {
			return redirect()->route('index.aspects')->with('success', 'El registro ha sido eliminado exitosamente');
		}
		else{
			return redirect()->route('index.aspects')->with('success', 'No se puede eliminar el registro ya que exiten otros registros asociados');
		}
	}


	//AJAX Functions

	public function getAll() {
		$list = [];
		try{
			$list = $this->criterionService->retrieveAll();
		} catch(\Exception $e) {
			dd($e);
		}
		return json_encode($list);
	}

	public function getById($aspectCode){
		$asp = [];
		try{
			$asp = $this->criterionService->getAspectById($aspectCode);
		} catch(\Exception $e) {
			dd($e);
		}
		return json_encode($asp);
	}

	public function findCriterionByAspect($idAspect) {
		$data['criterions'] = [];
		try {
			$data['criterions'] = $this->criterionService->findCriterionByAspect($idAspect);
		} catch (\Exception $e) {
			dd($e);
		}

		return json_encode($data);
	}

}