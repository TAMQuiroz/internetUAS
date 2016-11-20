<?php

namespace Intranet\Http\Controllers\Tutorship\TutSchedule;

use Illuminate\Http\Request;
use Intranet\Http\Requests;
use Illuminate\Support\Facades\DB;
use Intranet\Http\Controllers\Controller;
use Intranet\Models\Teacher;
use Intranet\Models\TutSchedule;
use Intranet\Models\TutMeeting;
use Intranet\Models\NoAvailability;
use Illuminate\Support\Facades\Session;

class TutScheduleController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user = Session::get('user');
        $teacher = Teacher::find($user->IdDocente);
        $tutSchedule = TutSchedule::where('id_docente', $teacher->IdDocente)->get();
        $horas = $tutSchedule->count();

        $data = [
            'teacher' => $teacher,
            'horas' => $horas,
        ];

        return view('tutorship.tutschedule.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $teacher = Teacher::find($id);
        $tutSchedule = TutSchedule::where('id_docente', $id)->get();
        $noDisponibilidades = NoAvailability::where('id_docente', $id)->get();

        $today = date('d-m-Y');
        $futureDay = date('d-m-Y', strtotime($today . '+185 day'));

        $data = [
            'teacher' => $teacher,
            'tutSchedule' => $tutSchedule,
            'startDate' => $today,
            'endDate' => $today,
            'futureDay' => $futureDay,
            'noDisponibilidades' => $noDisponibilidades,
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
    public function update(Request $request, $id) {
        $teacher = Teacher::find($id);
        $teacher->telefono = $request['telefono'];
        $teacher->oficina = $request['oficina'];
        $teacher->anexo = $request['anexo'];
        $teacher->save();

        $tutSchedule = TutSchedule::where('id_docente', $id)->get();
        if ($tutSchedule->count() != 0) { //si encuentra horarios del profe
            foreach ($tutSchedule as $t) {
                $scheduleTrash = TutSchedule::find($t->id);
                $scheduleTrash->forceDelete();
            }
        }

        $checkedSchedules = $request->input("check", []);
        foreach ($checkedSchedules as $diaHora => $value) {
            $schedule = new TutSchedule;
            $schedule->dia = substr($diaHora, 0, 1);
            $schedule->hora_inicio = substr($diaHora, 1, 2) . ":00:00";
            $schedule->hora_fin = (intval(substr($diaHora, 1, 2)) + 1) . ":00:00";
            $schedule->id_docente = $id;
            $schedule->save();
        }

        $noDispAnt = NoAvailability::where('id_docente', $id)->get();
        foreach ($noDispAnt as $n) {
            $noDispTrash = NoAvailability::find($n->id);
            $noDispTrash->delete();
        }
        
        $citas = TutMeeting::where('id_docente', $id)->where('estado', 2)->get();
        $fechasHasta = $request->input("fechaHasta", []);
        $fechasDesde = $request->input("fechaDesde", []);
        foreach ($fechasDesde as $num => $fechaDesde) {
            $noDisp = new NoAvailability;
            $noDisp->fecha_inicio = substr($fechaDesde, 6, 4) . substr($fechaDesde, 3, 2) . substr($fechaDesde, 0, 2);
            $noDisp->fecha_fin = substr($fechasHasta[$num], 6, 4) . substr($fechasHasta[$num], 3, 2) . substr($fechasHasta[$num], 0, 2);
            $noDisp->id_docente = $id;
            $noDisp->save();
            
            $fDesde = intval(substr($fechaDesde, 6, 4))*10000 + intval(substr($fechaDesde, 3, 2))*100 + intval(substr($fechaDesde, 0, 2));
            $fHasta = intval(substr($fechasHasta[$num], 6, 4))*10000 + intval(substr($fechasHasta[$num], 3, 2))*100 + intval(substr($fechasHasta[$num], 0, 2));
            
            foreach($citas as $c) {
                $fCita = intval(substr($c->inicio,0,4))*10000 + intval(substr($c->inicio,5,2))*100 + intval(substr($c->inicio,8,2));
                
                if ($fCita>=$fDesde && $fCita<=$fHasta && $c->estado==2) {
                    $cita = TutMeeting::find($c->id);
                    $cita->estado=3;
                    $cita->id_reason=2;
                    $cita->save();
                }
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
    public function destroy($id) {
        //
    }

}
