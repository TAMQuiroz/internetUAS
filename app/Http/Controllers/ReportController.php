<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\Http\Requests;
use Intranet\Models\Course;

use Intranet\Http\Services\Period\PeriodService;
use Intranet\Http\Services\Aspect\AspectService;
use Intranet\Http\Services\Criterion\CriterionService;
use Intranet\Http\Services\Course\CourseService;
use Intranet\Http\Services\StudentsResult\StudentsResultService;
use DB;

use Session;


class ReportController extends Controller
{
    
    	protected $periodService;
    	protected $aspectService;
    	protected $criterionService;
    	protected $courseService;
    	protected $studentResultService;

    	public function __construct() {
	        $this->periodService = new PeriodService();
	        $this->aspectService = new AspectService();
	        $this->criterionService = new CriterionService();
	        $this->courseService = new CourseService();
	        $this->studentResultService = new StudentsResultService();
    	}

		public function index(){


			$data['title'] = 'Reporte zukulento';
			
			$data['periodos'] = $this->periodService->getAll(Session::get('faculty-code'));
			
			return view('consolidated.report.index', $data);
		}

		
		//AJAX
		public function consultarResultados (Request $request){ //le envío el idPeriodo
			$idPeriodo = $request->get('idPeriodo');

			$resultados = $this->studentResultService->retrieveAllByFacultyByPeriod($idPeriodo);

			return $resultados->toJson();
		}

		//AJAX
		public function consultarAspectos (Request $request){ //le envío el idResultado
			$idResultado = $request->get('idResultadoEstudiantil');

			$aspectos = $this->aspectService->retrieveAllByFacultyByPeriodByResult($idResultado);

			return $aspectos->toJson();
		}

		//AJAX
		public function consultarCriterios (Request $request){ //le envío el idAspecto
			$idAspecto = $request->get('idAspecto');

			$criterios = $this->criterionService->findCriterionByAspect($idAspecto);

			return $criterios->toJson();
		}

		//AJAX
		public function consultarCursos (Request $request){ //le envío el idPeriodo
			$idPeriodo = $request->get('idPeriodo');

			$cursos = $this->courseService->findCoursesByPeriod($idPeriodo);

			return $cursos->toJson();
		}
		
}
