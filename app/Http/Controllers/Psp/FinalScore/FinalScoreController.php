<?php

namespace Intranet\Http\Controllers\Psp\FinalScore;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Intranet\Models\Student;
use Intranet\Models\Aspect; /*ya existia en el uas */
use Intranet\Models\User;
use Intranet\Models\Pspstudentsxcriterios;
use Intranet\Models\Supervisor;
use Intranet\Models\PspDocument;
use Intranet\Models\Criterion;
use Intranet\Models\CoursexCycle;
use Intranet\Models\PspProcess;
use Intranet\Models\CoursexCyclexCriterion;
use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;
use Intranet\Models\PspStudent;
use Intranet\Models\Pspcriterio;
use Intranet\Models\Studentxinscriptionfiles;
use Auth;

class FinalScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idAlumno)
    {
        $user = Session::get('user');
        $supervisor = Supervisor::find($user->id);
        $pspProceso = PspProcess::find($supervisor->idpspprocess);
        $criterios  = $pspProceso->criterios;
        $psp=PspStudent::where('idalumno',$idAlumno)->first(); 
        //dd($psp);
        //$cursoxciclo = CoursexCycle::where('IdCurso',$pspProceso->idcurso)->first();
        //echo " idcurso ".$pspProceso->idcurso;
        //$criterios = CoursexCyclexCriterion::where('IdCursoxCiclo', $cursoxciclo->IdCursoxCiclo)->get();
        //echo " idcursoxciclo ".$cursoxciclo->IdCursoxCiclo;
        $criteriosAlumnos = Pspstudentsxcriterios::where('idpspstudent',$idAlumno)->get();
        $finalScore=0;
        $finalWeight=0;
        //dd($inscriptiofile);
        //dd($criteriosAlumnos);
        foreach ($criteriosAlumnos as $crit) {
            $weightCriterio=Pspcriterio::find($crit->idcriterio);
                    //dd($weightCriterio);
            $finalScore=$crit->nota*$weightCriterio->peso + $finalScore;
            $finalWeight=$weightCriterio->peso + $finalWeight;            
        }
            if($finalWeight!=0) $finalScore = $finalScore/$finalWeight;
            else $finalScore =0;
           $inscriptiofile= Studentxinscriptionfiles::where('idpspstudents',$psp->id)->first();
           //dd($inscriptiofile);
           $inscriptiofile->nota_final=$finalScore;
           //dd($inscriptiofile);
           $inscriptiofile->save();
           $data = [
                    'finalScore'    => $finalScore,
                ];
        return view('psp.finalscorestudent.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


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
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

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
