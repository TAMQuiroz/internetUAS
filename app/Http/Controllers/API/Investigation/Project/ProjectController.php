<?php

namespace Intranet\Http\Controllers\API\Investigation\Project;

use Illuminate\Http\Request;
use Intranet\Models\Project;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller as BaseController;
//Working
class ProjectController extends BaseController
{
    use Helpers;
       
    public function getAll()
    {
        $project = Project::with('area')->with('group')->with('status')->get();
                
        return $this->response->array($project->toArray());
    }

    
    public function getById($id)
    {
        $project = Project::where('id',$id)->with('area')->with('group')->with('status')->get();
        return $this->response->array($project->toArray());
    }

    public function edit(Request $request, $id){
        $nombre    = $request->only('nombre');
        $descripcion         = $request->only('descripcion');
        $num_entregables         = $request->only('num_entregables');

        $fecha_ini              = $request->only('fecha_ini');
        $fecha_ini1=$fecha_ini['fecha_ini'];
        $fecha_fin             = $request->only('fecha_fin');
        $fecha_fin1=$fecha_fin['fecha_fin'];
        
        $format = "d/m/Y";
        $fecha_ini_Aux=DateTime::createFromFormat($format,$fecha_ini1);
        $fecha_fin_Aux=DateTime::createFromFormat($format,$fecha_fin1);

        //Guardar
        $project = Project::find($id);
        $project->nombre           = $nombre['nombre'];
        $project->descripcion      = $descripcion['descripcion'];
        $project->num_entregables      = $ape_materno['num_entregables'];
        $project->fecha_ini           = $fecha_ini_Aux;
        $project->fecha_fin          = $fecha_fin_Aux;
        $project->save();

        //Retornar mensaje
        $mensaje = 'Se modifico correctamente';

        return $mensaje;
    }
   
}   