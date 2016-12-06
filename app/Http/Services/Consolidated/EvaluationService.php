<?php namespace Intranet\Http\Services\Consolidated;

use Intranet\Models\Schedule;
use Intranet\Models\Teacher;
use Intranet\Models\Faculty;
use Intranet\Models\User;
use Intranet\Models\Accreditor;
use Intranet\Models\AcademicCycle;
use Intranet\Models\Cicle;
use Intranet\Models\CyclexResult;
use Intranet\Models\DictatedCourses;
use Intranet\Models\Contribution;
use DB;
use Session;

class EvaluationService {

    public function getAllAcademicCycles() {

        $ciclesAcademics =  DB::table('CicloAcademico')->where('deleted_at', null)
            ->get();
        return $ciclesAcademics;
    }

    public function getAllAcademicCycles2() {
        $cicles = DB::table('CicloxEspecialidad')->where('deleted_at', null)->where('IdEspecialidad', Session::get('faculty-code'))->first();
        //dd($cicles);
        $ciclesAcademics =  DB::table('CicloAcademico')->where('deleted_at', null)->where('IdCicloAcademico',$cicles->IdCiclo)->get();
        //dd($ciclesAcademics);
        return $ciclesAcademics;
    }

    public function getCycles() {

        /*
        $ciclesAcademics =  DB::table('CicloAcademico')
            ->whereIn('IdCicloAcademico', DB::table('CicloxEspecialidad')
                ->select('CicloxEspecialidad.IdCiclo')
                ->where('CicloxEspecialidad.Vigente','=', 1)
                ->where('CicloxEspecialidad.IdEspecialidad','=',Session::get('faculty-code')))
            ->get();
        */
        $ciclesAcademics = AcademicCycle::where('IdEspecialidad', Session::get('faculty-code'))
            ->where("deleted_at", null)->get();

        return $ciclesAcademics;
    }

    public function getCycle($request){
        $cycle = AcademicCycle::where('IdCicloAcademico', $request['cycle'])->first();
        return $cycle;
    }

    public function getResults($request){
        $cyclexspecialty = Cicle::where('IdCiclo', $request['cycle'])
            ->where('IdEspecialidad', Session::get('faculty-code'))->first();

        $cyclexresult = CyclexResult::where('IdCicloAcademico', $cyclexspecialty->IdCicloAcademico)->get();

        return $cyclexresult;
    }

    public function getCourses($request){
        $cyclexspecialty = Cicle::where('IdCiclo', $request['cycle'])
            ->where('IdEspecialidad', Session::get('faculty-code'))->first();

        $dictatedcourses = DictatedCourses::where('IdCicloAcademico', $cyclexspecialty->IdCicloAcademico)->get();

        return $dictatedcourses;
    }

    public function getContribution($request){
        $cyclexspecialty = Cicle::where('IdCiclo', $request['cycle'])
            ->where('IdEspecialidad', Session::get('faculty-code'))->first();

        $contri = Contribution::orderby('IdResultadoEstudiantil','ASC')->get();

        $contribution = array();

        for($i=0; $i<count($contri); $i++){
            if($contri[$i]->courses->IdEspecialidad == Session::get('faculty-code')){
                    array_push($contribution, $contri[$i]);
            }
        }

        return $contribution;
    }

    public function getSchedules($facultyId, $academicCycle)
    {
        $selectedSchedules = [];
        //non deleted validation
        $schedules = Schedule::where("deleted_at", null)->get();
        //still evaluated validation
        foreach($schedules as $schedule){
            if($schedule->coursexcycle != null){
                if(($schedule->coursexcycle->cycle->IdCicloAcademico == $academicCycle->IdCicloAcademico) &&
                    ($schedule->coursexcycle->course->faculty->IdEspecialidad == $facultyId)){
                    array_push($selectedSchedules, $schedule);
                }
            }
        }
        return $selectedSchedules;
    }
}