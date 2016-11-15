<?php

namespace Intranet\Http\Controllers\Psp\PspCriterio;

use Illuminate\Http\Request;

use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;

use Intranet\Models\Pspcriterio;
use Intranet\Models\Teacher;
use Intranet\Models\PspProcessxTeacher;
use Intranet\Models\PspProcess;

use Intranet\Http\Requests\PspCriterioRequest;

use Auth;

class PspCriterioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criterios = Pspcriterio::paginate(10);

        $data = [
            'criterios'    =>  $criterios,
        ];

        return view('psp.pspCriterio.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::User()->IdPerfil == 2){
            $teacher        = Teacher::where('IdUsuario',Auth::User()->IdUsuario)->first(); 
            $procxteacher   = PspProcessxTeacher::where('iddocente',$teacher->IdDocente)->get(); 
            $procesos       = [];

            foreach ($procxteacher as $proc) {
                $procesos[] = PspProcess::find($proc->idpspprocess);
            }

        }else{
            $procesos = PspProcess::get();
        }

        $data = [
            'procesos'    =>  $procesos,
        ];

        return view('psp.pspCriterio.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PspCriterioRequest $request)
    {
        try {
            $nombre         =   $request->nombre;
            $peso           =   $request->peso;
            $pspprocess     =   $request->pspprocess;

            $pspcriterio = new Pspcriterio;
            $pspcriterio->nombre            =   $nombre;
            $pspcriterio->peso              =   $peso;
            $pspcriterio->id_pspprocess     =   $pspprocess;

            $pspcriterio->save();
            
            return redirect()->route('pspCriterio.index')->with('success', 'El criterio se ha registrado exitosamente');

        } catch (Exception $e) {
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
        $criterio       = Pspcriterio::find($id);
        
        if(Auth::User()->IdPerfil == 2){
            $teacher        = Teacher::where('IdUsuario',Auth::User()->IdUsuario)->first(); 
            $procxteacher   = PspProcessxTeacher::where('iddocente',$teacher->IdDocente)->get(); 
            $procesos       = [];

            foreach ($procxteacher as $proc) {
                $procesos[] = PspProcess::find($proc->idpspprocess);
            }

        }else{
            $procesos = PspProcess::get();
        }


        $data = [
            'criterio'      =>  $criterio,
            'procesos'      =>  $procesos,
        ];

        return view('psp.pspCriterio.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PspCriterioRequest $request, $id)
    {
        try {
            $nombre         =   $request->nombre;
            $peso           =   $request->peso;
            $pspprocess     =   $request->pspprocess;

            $pspcriterio = Pspcriterio::find($id);
            $pspcriterio->nombre            =   $nombre;
            $pspcriterio->peso              =   $peso;
            $pspcriterio->id_pspprocess     =   $pspprocess;

            $pspcriterio->save();
            
            return redirect()->route('pspCriterio.index')->with('success', 'El criterio se ha editado exitosamente');

        } catch (Exception $e) {
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
