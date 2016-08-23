<?php namespace Intranet\Http\Controllers\Rubric;

use View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Intranet\Http\Services\StudentsResult\StudentsResultService;
use Intranet\Http\Services\Rubric\RubricService;
use Intranet\Http\Services\Aspect\AspectService;

class RubricController extends BaseController {

	protected $studentsResultService;
	protected $rubricService;
	protected $aspectService;

	public function __construct() {
		$this->studentsResultService = new StudentsResultService();
		$this->rubricService = new RubricService();
		$this->aspectService = new AspectService();
	}

	public function index() {
		$data['title'] = "Rúbricas";
		try {
			$data['studentsResults'] = $this->studentsResultService->retrieveAll();
			$data['rubrics'] = $this->rubricService->retrieveAll();
		} catch(\Exception $e) {
			dd($e);
		}
		return view('rubrics.index', $data);
	}
	
	public function create() {
		$data['title'] = 'Nueva Rúbrica';

		try {
			$data['aspects'] = $this->aspectService->retrieveAll();
		} catch (\Exception $e) {
			dd($e);
		}

		return view('rubrics.createRubric', $data);
	}

	public function save(Request $request) {
		try {
			$this->rubricService->createRubric($request->all());
		} catch(\Exception $e) {
			dd($e);
		}
		return redirect()->route('index.rubrics')->with('success', 'The rubric was successfully created');
	}

	public function edit(Request $request) {
		$data['title'] = 'Editar Rúbrica';
		try {
			$data['rubric'] = $this->rubricService->findRubric($request->all());
			$data['aspects'] = $this->rubricService->aspectsByRubric($request->all());
			$data['allAspects'] = $this->aspectService->retrieveAll($request->all());
		} catch (\Exception $e) {
			dd($e);
		}
		return view('rubrics.editRubric', $data);
	}

	public function update(Request $request) {
		try{
			$this->rubricService->updateRubric($request->all());
		} catch(\Exception $e){
			dd($e);
		}
		return redirect()->route('index.rubrics')->with('success', 'La Rúbrica ha sido actualizado con éxito');
	}

	public function view() {
		return view('rubrics.viewRubric');
	}

	public function choose() {
		return view('rubrics.chooseRubric');
	}

	public function delete(Request $request) {
		try{
			$this->rubricService->deleteRubric($request->all());
		} catch (\Exception $e) {
			dd($e);
		}
		return redirect()->route('index.rubrics')->with('success', 'The rubric was successfully deleted');
	}

	//AJAX functions

	public function findRE($idStudentsResult) {
		//$data['studentsResult'] = [];
		try {
			$data['studentsResult'] = $this->studentsResultService->getById($idStudentsResult);
		} catch (\Exception $e) {
			dd($e);
		}

		return json_encode($data);
	}

	public function indexByRE($idStudentsResult) {
		$data['rubrics'] = [];
		try {
			$data['rubrics'] = $this->rubricService->getRubricsByRE($idStudentsResult);
		} catch (\Exception $e) {
			dd($e);
		}

		return json_encode($data);
	}

	public function getRubricAspects($rubricCode) {
		$data['rubric'] = [];
		try{
			$data['rubric'] = $this->rubricService->getAspectsByRubricId($rubricCode);
		} catch(\Exception $e) {
			dd($e);
		}
		return json_encode($data);
	}

}