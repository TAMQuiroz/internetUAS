<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\Http\Requests;

use Intranet\Http\Services\Period\PeriodService;
use Intranet\Http\Services\StudentsResult\StudentsResultService;

use Session;

class ReportController extends Controller
{
    
    	protected $periodService;
    	protected $studentResultService;

    	public function __construct() {
	        $this->periodService = new PeriodService();
	        $this->studentResultService = new StudentsResultService();
    	}

		public function index(){

			$data['title'] = 'Reporte zukulento';

			$data['periodos'] = $this->periodService->getAll(Session::get('faculty-code'));
			//$data['resultados'] = $this->
			//dd($data['periodos']);
			return view('consolidated.report.index', $data);
		}

		
		//AJAX
		public function consultarResultados (Request $request){ //le envío el idPeriodo
			$idPeriodo = $request->get('idPeriodo');

			$resultados = $this->studentResultService->retrieveAllByFacultyByPeriod($idPeriodo);

			return $resultados->toJson();
		}
		
}
