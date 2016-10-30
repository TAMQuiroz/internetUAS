<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;

use Intranet\Http\Requests;

use Intranet\Http\Services\StudentsResult\StudentsResultService;
use Intranet\Http\Services\Aspect\AspectService;
use Intranet\Http\Requests\AspectRequest;

class FlujoCoordinadorController extends Controller
{

	protected $aspectService;
	protected $studentsResultService;

	public function __construct() {
		$this->aspectService = new AspectService();
		$this->studentsResultService = new StudentsResultService();
	}


    //
    public function aspect_index() {
		$data['title'] = 'Aspectos';
		try {			
			$studentResults= $this->studentsResultService->findByFaculty();
			$data['studentsResults'] = $studentResults;
			$data['aspects'] = $this->aspectService->findByRE($studentResults);
		} catch(\Exception $e) {
			dd($e);
		}
		return view('flujoAdministrador.aspect_index', $data);
	}

	public function aspect_create(AspectRequest $request) {
	
			$data['title'] = 'Nuevo Aspecto';
			$data['resultado']=$this->studentsResultService->findById($request->all());
			return view('flujoAdministrador.aspect_create', $data);
				
	}

	public function aspect_store(Request $request) {
		try {
			$this->aspectService->create($request->all());
		} catch(\Exception $e) {
			dd($e);
		}
		return redirect()->route('aspect_index.flujoAdministrador')->with('success', 'El aspecto se ha registrado exitosamente');
	}
}
