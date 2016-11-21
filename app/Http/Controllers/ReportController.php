<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\Http\Requests;
use Intranet\Models\Course;
use Intranet\Models\DictatedCourses;
use Intranet\Models\TimeTable;
use Intranet\Models\Score;
use Intranet\Models\AcademicCycle;
use Intranet\Models\FacultyxCycle;
use Intranet\Models\Contribution;
use Intranet\Models\Criterion;
use Intranet\Models\Aspect;

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
				// obtener ciclos del periodo
				$idCiclos = FacultyxCycle::where('IdPeriodo', $request['periodo'])->get()->pluck('IdCicloAcademico');
				$ciclos = AcademicCycle::whereIn('IdCicloAcademico',$idCiclos)->get();
				$data['ciclos'] = $ciclos;

				if($request['resultado'] != 0){

					if($request['aspecto'] != 0){

						if($request['criterio'] != 0){ //halla cursos del resultado

							if($request['curso'] !=0 ){ //obtener valores de la tabla de desempeño (para los horarios del curso)

								// resultados de medicion del curso en el ciclo
								$resultadosMedicion = [];
								foreach ($ciclos as $ciclo) {							
									$idCursosxciclo = DictatedCourses::where('IdCurso', $request['curso'])->where('IdCicloAcademico', $ciclo->IdCicloAcademico)
																											->get()->pluck('IdCursoxCiclo');
									
									$horarios = TimeTable::whereIn('IdCursoxCiclo', $idCursosxciclo)->get()->pluck('IdHorario');
									$calificiones = Score::whereIn('IdHorario',$horarios)->where('IdCriterio', $request['criterio'])->get();
									
									$umbralAceptacion = $conf->UmbralAceptacion;
									$nivelEsperado = $conf->NivelEsperado;
									
									$cantAprobados = 0;
									$cantTotal = 0;
									foreach ($calificiones as $calif) {
										if($calif->Nota >= $nivelEsperado){
											$cantAprobados++;
										}
										$cantTotal++;
									}
									
									$resultado =($cantAprobados*1.0/$cantTotal)*100;
									array_push($resultadosMedicion, $resultado);
								}	
								//dd($resultadosMedicion);
								$data['tipoFiltro'] = 1;
								$data['resultadosMedicion'] = $resultadosMedicion;
							}
							else {					

								// obtener ciclos del periodo
								$resultadosMedicionTotal = [];
								foreach ($ciclos as $ciclo) {
									$idsCurso = Contribution::where('IdResultadoEstudiantil', $request['resultado'])->get()->pluck('IdCurso');
									$cursosxCiclo = DictatedCourses::whereIn('IdCurso', $idsCurso)->where('IdCicloAcademico', $ciclo->IdCicloAcademico)->get();

									$resultadosMedicion = [];
									foreach ($cursosxCiclo as $cxc) {
										$horarios = TimeTable::where('IdCursoxCiclo', $cxc->IdCursoxCiclo)->get()->pluck('IdHorario');
										$calificiones = Score::whereIn('IdHorario',$horarios)->where('IdCriterio', $request['criterio'])->get();

										$umbralAceptacion = $conf->UmbralAceptacion;
										$nivelEsperado = $conf->NivelEsperado;
										
										$cantAprobados = 0;
										$cantTotal = 0;
										foreach ($calificiones as $calif) {
											if($calif->Nota >= $nivelEsperado){
												$cantAprobados++;
											}
											$cantTotal++;
										}
										if($cantTotal > 0){
											$resultado = ($cantAprobados*1.0/$cantTotal)*100;
										}
										else{
											$resultado = 'No se midio';
										}										
										array_push($resultadosMedicion, $resultado);										
									}
									array_push($resultadosMedicionTotal, $resultadosMedicion);
								}
								//dd($resultadosMedicion);
								$data['tipoFiltro'] = 2;
								$data['resultadosMedicion'] = $resultadosMedicionTotal;
							}

						}
						else{ // todos los criterios y cursos

							//criterios del aspecto seleccionado
							$criterios = Criterion::where('IdAspecto', $request['aspecto'])->get();
			
							$resultadosxCriterio = [];
							foreach ($criterios as $criterio) {

								$resultadosMedicionTotal = [];
								foreach ($ciclos as $ciclo) {
									$idsCurso = Contribution::where('IdResultadoEstudiantil', $request['resultado'])->get()->pluck('IdCurso');
									$cursosxCiclo = DictatedCourses::whereIn('IdCurso', $idsCurso)->where('IdCicloAcademico', $ciclo->IdCicloAcademico)->get();

									$resultadosMedicion = [];
									foreach ($cursosxCiclo as $cxc) {
										$horarios = TimeTable::where('IdCursoxCiclo', $cxc->IdCursoxCiclo)->get()->pluck('IdHorario');
										$calificiones = Score::whereIn('IdHorario',$horarios)->where('IdCriterio', $criterio->IdCriterio)->get();

										$umbralAceptacion = $conf->UmbralAceptacion;
										$nivelEsperado = $conf->NivelEsperado;
										
										$cantAprobados = 0;
										$cantTotal = 0;
										foreach ($calificiones as $calif) {
											if($calif->Nota >= $nivelEsperado){
												$cantAprobados++;
											}
											$cantTotal++;
										}
										if($cantTotal > 0){
											$resultado = ($cantAprobados*1.0/$cantTotal)*100;
										}
										else{
											$resultado = 'No se midio';
										}										
										array_push($resultadosMedicion, $resultado);										
									}
									array_push($resultadosMedicionTotal, $resultadosMedicion);
								}
								array_push($resultadosxCriterio, $resultadosMedicionTotal);
							}
							//dd($resultadosxCriterio);			
							$data['tipoFiltro'] = 3;
							$data['resultadosMedicion'] = $resultadosxCriterio;				
						}
					}	
					else { // a partir de aspecto -> todo
						
						//aspectos del resultado
						$aspectos = Aspect::where('IdResultadoEstudiantil', $request['resultado'])->get();
						$resultadosxRE = [];
						foreach ($aspectos as $aspecto) {
							//criterios del aspecto seleccionado
							$criterios = Criterion::where('IdAspecto', $aspecto->IdAspecto)->get();

							$resultadosxCriterio = [];
							foreach ($criterios as $criterio) {
								
								$resultadosMedicionTotal = [];
								foreach ($ciclos as $ciclo) {
									$idsCurso = Contribution::where('IdResultadoEstudiantil', $request['resultado'])->get()->pluck('IdCurso');
									$cursosxCiclo = DictatedCourses::whereIn('IdCurso', $idsCurso)->where('IdCicloAcademico', $ciclo->IdCicloAcademico)->get();

									$resultadosMedicion = [];
									foreach ($cursosxCiclo as $cxc) {
										$horarios = TimeTable::where('IdCursoxCiclo', $cxc->IdCursoxCiclo)->get()->pluck('IdHorario');
										$calificiones = Score::whereIn('IdHorario',$horarios)->where('IdCriterio', $criterio->IdCriterio)->get();

										$umbralAceptacion = $conf->UmbralAceptacion;
										$nivelEsperado = $conf->NivelEsperado;
										
										$cantAprobados = 0;
										$cantTotal = 0;
										foreach ($calificiones as $calif) {
											if($calif->Nota >= $nivelEsperado){
												$cantAprobados++;
											}
											$cantTotal++;
										}
										if($cantTotal > 0){
											$resultado = ($cantAprobados*1.0/$cantTotal)*100;
										}
										else{
											$resultado = 'No se midio';
										}										
										array_push($resultadosMedicion, $resultado);										
									}
									array_push($resultadosMedicionTotal, $resultadosMedicion);
								}
								array_push($resultadosxCriterio, $resultadosMedicionTotal);
							}
							array_push($resultadosxRE, $resultadosxCriterio);
						}
						//dd($resultadosxRE);	
						$data['tipoFiltro'] = 4;
						$data['resultadosMedicion'] = $resultadosxRE;	
					}

				}
				else{ // no selecciona resultado, a partir de resultado -> todo
					//resultados del periodo
					$resultados = $this->studentResultService->retrieveAllByFacultyByPeriod($request['periodo']);
					$names = [];
					foreach ($resultados as $r) {
						array_push($names, $r->IdResultadoEstudiantil);
					}

					$resultadosGlobales = [];
					foreach ($resultados as $res) {
						//aspectos del resultado
						$aspectos = Aspect::where('IdResultadoEstudiantil', $res->IdResultadoEstudiantil)->get();
						$resultadosxRE = [];
						foreach ($aspectos as $aspecto) {
							//criterios del aspecto seleccionado
							$criterios = Criterion::where('IdAspecto', $aspecto->IdAspecto)->get();

							$resultadosxCriterio = [];
							foreach ($criterios as $criterio) {
								$idCiclos = FacultyxCycle::where('IdPeriodo', $request['periodo'])->get()->pluck('IdCicloAcademico');
								$ciclos = AcademicCycle::whereIn('IdCicloAcademico',$idCiclos)->get();

								$resultadosMedicionTotal = [];
								foreach ($ciclos as $ciclo) {
									$idsCurso = Contribution::where('IdResultadoEstudiantil', $res->IdResultadoEstudiantil)->get()->pluck('IdCurso');
									$cursosxCiclo = DictatedCourses::whereIn('IdCurso', $idsCurso)->where('IdCicloAcademico', $ciclo->IdCicloAcademico)->get();

									$resultadosMedicion = [];
									foreach ($cursosxCiclo as $cxc) {
										$horarios = TimeTable::where('IdCursoxCiclo', $cxc->IdCursoxCiclo)->get()->pluck('IdHorario');
										$calificiones = Score::whereIn('IdHorario',$horarios)->where('IdCriterio', $criterio->IdCriterio)->get();

										$umbralAceptacion = $conf->UmbralAceptacion;
										$nivelEsperado = $conf->NivelEsperado;
										
										$cantAprobados = 0;
										$cantTotal = 0;
										foreach ($calificiones as $calif) {
											if($calif->Nota >= $nivelEsperado){
												$cantAprobados++;
											}
											$cantTotal++;
										}
										if($cantTotal > 0){
											$resultado = ($cantAprobados*1.0/$cantTotal)*100;
										}
										else{
											$resultado = 'No se midio';
										}										
										array_push($resultadosMedicion, $resultado);										
									}
									array_push($resultadosMedicionTotal, $resultadosMedicion);
								}
								array_push($resultadosxCriterio, $resultadosMedicionTotal);
							}
							array_push($resultadosxRE, $resultadosxCriterio);
						}						
						array_push($resultadosGlobales, $resultadosxRE);						
					}
					//dd($resultadosGlobales);
					$data['tipoFiltro'] = 5;
					$data['resultadosMedicion'] = $resultadosGlobales;
				}
			}
			else {
				return redirect()->route('report.index')->with('warning', 'El campo período es obligatorio');
			}
			//dd($data);
			return view('consolidated.report.view', $data);
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
