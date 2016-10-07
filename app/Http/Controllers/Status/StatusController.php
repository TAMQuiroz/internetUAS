<?php

namespace Intranet\Http\Controllers\Status;

use Illuminate\Http\Request;

use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;

use Intranet\Models\Status;

class StatusController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexType()
    {
        $data = [
            'tipos'    =>  
            [
                0   =>  'Investigacion: Proyectos',
                1   =>  'Documentos de PSP',
                2   =>  'Estudiante de PSP',
                3   =>  'Reuniones de PSP',
                4   =>  'Templates',
                5   =>  'Usuario',
            ],
        ];

        return view('status.indexType', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $statuses = Status::where('tipo_estado',$id)->get();

        $data = [
            'statuses'    =>  $statuses,
        ];

        return view('status.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'tipos'    =>  
            [
                0 => 'Investigacion: Proyectos',
                1   =>  'Documentos de PSP',
                2   =>  'Estudiante de PSP',
                3   =>  'Reuniones de PSP',
                4   =>  'Templates',
                5   =>  'Usuario',
            ],
        ];

        return view('status.create', $data);
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
            $status = new Status;
            $status->nombre         = $request->nombre;
            $status->tipo_estado    = $request->tipo_estado;
            
            $status->save();

            return redirect()->route('status.index')->with('success', 'El status se ha registrado exitosamente');

        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');   
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = Status::find($id);

        $data = [
            'status' => $status,
            'tipos'    =>  
            [
                0 => 'Proyectos',
            ],
        ];

        return view('status.edit', $data);
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
            $status = Status::find($id);
            $status->nombre         = $request->nombre;
            $status->tipo_estado    = $request->tipo_estado;
            
            $status->save();

            return redirect()->route('status.index')->with('success', 'El status se ha registrado exitosamente');

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
            $status = Status::find($id);
            $status->delete();

            return redirect()->route('status.index')->with('success', 'El status se ha eliminado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
