<?php namespace Intranet\Http\Controllers\Consolidated;

use Intranet\Http\Services\Faculty\FacultyService;
use Intranet\Http\Services\Period\PeriodService;
use Intranet\Models\Wrappers\EvaluatedPerformanceMatrixLine;
use Intranet\Models\Wrappers\EvaluatedPerformanceMatrixLineDetail;
use Intranet\Http\Services\StudentsResult\StudentsResultService;
use Intranet\Http\Services\TimeTable\TimeTableService;
use View;
use Session;
use Illuminate\Routing\Controller as BaseController;

use PDF;
use Barryvdh\Snappy;
use Carbon;

class ResultsController extends BaseController {
    protected $studentResultsService;
    protected $timeTableService;
    protected $facultyService;
    protected $periodService;

    public function __construct() {
        $this->studentResultsService = new StudentsResultService();
        $this->timeTableService = new TimeTableService();
        $this->facultyService = new FacultyService();
        $this->periodService = new PeriodService();
    }

    //momentaneous "branched" test for the multiple cycle data
    public function index() {
        try{
            //primero sacamos todos los resultados estudiantiles de este ciclo
            $studentResults = $this->studentResultsService->findResultEvaluated();
            //Luego sacamos tambien los datos de configuracion de la especialidad para poder realizar los calculos
            $data['currentPeriod'] = $conf = $this->facultyService->findConfFaculty(Session::get('faculty-code'), Session::get('period-code'));
            $data['periods'] = $this->periodService->getAll(Session::get('faculty-code'));
            $data['inYoRush'] = $cyclesInBetween = $this->periodService->findAllCyclesInBetweenPeriod(
                $conf->cycleAcademicStart->Descripcion, $conf->cycleAcademicEnd->Descripcion);
            $data['superMatrixHolder'] = [];

            foreach($cyclesInBetween as $cycle){
                $matrixLines = [];
                if($studentResults!=null){
                    foreach($studentResults as $studentResult){
                        $evaluatedPerformanceMatrixLine = new EvaluatedPerformanceMatrixLine();
                        $evaluatedPerformanceMatrixLine ->studentResult = $studentResult;

                        $acumulatedAspectGrade = 0;
                        $aspectIterations = 0;
                        //sacamos los aspectos de los resultados estudiantiles
                        if($studentResult->aspects !=null){
                            foreach ($studentResult->aspects as $aspect){
                                $acumulatedCriterionGrade = 0;
                                $iterations = 0;
                                $evaluatedPerformanceMatrixLineDetail = []; //For the details of such aspects

                                foreach ($aspect->criterion as $criterion){
                                    $scores = $this->timeTableService->findScoresByCriterionAndCycle($criterion->IdCriterio, $cycle);
                                    $countPassed = 0;
                                    $total = 0;
                                    //luego sacamos los alumnos x criterio
                                    foreach ($scores as $score){
                                        //finalmente vemos cuales pasaron y cuales no y calculamos el porcentaje de cada criterio
                                        if($conf->NivelEsperado <= $score->Nota){
                                            $countPassed++;
                                        }
                                        $total++;
                                    }
                                    $criteria = new EvaluatedPerformanceMatrixLineDetail();
                                    array_push($criteria->criterions, $criterion);
                                    if($total>0){array_push($criteria->criterionsRating, $countPassed/ $total);}
                                    else{ // when there are no grades at all.
                                        array_push($criteria->criterionsRating, 0);
                                    }
                                    array_push($evaluatedPerformanceMatrixLineDetail, $criteria);

                                    if($total>0){$acumulatedCriterionGrade += $countPassed/ $total;}
                                    $iterations++;
                                }

                                $acumulatedAspectGrade += ($acumulatedCriterionGrade / $iterations);
                                $aspectIterations ++;
                                array_push($evaluatedPerformanceMatrixLine->aspects, $aspect);
                                if($iterations>0){array_push($evaluatedPerformanceMatrixLine->aspectsRating, $acumulatedCriterionGrade / $iterations);}
                                else{array_push($evaluatedPerformanceMatrixLine->aspectsRating, 0);}
                                array_push($evaluatedPerformanceMatrixLine->aspectsDetail, $evaluatedPerformanceMatrixLineDetail);
                            }
                        }
                        $evaluatedPerformanceMatrixLine->studentResult =$studentResult;
                        if($aspectIterations>0){$evaluatedPerformanceMatrixLine->studentResultRating = $acumulatedAspectGrade /$aspectIterations;}
                        //Aplicamos regla de 3 simple para los resultados estudiantiles
                        array_push($matrixLines, $evaluatedPerformanceMatrixLine );
                    }
                }//return redirect()->route('index.consolidated.results')->with('success', 'El curso se ha registrado exitosamente');
                array_push($data['superMatrixHolder'], $matrixLines);
            }
        }catch(\Exception $e){
            //dd($e);
            $data['currentPeriod'] = [];
            $data['periods'] = [];
            $data['inYoRush'] = [];
            $data['superMatrixHolder'] = [];
        }
        return view('consolidated.results.index', $data);
    }


    public function indexAll() {
        //primero sacamos todos los resultados estudiantiles de este ciclo
        $studentResults = $this->studentResultsService->findResultEvaluated();
        //Luego sacamos tambien los datos de configuracion de la especialidad para poder realizar los calculos
        $conf= $this->facultyService->findConfFaculty(Session::get('faculty-code'), Session::get('period-code'));

        $data['inYoRush'] = $cyclesInBetween = $this->periodService->findAllCyclesInBetweenPeriod(
            $conf->cycleAcademicStart->Descripcion, $conf->cycleAcademicEnd->Descripcion);

        $data['periods'] = $this->periodService->getAll(Session::get('faculty-code'));
        $data['matrixLines'] = [];

        if($studentResults!=null){
            foreach($studentResults as $studentResult){
                $evaluatedPerformanceMatrixLine = new EvaluatedPerformanceMatrixLine();
                $evaluatedPerformanceMatrixLine ->studentResult = $studentResult;

                $acumulatedAspectGrade = 0;
                $aspectIterations = 0;
                //sacamos los aspectos de los resultados estudiantiles
                if($studentResult->aspects !=null){
                    foreach ($studentResult->aspects as $aspect){
                        $acumulatedCriterionGrade = 0;
                        $iterations = 0;
                        $evaluatedPerformanceMatrixLineDetail = []; //For the details of such aspects

                        foreach ($aspect->criterion as $criterion){
                            $scores = $this->timeTableService->findScoresByCriterion($criterion->IdCriterio);
                            $countPassed = 0;
                            $total = 0;
                            //luego sacamos los alumnos x criterio
                            foreach ($scores as $score){
                                //finalmente vemos cuales pasaron y cuales no y calculamos el porcentaje de cada criterio
                                if($conf->NivelEsperado <= $score->Nota){
                                    $countPassed++;
                                }
                                $total++;
                            }
                            $criteria = new EvaluatedPerformanceMatrixLineDetail();
                            array_push($criteria->criterions, $criterion);
                            if($total>0){array_push($criteria->criterionsRating, $countPassed/ $total);}
                            else{ //in case there is not a single grade registered
                                array_push($criteria->criterionsRating, 0);
                            }
                            array_push($evaluatedPerformanceMatrixLineDetail, $criteria);

                            if($total>0){$acumulatedCriterionGrade += $countPassed/ $total;}
                            $iterations++;
                        }

                        $acumulatedAspectGrade += $acumulatedCriterionGrade / $iterations;
                        $aspectIterations ++;
                        array_push($evaluatedPerformanceMatrixLine->aspects, $aspect);
                        if($iterations>0){array_push($evaluatedPerformanceMatrixLine->aspectsRating, $acumulatedCriterionGrade / $iterations);}
                        array_push($evaluatedPerformanceMatrixLine->aspectsDetail, $evaluatedPerformanceMatrixLineDetail);
                    }
                }
                $evaluatedPerformanceMatrixLine->studentResult =$studentResult;
                if($aspectIterations>0){$evaluatedPerformanceMatrixLine->studentResultRating = $acumulatedAspectGrade /$aspectIterations;}
                //Aplicamos regla de 3 simple para los resultados estudiantiles
                array_push($data['matrixLines'], $evaluatedPerformanceMatrixLine );
            }
        }
        return view('consolidated.results.index', $data);
    }

    public function downloadAsPdf() {
        //primero sacamos todos los resultados estudiantiles de este ciclo
        $studentResults = $this->studentResultsService->findResultEvaluated();
        //Luego sacamos tambien los datos de configuracion de la especialidad para poder realizar los calculos
        $data['currentPeriod'] = $conf = $this->facultyService->findConfFaculty(Session::get('faculty-code'), Session::get('period-code'));
        $data['periods'] = $this->periodService->getAll(Session::get('faculty-code'));
        $data['inYoRush'] = $cyclesInBetween = $this->periodService->findAllCyclesInBetweenPeriod(
            $conf->cycleAcademicStart->Descripcion, $conf->cycleAcademicEnd->Descripcion);
        $data['superMatrixHolder'] = [];

        foreach($cyclesInBetween as $cycle){
            $matrixLines = [];
            if($studentResults!=null){
                foreach($studentResults as $studentResult){
                    $evaluatedPerformanceMatrixLine = new EvaluatedPerformanceMatrixLine();
                    $evaluatedPerformanceMatrixLine ->studentResult = $studentResult;

                    $acumulatedAspectGrade = 0;
                    $aspectIterations = 0;
                    //sacamos los aspectos de los resultados estudiantiles
                    if($studentResult->aspects !=null){
                        foreach ($studentResult->aspects as $aspect){
                            $acumulatedCriterionGrade = 0;
                            $iterations = 0;
                            $evaluatedPerformanceMatrixLineDetail = []; //For the details of such aspects

                            foreach ($aspect->criterion as $criterion){
                                $scores = $this->timeTableService->findScoresByCriterionAndCycle($criterion->IdCriterio, $cycle);
                                $countPassed = 0;
                                $total = 0;
                                //luego sacamos los alumnos x criterio
                                foreach ($scores as $score){
                                    //finalmente vemos cuales pasaron y cuales no y calculamos el porcentaje de cada criterio
                                    if($conf->NivelEsperado <= $score->Nota){
                                        $countPassed++;
                                    }
                                    $total++;
                                }
                                $criteria = new EvaluatedPerformanceMatrixLineDetail();
                                array_push($criteria->criterions, $criterion);
                                if($total>0){array_push($criteria->criterionsRating, $countPassed/ $total);}
                                else{ // when there are no grades at all.
                                    array_push($criteria->criterionsRating, 0);
                                }
                                array_push($evaluatedPerformanceMatrixLineDetail, $criteria);

                                if($total>0){$acumulatedCriterionGrade += $countPassed/ $total;}
                                $iterations++;
                            }

                            $acumulatedAspectGrade += ($acumulatedCriterionGrade / $iterations);
                            $aspectIterations ++;
                            array_push($evaluatedPerformanceMatrixLine->aspects, $aspect);
                            if($iterations>0){array_push($evaluatedPerformanceMatrixLine->aspectsRating, $acumulatedCriterionGrade / $iterations);}
                            else{array_push($evaluatedPerformanceMatrixLine->aspectsRating, 0);}
                            array_push($evaluatedPerformanceMatrixLine->aspectsDetail, $evaluatedPerformanceMatrixLineDetail);
                        }
                    }
                    $evaluatedPerformanceMatrixLine->studentResult =$studentResult;
                    if($aspectIterations>0){$evaluatedPerformanceMatrixLine->studentResultRating = $acumulatedAspectGrade /$aspectIterations;}
                    //Aplicamos regla de 3 simple para los resultados estudiantiles
                    array_push($matrixLines, $evaluatedPerformanceMatrixLine );
                }
            }//return redirect()->route('index.consolidated.results')->with('success', 'El curso se ha registrado exitosamente');
            array_push($data['superMatrixHolder'], $matrixLines);
        }//return redirect()->route('index.consolidated.results')->with('success', 'El curso se ha registrado exitosamente');

        $mytime = Carbon\Carbon::now()->format('d-m-Y');

        $pdf = PDF::loadView('consolidated.results.indexPdf', $data);
        return $pdf->download('Consolidado de Resultados de Medición '.$mytime.'.pdf');
    }

}