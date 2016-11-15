<?php

namespace Intranet\Http\Controllers\Psp\Aspecto;

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
use Auth;

class AspectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $supervisor = Supervisor::where('idUser',Auth::User()->IdUsuario)->first();
        $students = PspStudent::where('idsupervisor',$supervisor->id)->get();

        $data = [
            'students'    =>  $students,
        ];
        return view('psp.student.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idAlumno)
    {
        $user = Session::get('user');
        $supervisor = Supervisor::find($user->id);
        $pspProceso = PspProcess::find($supervisor->idpspprocess);
        $criterios  = $pspProceso->criterios;
        //$cursoxciclo = CoursexCycle::where('IdCurso',$pspProceso->idcurso)->first();
        //echo " idcurso ".$pspProceso->idcurso;
        //$criterios = CoursexCyclexCriterion::where('IdCursoxCiclo', $cursoxciclo->IdCursoxCiclo)->get();
        //echo " idcursoxciclo ".$cursoxciclo->IdCursoxCiclo;

        $registroNotas = Pspstudentsxcriterios::where('idpspstudent',$idAlumno)->get();
        
        //$crit_aux       = Criterion::find($id);
        
        $data = [
            'crit'    =>  $criterios,
            'idAlumno' => $idAlumno,
            'registroNotas' => $registroNotas,
            //'crit_aux' => $crit_aux,
        ];
        return view('psp.aspecto.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idAlumno)
    {
        $listaNotas = $request->input("nota",[]);
        foreach ($listaNotas as $idCrit => $valorNota) {
            //echo "$idCrit"." ".$valorNota."<br>";
        }
        try {
               $listaNotas = $request->input("nota",[]);
                foreach ($listaNotas as $idCrit => $valorNota) {

                    $p = Pspstudentsxcriterios::where('idpspstudent',$idAlumno)->where('idcriterio',$idCrit)->first();
                    //dd($p);
                    if ($p == null){
                        $pspstudentxcriterios  = new Pspstudentsxcriterios;
                        $pspstudentxcriterios->idpspstudent = $idAlumno;
                        $pspstudentxcriterios->idcriterio = $idCrit;
                        $pspstudentxcriterios->nota = $valorNota;
                        $pspstudentxcriterios->save();
                    } else {
                        $pN = Pspstudentsxcriterios::find($p->id);
                        $pN->nota = $valorNota;
                        $pN->save();
                    }
                }
                return redirect()->route('student.index')->with('success', 'La información se ha registrado exitosamente');                
            }catch (Exception $e){
                 return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }         
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
        $criterios = CoursexCyclexCriterion::where('IdCursoxCiclo', 22)->get();
        //$crit_aux       = Criterion::find($id);
        $crit = [];
        foreach ($criterios as $c) {
            $criterio = Criterion::find($c->IdCriterio);
            $crit[$c->IdCriterio]=$criterio->Nombre;
        }

        $data = [
            'crit'    =>  $crit,
            //'crit_aux' => $crit_aux,
        ];
        return view('psp.aspecto.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CriterioRequest $request, $id)
    {
        try {
            //Crear 
            $criterios                   = Criterio::find($id);
            $criterios->Nombre          = $request['Nombre'];
            $criterios->Estado          = $request['Estado'];            
            
            $criterios->save();

            return redirect()->route('student.index')->with('success', 'Las notas por criterio asignadas al alumno se han actualizado exitosamente');
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
