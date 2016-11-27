<?php

namespace Intranet\Http\Controllers\Psp\Report;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Http\Requests;
use Intranet\Models\PspProcess;
use Intranet\Models\Pspcriterio;
use Intranet\Models\Pspstudentsxcriterios;
use Intranet\Models\PspProcessxTeacher;
use Intranet\Models\Faculty;
use Intranet\Models\Teacher;
use Intranet\Models\Student;
use Intranet\Models\PspStudent;
use Intranet\Models\User;
use Auth;
use PDF;

class reportPspController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proc=null;
        if(Auth::User()->IdPerfil==3){  
                $proc = PspProcess::get();
            } else {
                $teacher = Teacher::where('IdUsuario',Auth::User()->IdUsuario)->first(); 
                $procxt= PspProcessxTeacher::where('iddocente',$teacher->IdDocente)->get(); 
                $proc = array(); 
                $r = count($procxt);   
            if($r>0){
                foreach($procxt as $p){
                    $proc[]=PspProcess::find($p->idpspprocess);
                }
            }
            //dd($proc);
        }
        $data = [
            'pspproc'    =>  $proc,
        ];
        $rep = null;
        $data['reporte'] = $rep;
        return view('psp.report.reportC',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generate(Request $request)
    {
        $proc=null;
        if(Auth::User()->IdPerfil==3){  
                $proc = PspProcess::get();
            } else {
                $teacher = Teacher::where('IdUsuario',Auth::User()->IdUsuario)->first(); 
                $procxt= PspProcessxTeacher::where('iddocente',$teacher->IdDocente)->get(); 
                $proc = array(); 
                $r = count($procxt);   
            if($r>0){
                foreach($procxt as $p){
                    $proc[]=PspProcess::find($p->idpspprocess);
                }
            }
            //dd($proc);
        }
        $rep = null;
        $students = PspStudent::where('idpspprocess',$request['Proceso_de_Psp'])->get();
       //dd($students);
        $cri = array(); 
        $r = count($cri);   
        //if($r>0){
            foreach($students as $p){
                    $proc2=null;                
                    $proc2=Pspstudentsxcriterios::where('idpspstudent',$p->idalumno)->get();
                    //dd($proc2);
                    $r2 = count($proc2);  
                    if($proc2!=null && $r2>0){
                        foreach($proc2 as $p2){ 
                            if($p2!=null){
                                $cri[]=Pspstudentsxcriterios::find($p2->id);                      
                            }                            
                        }
                    }
            }

        //}
        $rep =$cri;
        //dd($cri);
        $data = [
            'pspproc'    =>  $proc,
        ];
        $data['reporte'] = $rep;
        return view('psp.report.reportC',$data);
    }
    public function genPDF()
    {
        $pdf = PDF::loadView('psp.report.reportC');
        return $pdf->download('pruebitas.pdf');
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

}
