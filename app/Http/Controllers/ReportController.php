<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\Http\Requests;

use Intranet\Http\Services\Period\PeriodService;
use Session;

class ReportController extends Controller
{
    
    	protected $periodService;

    	public function __construct() {
	        $this->periodService = new PeriodService();
    	}

		public function index(){

			$data['title'] = 'Reporte zukulento';
			$data['periodos'] = $this->periodService->getAll(Session::get('faculty-code'));

			
			return view('consolidated.report.index', $data);
		}

		//AJAX
		public function consultarResultados (Request $request){ //le envío el idPeriodo
			$idPeriodo = $request->get('idPeriodo');

			//obtenemos los resultados de ese periodo.
			$idResultadosEstudiantiles = BD::('periodoxresultado')->where ('IdPeriodo', '=', $idPeriodo )->get();

			//obtengo toda la dta de los resultados:
			$resultadosEstudiantiles = StudentResult::whereIn('IdResultadoEstudiantil', $idResultadosEstudiantiles)->get();

			return $resultadosEstudiantiles->toJson();
		}

}
