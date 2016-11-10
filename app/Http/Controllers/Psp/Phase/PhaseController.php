<?php

namespace Intranet\Http\Controllers\Psp\Phase;

use Illuminate\Http\Request;

use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;

use Intranet\Http\Services\User\PasswordService;
use Intranet\Http\Services\User\UserService;

use Intranet\Models\Faculty;
use Intranet\Models\Teacher;
use Intranet\Models\User;
use Intranet\Models\Phase;
use Intranet\Models\PspProcessxTeacher;
use Intranet\Models\PspProcess;

use Intranet\Http\Requests\PhaseRequest;

use Auth;
use Carbon\Carbon;

class PhaseController extends Controller
{
    public function __construct() {
        $this->userService = new UserService;
        $this->passwordService = new PasswordService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Phaseses=null;
        //$Phaseses = Phase::get();
        if(Auth::User()->IdPerfil==3){  
                $Phaseses = Phase::get();
            } else if (Auth::User()->IdPerfil==2 || Auth::User()->IdPerfil==1){
                $teacher = Teacher::where('IdUsuario',Auth::User()->IdUsuario)->first(); 
                //if($teacher!=null){
                    $procxt= PspProcessxTeacher::where('iddocente',$teacher->IdDocente)->get(); 
                    $proc = array(); 
                    $r = count($procxt);   
                    if($r>0){
                    foreach($procxt as $p){
                        $proc2=null;                
                        $proc2=Phase::where('idpspprocess',$p->idpspprocess)->get();
                        $r2 = count($proc2);  
                        if($proc2!=null && $r2>0){
                            foreach($proc2 as $p2){ 
                                if($p2!=null){
                                    $proc[]=Phase::find($p2->id);
                                }
                            }
                        }
                    }
                    $Phaseses=$proc;
                    }
                //}
        }
        $data = [
            'Phaseses'    =>  $Phaseses,
        ];
        return view('psp.Phase.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        if(Auth::User()->IdPerfil==3){  
                $proc = PspProcess::get();
            } else if (Auth::User()->IdPerfil==2 || Auth::User()->IdPerfil==1){
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
        }else{
            $proc=null;
        }
        $data = [
            'pspproc'    =>  $proc,
        ];
        return view('psp.Phase.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhaseRequest $request)
    {
        try {
            //dd($request['fecha_inicio']);
            $Phase                   = new Phase;
            $Phase->numero          = $request['numero'];
            $Phase->descripcion      = $request['descripcion'];
            $Phase->fecha_inicio      = date("Y-m-d",strtotime($request['fecha_inicio']));
            $Phase->fecha_fin      = date("Y-m-d",strtotime($request['fecha_fin']));
            $Phase->idpspprocess = $request['Proceso_de_Psp'];            
            $Phaseses = Phase::where('idpspprocess',$request['Proceso_de_Psp'])->get();
            if($Phaseses!=null){
                foreach($Phaseses as $Phases){
                    if((($Phases->fecha_inicio<$Phase->fecha_inicio)
                        &&($Phase->fecha_inicio<$Phases->fecha_fin))||(($Phases->fecha_inicio<$Phase->fecha_fin)
                        &&($Phase->fecha_fin<$Phases->fecha_fin))){
                        return redirect()->back()->with('warning', 'Ya existe una fase que incluye parte de este rango de fechas para ese Proceso');
                    }
                }       
            }     
            $pspproc=PspProcess::find($Phase->idpspprocess);
            if($pspproc->numero_Fases!=0){
                if(count($Phaseses)+1>$pspproc->numero_Fases)return redirect()->back()->with('warning', 'Se ha alcanzado el numero maximo de fases permitido para este proceso');
            }
            $Phase->save();

            return redirect()->route('phase.index')->with('success', 'La fase se ha registrado exitosamente');
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
        $Phase       = Phase::find($id);

        $data = [
            'Phase'      =>  $Phase,
        ];

        return view('psp.Phase.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phase       = Phase::find($id);

        $data = [
            'phase'      =>  $phase,
        ];
        if(Auth::User()->IdPerfil==3){  
                $proc = PspProcess::get();
            } else if (Auth::User()->IdPerfil==2|| Auth::User()->IdPerfil==1){
                $proc = array();                     
                $proc[]=PspProcess::find($phase->idpspprocess);           
        }
        $data['pspproc'] = $proc;
        return view('psp.Phase.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhaseRequest $request, $id)
    {
        try {
            //Crear 
            $Phase                   = Phase::find($id);
            $Phase->numero           = $request['numero'];
            $Phase->descripcion           = $request['descripcion'];
            $Phase->fecha_inicio      = date("Y-m-d",strtotime($request['fecha_inicio']));
            $Phase->fecha_fin      = date("Y-m-d",strtotime($request['fecha_fin']));
            $Phase->idpspprocess = $request['Proceso_de_Psp'];            
            $Phaseses = Phase::where('idpspprocess',$request['Proceso_de_Psp'])->get();
            if($Phaseses!=null){
                foreach($Phaseses as $Phases){
                    if($Phase->id!=$Phases->id){
                        if((($Phases->fecha_inicio<$Phase->fecha_inicio)&&($Phase->fecha_inicio<$Phases->fecha_fin))||(($Phases->fecha_inicio<$Phase->fecha_fin)
                            &&($Phase->fecha_fin<$Phases->fecha_fin))){
                            return redirect()->back()->with('warning', 'Ya existe una fase que incluye parte de este rango de fechas');
                        }
                    }
                }       
            }
            //dd($Phase);           
            $Phase->save();

            return redirect()->route('phase.index')->with('success', 'La fase se ha actualizado exitosamente');
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
     try {
            $Phase   = Phase::find($id);
            //$user         = User::find($Phase->idUser);
            
            //Restricciones

            $Phase->delete();
            //$user->delete();

            return redirect()->route('phase.index')->with('success', 'La fase se ha eliminado exitosamente');
        } catch (Exception $e){
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }  
    }
}
