<?php

namespace Intranet\Http\Controllers\Investigation\Project;

use Illuminate\Http\Request;

use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;

use Intranet\Models\Project;
use Intranet\Models\Group;
use Intranet\Models\Area;
use Intranet\Models\Status;
use Intranet\Models\Investigatorxproject;

use Intranet\Http\Services\Investigation\Project\ProjectService;

use Intranet\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{

    protected $projectService;

    public function __construct()
    {
        $this->projectService = new ProjectService();
    }

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
        if($grupos->isEmpty() || $areas->isEmpty()){
            return redirect()->back()->with('warning','Primero debe crear areas o grupos');
        }

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
        try {
            $status = Status::where('nombre','En progreso')->first();

            if($status){
                $proyecto = new Project;
                $proyecto->nombre           = $request->nombre;
                $proyecto->descripcion      = $request->descripcion;
                $proyecto->num_entregables  = $request->num_entregables;
                $proyecto->fecha_ini        = $request->fecha_ini;
                $proyecto->fecha_fin        = $request->fecha_fin;
                $proyecto->id_grupo         = $request->grupo;
                $proyecto->id_area          = $request->area;
                $proyecto->id_status        = $status->id;

                $proyecto->save();
                
                return redirect()->route('proyecto.index')->with('success', 'El proyecto se ha registrado exitosamente');        
            }else{
                return redirect()->back()->with('warning', 'No existe el estado En Progreso, agregelo en el mantenimiento');       
            }
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
        $proyecto       = Project::find($id);
        $grupos         = Group::lists('nombre','id');
        $areas          = Area::lists('nombre','id');

        $data = [
            'proyecto'    =>  $proyecto,
            'grupos'      =>  $grupos,
            'areas'       =>  $areas,
        ];

        return view('investigation.project.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyecto       = Project::find($id);
        $grupos         = Group::lists('nombre', 'id');
        $areas          = Area::lists('nombre', 'id');
        $estados        = Status::where('tipo_estado',0)->lists('nombre','id');
        $investigators  = $this->projectService->getNotSelectedInvestigators($id);

        $data = [
            'proyecto'      =>  $proyecto,
            'grupos'        =>  $grupos,
            'areas'         =>  $areas,
            'estados'       =>  $estados,
            'investigators' =>  $investigators,
        ];

        return view('investigation.project.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
        try {
            $status = Status::where('nombre','En progreso')->first();

            if($status){
                $proyecto = Project::find($id);
                $proyecto->nombre           = $request->nombre;
                $proyecto->descripcion      = $request->descripcion;
                $proyecto->num_entregables  = $request->num_entregables;
                $proyecto->fecha_ini        = $request->fecha_ini;
                $proyecto->fecha_fin        = $request->fecha_fin;
                $proyecto->id_grupo         = $request->grupo;
                $proyecto->id_area          = $request->area;
                $proyecto->id_status        = $status->id;

                $proyecto->save();
                
                return redirect()->route('proyecto.show',$id)->with('success', 'El proyecto se ha editado exitosamente');        
            }else{
                return redirect()->back()->with('warning', 'No existe el estado En Progreso, agregelo en el mantenimiento');       
            }
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
            $proyecto = Project::find($id);
            $investigatorxproyects = Investigatorxproject::where('id_proyecto',$proyecto->id)->get();
            foreach ($investigatorxproyects as $relationship) {
                $relationship->delete();
            }
            //Restricciones de logica de negocio

            $proyecto->delete();
            return redirect()->route('proyecto.index')->with('success', 'El proyecto se ha eliminado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
