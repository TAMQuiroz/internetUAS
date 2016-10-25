<?php

namespace Intranet\Http\Controllers\Tutorship\TutSchedule;

use Illuminate\Http\Request;
use Intranet\Http\Requests;
use Illuminate\Support\Facades\DB;
use Intranet\Http\Controllers\Controller;
use Intranet\Models\Teacher;
use Intranet\Models\TutSchedule;
use Illuminate\Support\Facades\Session;

class TutScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Session::get('user');     
        $teacher = Teacher::find($user->IdDocente);
        
        $data = [
            'teacher'    =>  $teacher,
        ];
        
        return view('tutorship.tutschedule.index', $data);
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
        $teacher       = Teacher::find($id);
        
        $data = [
            'teacher'    =>  $teacher,
        ];
        
        return view('tutorship.tutschedule.edit', $data);
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
        $teacher = Teacher::find($id);
        $teacher->telefono = $request['telefono'];
        $teacher->oficina = $request['oficina'];
        $teacher->anexo = $request['anexo'];
        $teacher->save();
        
        
        
        if($request['check']!=null){
            
            $tutSchedule = TutSchedule::where('id_docente',$id);
        
            if ($tutSchedule->count()==0) { //si no encuentra horarios del profe
                foreach($request['check'] as $diaHora => $value){
                    $schedule = new TutSchedule;
                    $schedule->dia = substr($diaHora,0,1);
                    $schedule->hora_inicio = substr($diaHora,1,2).":00:00";
                    $schedule->hora_fin = (intval(substr($diaHora,1,2))+1).":00:00";
                    $schedule->id_docente = $id;
                    $schedule->save();
                    echo $diaHora . " "." <br>";                    
                }
            } else { //si encuentra horarios del profe            
                
            }                                 
        }
                
        return redirect()->route('miperfil.index')->with('success', 'Se guardaron los cambios exitosamente');
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
