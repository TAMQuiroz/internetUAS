<?php

namespace Intranet\Http\Controllers\API\Period;

use Response;

use Intranet\Models\Period;
use Dingo\Api\Routing\Helpers;
use Intranet\Models\AcademicCycle;
use Intranet\Models\PeriodxObjective;
use Intranet\Models\PeriodxMeasurement;
use Illuminate\Routing\Controller as BaseController;

class PeriodController extends BaseController
{
    use Helpers;

    public function getSemesters($faculty_id)
    {
        $period = Period::where('Vigente', 1)->where('IdEspecialidad', $faculty_id)->with('configuration')->first();

        if(is_null($period)) return response()->json($period);

        $init_semester = $period->configuration->cycleAcademicStart->Numero;
        $end_semester = $period->configuration->cycleAcademicEnd->Numero;
        $period->semesters = AcademicCycle::where('Numero', '>=', $init_semester)
                                          ->where('Numero', '<=', $end_semester)
                                          ->orderBy('Numero', 'asc')
                                          ->get();

        return response()->json($period);
    }

    public function getPeriodList($faculty_id)
    {
        $period = Period::where('IdEspecialidad', $faculty_id)->with('configuration')->orderBy('Vigente', 'desc')->get();

        if(is_null($period)) return response()->json($period);

        $semesterlist = collect();

        foreach($period as &$periodi){
            $init_semester = $periodi->configuration->cycleAcademicStart->Numero;
            $end_semester = $periodi->configuration->cycleAcademicEnd->Numero;


            $semesterlist = AcademicCycle::where('Numero', '>=', $init_semester)
                                          ->where('Numero', '<=', $end_semester)
                                          ->orderBy('Numero', 'asc')
                                          ->get();
            $periodi->semesters = $semesterlist;


        }

        //$period->semesters = $semesterlist;


        return $this->response()->array($period->toArray());
    }

    public function getMeasurementInstOfPeriod($period_id){
      //$date = date('Y-m-d H:i:s', $request->get('since', 0));

      $insts = PeriodxMeasurement::where('IdPeriodo',$period_id)->with('measurement')->get();//where('IdPeriodo',$period_id);//->with('measurement');

      //get();//
      $finalinst = collect();

      foreach($insts as $inst){
        $finalinst->push($inst->measurement);

      }

      if(is_null($insts)) return response()->json($insts);

      //return response()->json($insts);
      return response()->json($finalinst);

      //return $this->response()->array($insts->toArray());
    }



    public function getCyclesofPeriod($period_id){
      $period = Period::where('IdPeriodo', $period_id)->with('configuration')->orderBy('Vigente', 'desc')->first();

      if(is_null($period)) return response()->json($period);

      $init_semester = $period->configuration->cycleAcademicStart->Numero;
        $end_semester = $period->configuration->cycleAcademicEnd->Numero;
        $semesters = AcademicCycle::where('Numero', '>=', $init_semester)
                                          ->where('Numero', '<=', $end_semester)
                                          ->orderBy('Numero', 'asc')
                                          ->get();



      //$cycles = Cicle::where('IdPeriodo',$period_id)->where('IdEspecialidad',$spec_id)->get();

      return response()->json($semesters);
    }



    public function getPeriodbyId($period_id){
      $period = Period::where('IdPeriodo',$period_id)->with('configuration')->first();

      if(is_null($period)) return response()->json($period);

      $init_semester = $period->configuration->cycleAcademicStart->Numero;
        $end_semester = $period->configuration->cycleAcademicEnd->Numero;
        $period->semesters = AcademicCycle::where('Numero', '>=', $init_semester)
                                          ->where('Numero', '<=', $end_semester)
                                          ->orderBy('Numero', 'asc')
                                          ->get();
      
      return response()->json($period);
    }


    public function getEducationalObjectivesofPeriod($period_id, $faculty_id)
    {
      /*
      
        $date = date('Y-m-d H:i:s', $request->get('since', 0));
        $objectives = EducationalObjetive::lastUpdated($date)
                                           ->with('studentsResults')
                                           ->where('idEspecialidad', $faculty_id)
                                           ->get();

                                           */
                                

       $perobjectives = PeriodxObjective::with('educationalObjetive')->where('IdPeriodo',$period_id)->get();
       //return response()->json($perobjectives);

       $objectives = collect();

       foreach($perobjectives as $perobj){
        //return $perobj;
        /*
        $eo = $perobj->educational_objetive;
        return $eo;
        */
        /*
        if($perobj->educational_objetive->IdEspecialidad == $faculty_id){
          $objectives->push($perobj->educational_objetive);
        }
        */
        if($perobj->educationalObjetive->IdEspecialidad == $faculty_id){
           $objectives->push($perobj->educationalObjetive);
         }


       }

        return response()->json($objectives);
    }




}