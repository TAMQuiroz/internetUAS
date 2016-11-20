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
use Intranet\Http\Services\Faculty\FacultyService;
use DB;

use Session;


class ReportController extends Controller
{
    
    	protected $periodService;
    	protected $aspectService;
    	protected $criterionService;
    	protected $courseService;
    	protected $studentResultService;
    	protected $facultyService;

    	public function __construct() {
	        $this->periodService = new PeriodService();
	        $this->aspectService = new AspectService();
	        $this->criterionService = new CriterionService();
	        $this->courseService = new CourseService();
	        $this->studentResultService = new StudentsResultService();
	        $this->facultyService = new FacultyService();
    	}

		public function index(){


			$data['title'] = 'Reporte zukulento';
			
			$data['periodos'] = $this->periodService->getAll(Session::get('faculty-code'));
			
			return view('consolidated.report.index', $data);
		}

		public function view(Request $request){

			//dd($request);
			$data['title'] = 'Reporte detallado';
			$data['period'] = $conf = $this->facultyService->findConfFaculty(Session::get('faculty-code'), $request['periodo']);

			if($request['periodo'] != 0){
				$idPeriodo = $request['periodo'];
				$resultados = $this->studentResultService->retrieveAllByFacultyByPeriod($idPeriodo);
				//dd($resultados);
				if($request['resultado'] != 0){

					if($request['aspecto'] != 0){


						if($request['criterio'] != 0){ //halla cursos del resultado



						}
						else{

						}
					}	
					else {

					}

				}
				else{

				}
			}
			else {
				//redirect back
				//return redirect()->route('')->with('success', '')
			}
			return view('consolidated.report.view', $data);
		}

		/*

		- nada seleccionado: no avanzar
		- solo periodo: hallar resultado del periodo (incluido hijos) y cursos


		- solo resultado: hallar los hijos del resultado seleccionado y cursos


		- solo aspecto: hallar los hijos del aspecto seleccionado y cursos


		- solo criterio:  hallar cursos

		*/

		
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
			$cursos = $this->courseService->findCourseByStudentResult($idResultado);
			$data['aspectos'] = $aspectos;
			$data['cursos'] = $cursos;
			return collect($data)->toJson();
		}

		//AJAX
		public function consultarCriterios (Request $request){ //le envío el idAspecto
			$idAspecto = $request->get('idAspecto');

			$criterios = $this->criterionService->findCriterionByAspect($idAspecto);

			return $criterios->toJson();
		}

		//AJAX
		public function consultarCursos (Request $request){ //le envío el idPeriodo
			$idResultado = $request->get('idResultado');

			$cursos = $this->courseService->findCourseByStudentResult($idResultado);

			return $cursos->toJson();
		}
		
}
