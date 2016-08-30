<?php namespace Intranet\Http\Controllers\EducationalObjectives;

use View;
use Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Intranet\Http\Services\EducationalObjetive\EducationalObjetiveService;
use Intranet\Http\Services\Cicle\CicleService;
use Intranet\Http\Services\StudentsResult\StudentsResultService;


class EducationalObjectivesController extends BaseController {

	protected $educationalObjetiveService;
	protected $cicleService;
	protected $studentsResultService;
	protected $currentCycle;

	public function __construct() {
		$this->educationalObjetiveService = new EducationalObjetiveService();
		$this->cicleService = new CicleService();
		$this->studentsResultService = new StudentsResultService();
		$this->currentCycle = 1;
	}

	public function index() {

		$data['title'] = "Objetivos Educacionales";
		try {
			$data['educationalObjetives'] = $this->educationalObjetiveService->findByFaculty();
		} catch(\Exception $e) {
			dd($e);
		}
		return view('educationalObjectives.index', $data);

	}

	public function create() {

		$data['title'] = 'Nuevo Objetivo Educacional';
		try {
			$data['studentsResults'] = $this->studentsResultService->findByFaculty();
		} catch (\Exception $e) {
			dd($e);
		}
		return view('educationalObjectives.form',$data);

	}

	public function save(Request $request) {

		try {
			$this->educationalObjetiveService->create($request->all());
		} catch(\Exception $e) {
			dd($e);
		}
		return redirect()->route('index.educationalObjectives')->with('success', 'El objetivo educacional se ha registrado exitosamente');
	}

	public function view(Request $request) {

		$data['title'] = 'Objetivo Educacional';

		try {
			$data['educationalObjetive'] = $this->educationalObjetiveService->findEducationalObjetive($request->all());
			$data['resultxObjective'] = $this->educationalObjetiveService->getResultxObjective($request->all());
		} catch(\Exception $e) {
			dd($e);
		}
		return view('educationalObjectives.view', $data);
	}

	public function edit(Request $request) {

		$data['title'] = 'Editar Objetivo Educacional';

		try {
			$data['educationalObjetive'] = $this->educationalObjetiveService->findEducationalObjetive($request->all());
			$data['studentsResults'] = $this->studentsResultService->findByFaculty();
			$data['resultxObjective'] = $this->educationalObjetiveService->getResultxObjective($request->all());
		} catch (\Exception $e) {
			dd($e);
		}
		return view('educationalObjectives.edit', $data);

	}

	public function choose() {

		return view('educationalObjectives.chooseEducationalObjective');

	}

	public function delete(Request $request) {

		try{
			$this->educationalObjetiveService->delete($request->all());
		} catch (\Exception $e) {
			dd($e);
		}
		return redirect()->route('index.educationalObjectives')->with('success', 'El registro ha sido eliminado exitosamente');

	}

	public function update(Request $request) {

		if(!isset($request['stRstCheck'])){
			return redirect()->back()->withInput()->with('warning','El objetivo educacional necesita al menos un identificador');
		}

		try{
			$this->educationalObjetiveService->update($request->all(), $this->currentCycle);
		} catch (\Exception $e) {
			dd($e);
		}

		return redirect()->route('index.educationalObjectives')->with('success', 'Las modificaciones se han guardado exitosamente');

	}

	public function getEducationalObjetiveStudentResults($educationalObjetiveCode) {
		$data['educationalObjetive'] = [];
		try{
			$data['educationalObjetive'] = $this->educationalObjetiveService->getStudentResultsByEducationalObjetiveId($educationalObjetiveCode);
		} catch(\Exception $e) {
			dd($e);
		}
		return json_encode($data);
	}

	public function getById($educationalObjectiveCode){
		$obj = [];
		try{
			$obj = $this->educationalObjetiveService->getEducationalObjetiveById($educationalObjectiveCode);
		} catch(\Exception $e) {
			dd($e);
		}
		return json_encode($obj);
	}

	public function indexByFaculty($idFaculty) {
		$data['educationalObjetives'] = [];
		try {
			$data['educationalObjetives'] = $this->educationalObjetiveService->geteducationalObjetivesByFaculty($idFaculty);
		} catch (\Exception $e) {
			dd($e);
		}

		return json_encode($data);
	}

	public function findFaculty($idFaculty) {
		//$data['studentsResult'] = [];
		try {
			$data['faculty'] = $this->facultyService->find($idFaculty);
		} catch (\Exception $e) {
			dd($e);
		}

		return json_encode($data);
	}

	//AJAX for retrieving criteria from aspect

    public function getNumber($number) {
        try{
            $data['educationalObjetive'] = $this->educationalObjetiveService->getNumber($number);
        } catch(\Exception $e) {
            dd($e);
        }
        return json_encode($data);
    }
}