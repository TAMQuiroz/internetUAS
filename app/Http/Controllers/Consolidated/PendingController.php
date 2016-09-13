<?php

namespace Intranet\Http\Controllers\Consolidated;

use Illuminate\Http\Request;

use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;
use Session;
use Intranet\Models\Faculty;

class PendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::get('academic-cycle')){
            $currentCycle = Session::get('academic-cycle');
            $especialidad = Faculty::find($currentCycle->IdEspecialidad);
            $docentes = $especialidad->teachers;
            $pending = [];

            foreach ($docentes as $docente) {

                $horariosXDocente = $docente->schedules;
                
                foreach ($horariosXDocente as $horarioXDocente) {
                    
                    $horario = $horarioXDocente->timetable;
                    
                    if($horario){

                        if($horario->TotalAlumnos){
                            $status = 1;
                        }else{
                            $status = 0;
                        }

                        array_push($pending, [
                            'horario'   => $horario, 
                            'docente'   => $docente,
                            'status'    => $status
                        ]);
                    }
                }
            }
            //var_dump($pending);

            $data['currentCycle']   = $currentCycle;
            $data['pending']        = $pending;
        }else{
            var_dump('No encontro');
            return redirect()->back()->with('warning', 'Esta especialidad no tiene un ciclo academico activo');
        }

        return view('consolidated.pending.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
