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
        $horarios = [];
        
        if ($alumno->tutorship) {
            $tutor = $alumno->tutorship->tutor;
            $horarios = TutSchedule::where('id_docente', $tutor->IdDocente)->orderBy('dia', 'asc')->orderBy('hora_inicio', 'asc')->get();
        } else {
            $tutor = null;
        }

        
        $data = [
            'tutor' => $tutor,
            'horarios' => $horarios,            
        ];
        return view('tutorship.mytutor.index', $data);
    }

}
