<?php

namespace Intranet\Http\Controllers\Evaluations\Competence;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Http\Requests;
use Intranet\Models\Competence;
use Illuminate\Support\Facades\Session;//<---------------------------------necesario para usar session

class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialty = Session::get('faculty-code');
        $competences = Competence::where('id_especialidad',$specialty)->get();
        $data = [
            'competences'    =>  $competences,
        ];
        return view('evaluations.competence.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('evaluations.competence.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $competencia = new Competence;
            $competencia->nombre       = $request['nombre'];            
            $competencia->descripcion  = $request['descripcion'];
            $competencia->id_especialidad= Session::get('faculty-code');
            $competencia->save();
            return redirect()->route('competencia.index')->with('success', 'La competencia se ha registrado exitosamente');
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
        $competence       = Competence::find($id);
        $data = [
            'competence'      =>  $competence,
        ];
        return view('evaluations.competence.edit', $data);
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
        try {
            $competence = Competence::find($id);
            $competence->nombre       = $request['nombre'];            
            $competence->descripcion  = $request['descripcion'];            
            $competence->save();
            return redirect()->route('competencia.index', $id)->with('success', 'La competencia se ha actualizado exitosamente');
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
        try {
            $competence   = Competence::find($id);
            $message = "";
            // if(count($competence->)){
            //     return redirect()->back()->with('warning', 'Esta competencia esta siendo usada');
            // }
            $competence->delete();
            return redirect()->route('competencia.index')->with('success', 'La competencia se ha eliminado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
