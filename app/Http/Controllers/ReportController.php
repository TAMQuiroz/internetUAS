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

}
