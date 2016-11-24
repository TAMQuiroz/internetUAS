<?php

namespace Intranet\Http\Controllers\API\Investigation\Project;

use Illuminate\Http\Request;
use Intranet\Models\Project;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller as BaseController;

use Intranet\Http\Requests\ProjectMobileRequest;

use Intranet\Models\Status;

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
        $project = Project::where('id',$id)->with('area')->with('group')->with('status')->with('deliverables')->get();
        return $this->response->array($project->toArray());
    }


    public function edit(ProjectMobileRequest $request, $id)
    {
        $proyecto           = Project::find($id);
        $nombre             = $request->only('nombre');
        $descripcion        = $request->only('descripcion');
        $num_entregables    = $request->only('num_entregables');
        $fecha_ini          = $request->only('fecha_ini');
        $fecha_fin          = $request->only('fecha_fin');

        if($num_entregables >= count($proyecto->deliverables)){

            $status = Status::where('nombre','En progreso')->first();

            if($status){
                
                $proyecto->nombre  = $nombre['nombre'];
                $proyecto->descripcion  = $descripcion['descripcion'];
                $proyecto->num_entregables  = $num_entregables['num_entregables'];
                $proyecto->fecha_ini        = $fecha_ini['fecha_ini'];
                $proyecto->fecha_fin        = $fecha_fin['fecha_fin'];
                $proyecto->save();
                
                $mensaje = ['mensaje' => 'Se modifico correctamente'];
                //$mensaje = 'Se modifico correctamente';
            }else{
                $mensaje = ['mensaje' => 'No existe el estado En Progreso, agregelo en el mantenimiento'];
                //$mensaje = 'No existe el estado En Progreso, agregelo en el mantenimiento';
            }
        }else{
            $mensaje = ['mensaje' => 'No puede reducir la cantidad de entregables ya que existe una cantidad mayor creada'];
            //$mensaje = 'No puede reducir la cantidad de entregables ya que existe una cantidad mayor creada';
        }
        
        return response()->json($mensaje);

        //return $mensaje;
    }


   
}   