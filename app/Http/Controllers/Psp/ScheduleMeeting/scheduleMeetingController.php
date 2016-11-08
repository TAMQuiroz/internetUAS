<?php

namespace Intranet\Http\Controllers\Psp\ScheduleMeeting;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Http\Requests;
use Intranet\Models\Schedule_meetings;
use Intranet\Http\Requests\ScheduleMeetingRequest;
use Intranet\Models\Phase;
use Intranet\Models\Teacher;
use Intranet\Models\PspProcessxTeacher;
use Intranet\Models\PspProcess;
use Auth;
use Carbon\Carbon;


class scheduleMeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(Auth::User()->IdPerfil==3){  
                $schedules = Schedule_meetings::get();
                if(count($schedules)!=0){
                    $data = [
                        'Schedules'    =>  $schedules,
                    ];
                }else{
                    $proc = PspProcess::get();
                    foreach($proc as $p){
                        $scheduleA                   = new Schedule_meetings;
                        $scheduleA->tipo          = "Alumno-Supervisor";
                        $scheduleA->idpspprocess = $p->id;
                        $scheduleA->save();
                        $scheduleB                   = new Schedule_meetings;
                        $scheduleB->tipo          = "Jefe-Supervisor";
                        $scheduleB->idpspprocess = $p->id;
                        $scheduleB->save();
                    }                    
                    $schedules = Schedule_meetings::get();
                    $data = [
                        'Schedules'    =>  $schedules,
                    ];
                }
            } else if (Auth::User()->IdPerfil==2 || Auth::User()->IdPerfil==1){
                $teacher = Teacher::where('IdUsuario',Auth::User()->IdUsuario)->first(); 
                $procxt= PspProcessxTeacher::where('iddocente',$teacher->IdDocente)->get(); 
                $proc = array(); 
                $r = count($procxt);   
                if($r>0){
                foreach($procxt as $p){
                    $proc2=null;                
                    $proc2=Schedule_meetings::where('idpspprocess',$p->idpspprocess)->get();
                    if(count($proc2)!=0){
                        foreach($proc2 as $p2){ 
                            $proc[]=Schedule_meetings::find($p2->id);                            
                        }
                    }else{
                        $scheduleA                   = new Schedule_meetings;
                        $scheduleA->tipo          = "Alumno-Supervisor";
                        $scheduleA->idpspprocess = $p->id;                        
                        $scheduleA->save();
                        $scheduleB                   = new Schedule_meetings;
                        $scheduleB->tipo          = "Jefe-Supervisor";
                        $scheduleB->idpspprocess = $p->id;
                        $scheduleB->save();                                            
                        $proc[]=$scheduleA; 
                        $proc[]=$scheduleB; 
                    } 
                }
                $schedules =$proc;
                $data = [
                'Schedules'    =>  $schedules,
                ];
            }
        }    

        return view('psp.scheduleMeeting.index', $data);
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
        $schedule    = Schedule_meetings::find($id);

        $data = [
            'schedule'    =>  $schedule,
        ];
        $data['phases'] = Phase::where('idpspprocess',$schedule->idpspprocess)->get(); 
        return view('psp.scheduleMeeting.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleMeetingRequest $request, $id)
    {
        try {
            //Crear 
            $schedule                   = Schedule_meetings::find($id);
            //$timestamp = strtotime($request['fecha_inicio']); 
            $schedule->fecha_inicio      = date("Y-m-d",strtotime($request['fecha_inicio']));
            $schedule->fecha_fin      = date("Y-m-d",strtotime($request['fecha_fin']));
            $phase = Phase::find($request['fase']);
            //dd($schedule);
            //dd($phase);
            if($phase!=null){
            if(($phase->fecha_inicio>=$schedule->fecha_inicio)||($schedule->fecha_inicio>=$phase->fecha_fin)){
                            return redirect()->back()->with('warning', 'La semana de reuniones esta fuera del rango de fechas de la fase');
                        }
            if(($phase->fecha_inicio>=$schedule->fecha_fin)
                            ||($schedule->fecha_fin>=$phase->fecha_fin)){
                            return redirect()->back()->with('warning', 'La semana de reuniones esta fuera del rango de fechas de la fase');
                        }
            } 
            $schedule->idfase=$phase->id;          
            $schedule->save();

            return redirect()->route('scheduleMeeting.index')->with('success', 'La semana de reuniones se ha actualizado exitosamente');
        } catch (Exception $e){
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
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
