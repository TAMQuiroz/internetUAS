<?php

namespace Intranet\Http\Controllers\Investigation\Project;

use Illuminate\Http\Request;

use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;

use Intranet\Models\Project;
use Intranet\Models\Group;
use Intranet\Models\Area;

use Intranet\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Project::get();

        $data = [
            'proyectos'    =>  $proyectos,
        ];

        return view('investigation.project.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupos     = Group::lists('nombre', 'id');
        $areas     = Area::lists('nombre', 'id');

        $data = [
            'grupos'    =>  $grupos,
            'areas'     =>  $areas,
        ];

        return view('investigation.project.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $proyecto = new Project;
        $proyecto->nombre           = $request->nombre;
        $proyecto->descripcion      = $request->descripcion;
        $proyecto->num_entregables  = $request->num_entregables;
        $proyecto->fecha_ini        = $request->fecha_ini;
        $proyecto->fecha_fin        = $request->fecha_fin;
        $proyecto->id_grupo         = $request->grupo;
        $proyecto->id_area          = $request->area;
        $proyecto->id_status        = 1; //En proceso

        $proyecto->save();
        
        return redirect()->route('proyecto.index')->with('success', 'El proyecto se ha registrado exitosamente');        
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
        //
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
