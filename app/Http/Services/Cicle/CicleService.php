<?php namespace Intranet\Http\Services\Cicle;

use DB;
use Session;
use Intranet\Models\Cicle;
use Intranet\Models\Period;
use Intranet\Models\AcademicCycle;

class CicleService
{
    public function retrieveAll($orderBy = 'desc') {
        return Cicle::orderBy('FechaInicio', $orderBy)
                    ->with('academicCycle')
                    ->where('IdEspecialidad', Session::get('faculty-code'))
                    ->get();
    }

    public function findCicle($request) {
        $cicle = Cicle::where('IdCiclo', $request['cicle_code'])->first();
        return $cicle;
    }

    public function findActualCicle() {
        $cicle = Cicle::where('Vigente', '1')->first();
        return $cicle;
    }

    public function createCicle($request) {
        $cicle = Cicle::create([
            'Descripcion' => $request['cicle_descripcion']
        ]);

    }

    public function updateCicle($request) {
        $cicle = Cicle::where('IdCicloAcademico', $request['cicle_code'])
            ->where('deleted_at', null)
            ->update('Descripcion', $request['cicle_descripcion']);
    }

    public function getCicleByPeriod($period_id)
    {
        return Cicle::where('IdPeriodo', $period_id)->where('deleted_at', null)->where('Vigente',1)->with('academicCycle')->orderBy('FechaInicio', 'asc')->get();
    }

    public function deleteCicle($request) {
        $cicle = Cicle::where('IdCicloAcademico', $request['cicle_code'])
        ->where('deleted_at', null);
        $cicle->delete();
    }
}