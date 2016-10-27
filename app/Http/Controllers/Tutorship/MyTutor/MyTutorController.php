<?php

namespace Intranet\Http\Controllers\Tutorship\MyTutor;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Http\Requests;
use Intranet\Models\Tutstudent;
use Intranet\Models\Tutorship;
use Intranet\Models\TutSchedule;
use Auth;

class MyTutorController extends Controller {

    public function index() {
        $codigoAlumno = Auth::user()->Usuario;
        $alumno = Tutstudent::where('codigo', $codigoAlumno)->first();
        if ($alumno->tutorship) {
            $tutor = $alumno->tutorship->tutor;
        } else {
            $tutor = null;
        }

        $horarios = TutSchedule::where('id_docente', $tutor->IdDocente)->orderBy('dia', 'asc')->orderBy('hora_inicio', 'asc')->get();

        $lun = [];
        $mar = [];
        $mie = [];
        $jue = [];
        $vie = [];
        $sab = [];

        foreach ($horarios as $horario) {
            if ($horario->dia == 1) {
                array_push($lun, $horario->hora_inicio);
            }
            if ($horario->dia == 2) {
                array_push($mar, $horario->hora_inicio);
            }
            if ($horario->dia == 3) {
                array_push($mie, $horario->hora_inicio);
            }
            if ($horario->dia == 4) {
                array_push($jue, $horario->hora_inicio);
            }
            if ($horario->dia == 5) {
                array_push($vie, $horario->hora_inicio);
            }
            if ($horario->dia == 6) {
                array_push($sab, $horario->hora_inicio);
            }
        }

        $data = [
            'tutor' => $tutor,
            'horarios' => $horarios,
            'lun' => $lun,
            'mar' => $mar,
            'mie' => $mie,
            'jue' => $jue,
            'vie' => $vie,
            'sab' => $sab,
        ];
        return view('tutorship.mytutor.index', $data);
    }

}
