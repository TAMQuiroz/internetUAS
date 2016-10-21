<?php

namespace Intranet\Http\Controllers\Tutorship\MyTutor;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Http\Requests;
use Intranet\Models\Tutstudent;
use Intranet\Models\Tutorship;
use Auth;

class MyTutorController extends Controller
{
   
    public function index()
    {
        $codigoAlumno = Auth::user()->Usuario;
        $alumno = Tutstudent::where('codigo',$codigoAlumno)->first();
        if($alumno->tutorship){
            $tutor = $alumno->tutorship->tutor;    
        }
        else{
            $tutor = null;
        }        

        $data = [
            'tutor'    =>  $tutor,
        ];
        return view('tutorship.mytutor.index', $data);
    }

    
}
