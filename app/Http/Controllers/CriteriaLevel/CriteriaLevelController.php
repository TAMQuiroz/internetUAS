<?php namespace Intranet\Http\Controllers\CriteriaLevel;

use View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Intranet\Http\Services\Criterion\CriterionService;

class CriteriaLevelController extends BaseController {

	protected $criterionService;

	public function __construct() {
		$this->criterionService = new CriterionService();
	}

	public function index() {
		return view('criteriaLevels.index');
	}
	public function create() {
		return view('criteriaLevels.form');
	}
	public function edit() {
		return view('criteriaLevels.edit');
	}

	public function update(Request $request) {
		try{
			$this->criterionService->updateCriterionLevel($request->all());
		} catch (\Exception $e) {
			dd($e);
		}
		return redirect()->route('index.aspect')->with('success', 'El Niveles del Criterio han sido actualizado con éxito');
	}
}