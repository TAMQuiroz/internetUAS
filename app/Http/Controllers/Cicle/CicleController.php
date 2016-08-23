<?php namespace Intranet\Http\Controllers\Cicle;

use View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Intranet\Http\Services\Cicle\CicleService;



class EducationalObjectivesController extends BaseController {

	protected $cicleService;

	public function __construct() {
		$this->cicleService = new CicleService();
	}

	public function index() {

		$data['title'] = "Cicles";
		try {
			$data['Cicles'] = $this->CicleService->retrieveAll();
		} catch(\Exception $e) {
			dd($e);
		}
		return view('Cicles.index', $data);

	}

	public function create() {

		$data['title'] = 'New Cicle';
		return view('Cicles.form',$data);

	}

	public function save(Request $request) {

		try {
			$this->CicleService->createCicle($request->all());
		} catch(\Exception $e) {
			dd($e);
		}
		return redirect()->route('index.cicles')->with('success', 'The Cicle was successfully created');
	}


	public function edit(Request $request) {

		$data['title'] = 'Edit Cicle';
		$data['Cicle'] = $this->CicleService->findCicle($request);
		return view('Cicles.editCicle', $data);

	}

	public function view() {

		return view('cicles.viewCicle');

	}

	public function choose() {

		return view('cicles.chooseCicle');

	}

	public function findActualCicle() {
		$cycle = $this->CicleService->findActualCicle();
		return $cycle;
	}

	public function delete(Request $request) {
	
		try{
			$this->CicleService->deleteCicle($request->all());
		} catch (\Exception $e) {
			dd($e);
		}
		return redirect()->route('index.cicles')->with('success', 'The Cicle was successfully deleted');

	}

	public function update(Request $request) {
	
		try{
			$this->CicleService->updateCicle($request->all());
		} catch (\Exception $e) {
			dd($e);
		}

		return redirect()->route('index.cicles')->with('success', 'The Cicle was successfully updated');

	}

}