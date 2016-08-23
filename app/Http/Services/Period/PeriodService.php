<?php

namespace Intranet\Http\Services\Period;

use Intranet\Models\AcademicCycle;
use Intranet\Models\Cicle;
use Intranet\Models\Period;

class PeriodService
{
    public function getAll($faculty_id)
    {
        return Period::where('IdEspecialidad', $faculty_id)
            ->with('configuration')
            ->get();
    }

    public function get($period_id)
    {
        return Period::with('configuration', 'measures')->find($period_id);
    }

    public function getBySemester($semester_id)
    {
        return Cicle::where('IdCicloAcademico', $semester_id)->first()->period->configuration;
    }

    public function findAllCyclesInBetweenPeriod($Descripcion, $DescripcionFinal)
    {
        $incumbentCycles = [];
        $actualDescripcion = $Descripcion;
        while(strcmp($actualDescripcion, $DescripcionFinal) != 0){
            array_push($incumbentCycles, AcademicCycle::where('Descripcion', $actualDescripcion)->where('deleted_at', null)->first());

            $part = explode("-", $actualDescripcion);
            $year = array_values($part)[0];
            $period = array_values($part)[1];
            if($period == 1){
                $period++;
            }else{
                $year++;
                $period = 1;
            }
            $actualDescripcion = $year . "-" . $period;
        }
        array_push($incumbentCycles, AcademicCycle::where('Descripcion', $actualDescripcion)->where('deleted_at', null)->first());
        return $incumbentCycles;
    }
}