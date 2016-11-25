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
use Intranet\Models\StudentsResult;

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


			$data['title'] = 'Reporte de Resultados de Medición';
			
			$data['periodos'] = $this->periodService->getAll(Session::get('faculty-code'));
			
			return view('consolidated.report.index', $data);
		}

		public function view(Request $request){

			
			$data['title'] = 'Reporte detallado';
			$data['period'] = $conf = $this->facultyService->findConfFaculty(Session::get('faculty-code'), $request['periodo']);

			if($request['periodo'] != 0){	
				// obtener ciclos del periodo
				$idCiclos = FacultyxCycle::where('IdPeriodo', $request['periodo'])->get()->pluck('IdCiclo');
				$ciclos = AcademicCycle::whereIn('IdCicloAcademico',$idCiclos)->get();
				$data['ciclos'] = $ciclos;
				//dd($data);
				if($request['resultado'] != 0){

					if($request['aspecto'] != 0){

						if($request['criterio'] != 0){ //halla cursos del resultado

							if($request['curso'] !=0 ){ //obtener valores de la tabla de desempeño (para los horarios del curso)
								//resultados del periodo
								$res = StudentsResult::find($request['resultado']);
								
								$resultadosGlobales['periodo'] = $request['periodo'];
								$resultadosGlobales['resultados'] = [];
								if($res != null){
								
									//aspectos del resultado
									$aspecto = Aspect::find($request['aspecto']);
									$resultadosxRE['resultadoEstudiantil'] = $res->Descripcion;
									$resultadosxRE['aspectos'] = [];

									$totalRowsR = 0;
									if ( $aspecto != null) {
										//criterios del aspecto seleccionado
										$criterio = Criterion::find($request['criterio']);

										$resultadosxCriterio['aspecto'] = $aspecto->Nombre;
										$resultadosxCriterio['criterios'] = [];
										$totalRows = 0;

										if ($criterio != null) {

											$cursosxCiclo = DictatedCourses::where('IdCurso', $request['curso'])->get();

											$resultadosMedicion['criterio'] = $criterio->Nombre;
											$resultadosMedicion['cursos'] = [];
											foreach ($cursosxCiclo as $cxc) {

												$curso = Course::where('IdCurso', $cxc->IdCurso)->first();
												$curs['nombre'] = $curso->Codigo.' - '.$curso->Nombre;
												$curs['resultadoxciclo'] = [];
												foreach ($ciclos as $ciclo) { //compara el ciclo del cursoxciclo con cada ciclo del periodo elegido
													$idCicloAcademico = FacultyxCycle::where('IdCiclo',$ciclo->IdCicloAcademico)->first();
													if($cxc->IdCicloAcademico == $idCicloAcademico->IdCicloAcademico){
														$horarios = TimeTable::where('IdCursoxCiclo', $cxc->IdCursoxCiclo)->get()->pluck('IdHorario');
														$calificiones = Score::whereIn('IdHorario',$horarios)->where('IdCriterio', $criterio->IdCriterio)->get();

														$idCiclos = FacultyxCycle::where('IdPeriodo', $request['periodo'])->get()->pluck('IdCicloAcademico');
														$ciclos = AcademicCycle::whereIn('IdCicloAcademico',$idCiclos)->get();
														
														$resM['nombre'] = $ciclo->Descripcion;
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

														$resM['resultado'] = $resultado;
														
														array_push($curs['resultadoxciclo'], $resM);	
													}	
												}
												array_push($resultadosMedicion['cursos'], $curs);
											}
											$nrows = count($resultadosMedicion['cursos']);
											if($nrows == 0){
												$nrows = 1;
											}
											$resultadosMedicion['cantRows'] = $nrows;
											$totalRows += $resultadosMedicion['cantRows'];							
											array_push($resultadosxCriterio['criterios'], $resultadosMedicion);
										}
										
										if($totalRows == 0){
											$totalRows = 1;
										}
										$resultadosxCriterio['cantRows'] = $totalRows;
										$totalRowsR += $totalRows;
										array_push($resultadosxRE['aspectos'], $resultadosxCriterio);

									}	
									$resultadosxRE['cantRows'] = $totalRowsR;
									array_push($resultadosGlobales['resultados'], $resultadosxRE);						
								}
								
								$data['tipoFiltro'] = 5;
								$data['resultadosMedicion'] = $resultadosGlobales;
							}
							else {					

								// obtener ciclos del periodo
								$res = StudentsResult::find($request['resultado']);
								
								$resultadosGlobales['periodo'] = $request['periodo'];
								$resultadosGlobales['resultados'] = [];
								if($res != null){
								
									//aspectos del resultado
									$aspecto = Aspect::find($request['aspecto']);
									$resultadosxRE['resultadoEstudiantil'] = $res->Descripcion;
									$resultadosxRE['aspectos'] = [];

									$totalRowsR = 0;
									if ( $aspecto != null) {
										//criterios del aspecto seleccionado
										$criterio = Criterion::find($request['criterio']);

										$resultadosxCriterio['aspecto'] = $aspecto->Nombre;
										$resultadosxCriterio['criterios'] = [];
										$totalRows = 0;

										if ($criterio != null) {	
											$idsCurso = Contribution::where('IdResultadoEstudiantil', $res->IdResultadoEstudiantil)->get()->pluck('IdCurso');
											
											$cursosxCiclo = DictatedCourses::whereIn('IdCurso', $idsCurso)->get();
											$resultadosMedicion['criterio'] = $criterio->Nombre;
											$resultadosMedicion['cursos'] = [];

											foreach ($cursosxCiclo as $cxc) {
												$curso = Course::where('IdCurso', $cxc->IdCurso)->first();
												$curs['nombre'] = $curso->Codigo.' - '.$curso->Nombre;
												$curs['resultadoxciclo'] = [];
												foreach ($ciclos as $ciclo) { //compara el ciclo del cursoxciclo con cada ciclo del periodo elegido
													$idCicloAcademico = FacultyxCycle::where('IdCiclo',$ciclo->IdCicloAcademico)->first();
													if($cxc->IdCicloAcademico == $idCicloAcademico->IdCicloAcademico){
														$horarios = TimeTable::where('IdCursoxCiclo', $cxc->IdCursoxCiclo)->get()->pluck('IdHorario');
														$calificiones = Score::whereIn('IdHorario',$horarios)->where('IdCriterio', $criterio->IdCriterio)->get();

														$idCiclos = FacultyxCycle::where('IdPeriodo', $request['periodo'])->get()->pluck('IdCicloAcademico');
														$ciclos = AcademicCycle::whereIn('IdCicloAcademico',$idCiclos)->get();
														
														$resM['nombre'] = $ciclo->Descripcion;
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

														$resM['resultado'] = $resultado;
														
														array_push($curs['resultadoxciclo'], $resM);	
													}	
												}
												array_push($resultadosMedicion['cursos'], $curs);
											}
											$nrows = count($resultadosMedicion['cursos']);
											if($nrows == 0){
												$nrows = 1;
											}
											$resultadosMedicion['cantRows'] = $nrows;
											$totalRows += $resultadosMedicion['cantRows'];							
											array_push($resultadosxCriterio['criterios'], $resultadosMedicion);
										}
										
										if($totalRows == 0){
											$totalRows = 1;
										}
										$resultadosxCriterio['cantRows'] = $totalRows;
										$totalRowsR += $totalRows;
										array_push($resultadosxRE['aspectos'], $resultadosxCriterio);

									}	
									$resultadosxRE['cantRows'] = $totalRowsR;
									array_push($resultadosGlobales['resultados'], $resultadosxRE);						
								}
								
								$data['tipoFiltro'] = 5;
								$data['resultadosMedicion'] = $resultadosGlobales;
							}

						}
						else{ // todos los criterios y cursos

								$res = StudentsResult::find($request['resultado']);

								$resultadosGlobales['periodo'] = $request['periodo'];
								$resultadosGlobales['resultados'] = [];
								if($res != null){								
									//aspectos del resultado
									$aspecto = Aspect::find($request['aspecto']);
									$resultadosxRE['resultadoEstudiantil'] = $res->Descripcion;
									$resultadosxRE['aspectos'] = [];

									$totalRowsR = 0;
									if ( $aspecto != null) {
										//criterios del aspecto seleccionado
										$criterios = Criterion::where('IdAspecto', $aspecto->IdAspecto)->get();
										$resultadosxCriterio['aspecto'] = $aspecto->Nombre;
										$resultadosxCriterio['criterios'] = [];
										$totalRows = 0;

										foreach ($criterios as $criterio) {											
											//cursos
											$idsCurso = Contribution::where('IdResultadoEstudiantil', $res->IdResultadoEstudiantil)->get()->pluck('IdCurso');											
											$cursosxCiclo = DictatedCourses::whereIn('IdCurso', $idsCurso)->get();

											$resultadosMedicion['criterio'] = $criterio->Nombre;
											$resultadosMedicion['cursos'] = [];
											foreach ($cursosxCiclo as $cxc) {
												$curso = Course::where('IdCurso', $cxc->IdCurso)->first();
												$curs['nombre'] = $curso->Codigo.' - '.$curso->Nombre;
												$curs['resultadoxciclo'] = [];
												foreach ($ciclos as $ciclo) { //compara el ciclo del cursoxciclo con cada ciclo del periodo elegido
													$idCicloAcademico = FacultyxCycle::where('IdCiclo',$ciclo->IdCicloAcademico)->first();
													if($cxc->IdCicloAcademico == $idCicloAcademico->IdCicloAcademico){
														$horarios = TimeTable::where('IdCursoxCiclo', $cxc->IdCursoxCiclo)->get()->pluck('IdHorario');
														$calificiones = Score::whereIn('IdHorario',$horarios)->where('IdCriterio', $criterio->IdCriterio)->get();

														$idCiclos = FacultyxCycle::where('IdPeriodo', $request['periodo'])->get()->pluck('IdCicloAcademico');
														$ciclos = AcademicCycle::whereIn('IdCicloAcademico',$idCiclos)->get();
														
														$resM['nombre'] = $ciclo->Descripcion;
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
														$resM['resultado'] = $resultado;														
														array_push($curs['resultadoxciclo'], $resM);	
													}	
												}
												array_push($resultadosMedicion['cursos'], $curs);
											}
											$nrows = count($resultadosMedicion['cursos']);
											if($nrows == 0){
												$nrows = 1;
											}
											$resultadosMedicion['cantRows'] = $nrows;
											$totalRows += $resultadosMedicion['cantRows'];							
											array_push($resultadosxCriterio['criterios'], $resultadosMedicion);
										}
										
										if($totalRows == 0){
											$totalRows = 1;
										}
										$resultadosxCriterio['cantRows'] = $totalRows;
										$totalRowsR += $totalRows;
										array_push($resultadosxRE['aspectos'], $resultadosxCriterio);

									}	
									$resultadosxRE['cantRows'] = $totalRowsR;
									array_push($resultadosGlobales['resultados'], $resultadosxRE);						
								}
								
								$data['tipoFiltro'] = 5;
								$data['resultadosMedicion'] = $resultadosGlobales;			
						}
					}	
					else { // a partir de aspecto -> todo
						
								$res = StudentsResult::find($request['resultado']);								
								$resultadosGlobales['periodo'] = $request['periodo'];
								$resultadosGlobales['resultados'] = [];
								if($res != null){
								
									//aspectos del resultado
									$aspectos = Aspect::where('IdResultadoEstudiantil', $res->IdResultadoEstudiantil)->get();
									$resultadosxRE['resultadoEstudiantil'] = $res->Descripcion;
									$resultadosxRE['aspectos'] = [];

									$totalRowsR = 0;
									foreach ($aspectos as $aspecto) {
										//criterios del aspecto seleccionado
										$criterios = Criterion::where('IdAspecto', $aspecto->IdAspecto)->get();

										$resultadosxCriterio['aspecto'] = $aspecto->Nombre;
										$resultadosxCriterio['criterios'] = [];
										$totalRows = 0;

										foreach ($criterios as $criterio) {
											
											//cursos
											$idsCurso = Contribution::where('IdResultadoEstudiantil', $res->IdResultadoEstudiantil)->get()->pluck('IdCurso');
											
											$cursosxCiclo = DictatedCourses::whereIn('IdCurso', $idsCurso)->get();

											$resultadosMedicion['criterio'] = $criterio->Nombre;
											$resultadosMedicion['cursos'] = [];
											foreach ($cursosxCiclo as $cxc) {
												$curso = Course::where('IdCurso', $cxc->IdCurso)->first();
												$curs['nombre'] = $curso->Codigo.' - '.$curso->Nombre;
												$curs['resultadoxciclo'] = [];
												foreach ($ciclos as $ciclo) { //compara el ciclo del cursoxciclo con cada ciclo del periodo elegido
													$idCicloAcademico = FacultyxCycle::where('IdCiclo',$ciclo->IdCicloAcademico)->first();
													if($cxc->IdCicloAcademico == $idCicloAcademico->IdCicloAcademico){
														$horarios = TimeTable::where('IdCursoxCiclo', $cxc->IdCursoxCiclo)->get()->pluck('IdHorario');
														$calificiones = Score::whereIn('IdHorario',$horarios)->where('IdCriterio', $criterio->IdCriterio)->get();

														$idCiclos = FacultyxCycle::where('IdPeriodo', $request['periodo'])->get()->pluck('IdCicloAcademico');
														$ciclos = AcademicCycle::whereIn('IdCicloAcademico',$idCiclos)->get();
														
														$resM['nombre'] = $ciclo->Descripcion;
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

														$resM['resultado'] = $resultado;
														
														array_push($curs['resultadoxciclo'], $resM);	
													}	
												}
												array_push($resultadosMedicion['cursos'], $curs);
											}
											$nrows = count($resultadosMedicion['cursos']);
											if($nrows == 0){
												$nrows = 1;
											}
											$resultadosMedicion['cantRows'] = $nrows;
											$totalRows += $resultadosMedicion['cantRows'];							
											array_push($resultadosxCriterio['criterios'], $resultadosMedicion);
										}
										
										if($totalRows == 0){
											$totalRows = 1;
										}
										$resultadosxCriterio['cantRows'] = $totalRows;
										$totalRowsR += $totalRows;
										array_push($resultadosxRE['aspectos'], $resultadosxCriterio);

									}	
									$resultadosxRE['cantRows'] = $totalRowsR;
									array_push($resultadosGlobales['resultados'], $resultadosxRE);						
								}
								
								$data['tipoFiltro'] = 5;
								$data['resultadosMedicion'] = $resultadosGlobales;
					}

				}
				else{ // no selecciona resultado, a partir de resultado -> todo
					//resultados del periodo
					$resultados = $this->studentResultService->retrieveAllByFacultyByPeriod($request['periodo']);
					$names = [];
					foreach ($resultados as $r) {
						array_push($names, $r->IdResultadoEstudiantil);
					}

					$resultadosGlobales['periodo'] = $request['periodo'];
					$resultadosGlobales['resultados'] = [];
					foreach ($resultados as $res) {
						//aspectos del resultado
						$aspectos = Aspect::where('IdResultadoEstudiantil', $res->IdResultadoEstudiantil)->get();
						$resultadosxRE['resultadoEstudiantil'] = $res->Descripcion;
						$resultadosxRE['aspectos'] = [];

						$totalRowsR = 0;
						foreach ($aspectos as $aspecto) {
							//criterios del aspecto seleccionado
							$criterios = Criterion::where('IdAspecto', $aspecto->IdAspecto)->get();

							$resultadosxCriterio['aspecto'] = $aspecto->Nombre;
							$resultadosxCriterio['criterios'] = [];
							$totalRows = 0;

							foreach ($criterios as $criterio) {								
								//cursos
								$idsCurso = Contribution::where('IdResultadoEstudiantil', $res->IdResultadoEstudiantil)->get()->pluck('IdCurso');
								//$cursosxCiclo = DictatedCourses::whereIn('IdCurso', $idsCurso)->where('IdCicloAcademico', $ciclo->IdCicloAcademico)->get();
								$cursosxCiclo = DictatedCourses::whereIn('IdCurso', $idsCurso)->get();

								$resultadosMedicion['criterio'] = $criterio->Nombre;
								$resultadosMedicion['cursos'] = [];
								foreach ($cursosxCiclo as $cxc) {
									$curso = Course::where('IdCurso', $cxc->IdCurso)->first();
									$curs['nombre'] = $curso->Codigo.' - '.$curso->Nombre;
									$curs['resultadoxciclo'] = [];
									foreach ($ciclos as $ciclo) { //compara el ciclo del cursoxciclo con cada ciclo del periodo elegido
										$idCicloAcademico = FacultyxCycle::where('IdCiclo',$ciclo->IdCicloAcademico)->first();
										if($cxc->IdCicloAcademico == $idCicloAcademico->IdCicloAcademico){
											$horarios = TimeTable::where('IdCursoxCiclo', $cxc->IdCursoxCiclo)->get()->pluck('IdHorario');
											$calificiones = Score::whereIn('IdHorario',$horarios)->where('IdCriterio', $criterio->IdCriterio)->get();
											
											$resM['nombre'] = $ciclo->Descripcion;
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

											$resM['resultado'] = $resultado;
											
											array_push($curs['resultadoxciclo'], $resM);	
										}	
									}
									array_push($resultadosMedicion['cursos'], $curs);
								}
								$nrows = count($resultadosMedicion['cursos']);
								if($nrows == 0){
									$nrows = 1;
								}
								$resultadosMedicion['cantRows'] = $nrows;
								$totalRows += $resultadosMedicion['cantRows'];							
								array_push($resultadosxCriterio['criterios'], $resultadosMedicion);
							}
							
							if($totalRows == 0){
								$totalRows = 1;
							}
							$resultadosxCriterio['cantRows'] = $totalRows;
							$totalRowsR += $totalRows;
							array_push($resultadosxRE['aspectos'], $resultadosxCriterio);
						}	
						$resultadosxRE['cantRows'] = $totalRowsR;
						array_push($resultadosGlobales['resultados'], $resultadosxRE);						
					}
					
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
