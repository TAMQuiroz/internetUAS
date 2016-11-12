<?php

namespace Intranet\Http\Controllers\Investigation\Area;

use Illuminate\Http\Request;

use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;

use Intranet\Models\Area;

use Intranet\Http\Requests\AreaRequest;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = $request->all();

        $areas = Area::getFiltered($filters);

        $data = [
            'areas'    =>  $areas,
        ];

        return view('investigation.area.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('investigation.area.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request)
    {
        try {
            $area = new Area;
            $area->nombre       = $request['nombre'];
            $area->descripcion  = $request['descripcion'];
            $area->save();

            return redirect()->route('area.index')->with('success', 'El area se ha registrado exitosamente');
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
        $area     = Area::find($id);

        $data = [
            'area'    =>  $area,
        ];

        return view('investigation.area.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area       = Area::find($id);

        $data = [
            'area'      =>  $area,
        ];

        return view('investigation.area.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, $id)
    {
        try {
            $area = Area::find($id);
            $area->nombre       = $request['nombre'];
            $area->descripcion  = $request['descripcion'];
            $area->save();

            return redirect()->route('area.index')->with('success', 'El area se ha actualizado exitosamente');
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
            $area   = Area::find($id);
            $message = "";

            if(count($area->investigators) != 0){
                return redirect()->back()->with('warning', 'Esta area esta asignada a investigadores');
            }

            if(count($area->projects) != 0 ){
                return redirect()->back()->with('warning', 'Esta area esta asignada a proyectos');
            }

            $area->delete();

            return redirect()->route('area.index')->with('success', 'El area se ha eliminado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
