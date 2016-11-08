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
use Intranet\Http\Services\Investigation\Group\GroupService;

use Intranet\Http\Requests\ProjectRequest;

use Auth;

class ProjectController extends Controller
{

    protected $projectService;
    protected $groupService;

    public function __construct()
    {
        $this->projectService = new ProjectService();
        $this->groupService = new GroupService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos  = Project::get();
        $usuario    = Auth::user();
        $profesor   = null;
        if($usuario){
            $profesor   = $usuario->professor;
        }
        $esLider    = false;
        if($profesor && count($profesor->groups)!=0){
            $esLider = true;
        }else{
            $esLider = false;
        }
        $data = [
            'proyectos'    =>  $proyectos,
            'esLider'      =>  $esLider,
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
        $grupos     = Group::where('id_lider',Auth::user()->professor->IdDocente)->lists('nombre', 'id');
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

        $profesores = $proyecto->teachers;
        $investigadores = $proyecto->investigators;
        $estudiantes = $proyecto->students;

        $integrantes = null;
        $sorted = [];
        
        foreach ($investigadores as $investigador) {
            $integrantes = $profesores->push($investigador);    
        }
        
        foreach ($estudiantes as $estudiante) {
            $integrantes = $profesores->push($estudiante);    
        }
        
        if($integrantes){
            $sorted = $integrantes->sortBy(function ($product, $key) {
                if(isset($product['IdDocente'])){
                    return $product['Nombre'];
                }else{
                    return $product['nombre'];
                }
            });
        }

        $entregables_realizados = 0;

        foreach ($proyecto->deliverables as $deliverable) {
            if($deliverable->porcen_avance == 100){
                $entregables_realizados = $entregables_realizados + 1;
            }
        }

        $data = [
            'proyecto'                  =>  $proyecto,
            'grupos'                    =>  $grupos,
            'areas'                     =>  $areas,
            'integrantes'               =>  $sorted,
            'entregables_realizados'    =>  $entregables_realizados,
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

        if($this->groupService->checkLeader($proyecto->id_grupo)){

            $grupos         = Group::lists('nombre', 'id');
            $areas          = Area::lists('nombre', 'id');
            $estados        = Status::where('tipo_estado',0)->lists('nombre','id');
            $investigators  = $this->projectService->getNotSelectedInvestigators($id);
            $elegible_teachers  = $this->projectService->getNotSelectedTeachers($id);
            $students       = $this->projectService->getNotSelectedStudents($id);

            $data = [
                'proyecto'          =>  $proyecto,
                'grupos'            =>  $grupos,
                'areas'             =>  $areas,
                'estados'           =>  $estados,
                'investigators'     =>  $investigators,
                'elegible_teachers' =>  $elegible_teachers,
                'students'          =>  $students,
            ];
            
        }else{
            return redirect()->back()->with('warning', 'El proyecto no se puede editar debido a que no es el lider');
        }

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
            $proyecto = Project::find($id);

            if($request->num_entregables >= count($proyecto->deliverables)){

                $status = Status::where('nombre','En progreso')->first();

                if($status){
                    
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
            }else{
                return redirect()->back()->with('warning', 'No puede reducir la cantidad de entregables ya que existe una cantidad mayor creada');       
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

    public function getProject($id){

        $proyecto = Project::find($id);

        return $proyecto;
    }
}
