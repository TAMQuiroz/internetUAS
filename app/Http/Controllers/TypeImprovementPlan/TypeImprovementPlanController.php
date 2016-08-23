<?php namespace Intranet\Http\Controllers\TypeImprovementPlan;

use View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Intranet\Http\Services\TypeImprovementPlan\TypeImprovementPlanService;
use Session;

class TypeImprovementPlanController extends BaseController {

	protected $typeImprovementPlanService;

	public function __construct() {
		$this->typeImprovementPlanService = new TypeImprovementPlanService();
	}

	public function index() {

		try {
			$data['typeImprovementPlans'] = $this->typeImprovementPlanService->findByFaculty();
		} catch (\Exception $e) {
			dd($e);
		}

		return view('typeImprovementPlan.index', $data);
	}
	
	public function create() {
		$data['title'] = 'Nuevo Tipo Plan de Mejora';

		try {

		} catch (\Exception $e) {
			dd($e);
		}

		return view('typeImprovementPlan.form', $data);
	}
	
	public function save(Request $request) {
		try {
			$this->typeImprovementPlanService->create($request->all());
		} catch(\Exception $e) {
			dd($e);
		}
		return redirect()->route('index.typeImprovement')->with('success', 'El tipo plan de mejora se ha registrado exitosamente');
	}
	
	public function edit(Request $request) {
		$data['title'] = 'Editar Tipo Plan de Mejora';

		try {
			$data['typeImprovementPlan'] = $this->typeImprovementPlanService->findTypeImprovementPlan(($request->all()));

		} catch (\Exception $e) {
			dd($e);
		}

		return view('typeImprovementPlan.edit', $data);
	}
	
	public function update(Request $request) {
		try {
			$this->typeImprovementPlanService->update($request->all());
		} catch(\Exception $e) {
			dd($e);
		}
		return redirect()->route('index.typeImprovement')->with('success', 'Las modificaciones se han guardado exitosamente');
	}

	public function delete(Request $request) {
		$dato = 0;
        try{
            $dato = $this->typeImprovementPlanService->deleteType($request->all());
        } catch (\Exception $e) {
            dd($e);
        }
        return $dato == 1 ? redirect()->route('index.typeImprovement')->with('success', 'El registro ha sido eliminado exitosamente') : redirect()->route('index.typeImprovement')->with('success', 'No se puede eliminar, ya que existen planes de mejora asociados a este tipo');
    }
	
	public function getTypeImprovementPlan($typeImprovementPlanId) {
		try{
			$data['typeImprovementPlan'] = $this->typeImprovementPlanService->getTypeImprovementPlan($typeImprovementPlanId);
		} catch(\Exception $e) {
			dd($e);
		}
		return json_encode($data);
	}

	//AJAX 

    public function getCode($code) {
        try{
            $data['typeImprovementPlan'] = $this->typeImprovementPlanService->getCode($code);
        } catch(\Exception $e) {
            dd($e);
        }
        return json_encode($data);
    }
	
}