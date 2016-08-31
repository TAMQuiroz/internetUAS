<?php namespace Intranet\Http\Controllers\AcademicCycle;

use View;
use Intranet\Models\CoursexCycle;
use Illuminate\Http\Request;
use Intranet\Http\Services\AcademicCycle\AcademicCycleService;
use Illuminate\Routing\Controller as BaseController;

class AcademicCycleController extends BaseController {

	protected $academicCycleService;

	public function __construct() {

		$this->academicCycleService = new AcademicCycleService();
	}

	public function index() {
		$data['title'] = "Ciclo Académico";
		try {
			$data['academicCycle'] = $this->academicCycleService->retrieveAll();
		} catch(\Exception $e) {
			dd($e);
		}
		return view('academicCycle.index', $data);
	}

	public function create() {
		$data['title'] = 'Nuevo Ciclo Académico';
		return view('academicCycle.form', $data);
	}

	public function save(Request $request) {
		try {
			$academicCycle = $this->academicCycleService->save($request->all());
		} catch(\Exception $e) {
			dd($e);
		}
		return redirect()->route('index.academicCycle')->with('success', 'El ciclo académico se ha registrado exitosamente');
	}

	public function delete(Request $request) {

		try{
			$courses = CoursexCycle::where('IdCicloAcademico',$request['cycleId'])->count();

			if($courses == 0){
				$this->academicCycleService->delete($request);
			}else{
				return redirect()->back()->with('warning','El ciclo academico aun tiene cursos');			
			}
	
			
		} catch (\Exception $e) {
			dd($e);
		}
		return redirect()->route('index.academicCycle')->with('success', 'El ciclo académico ha sido eliminado exitosamente');
	}

	public function getCycle($cycle) {
		try{
			$data['cycle'] = $this->academicCycleService->getCycle($cycle);
		} catch(\Exception $e) {
			dd($e);
		}
		return json_encode($data);
	}

}