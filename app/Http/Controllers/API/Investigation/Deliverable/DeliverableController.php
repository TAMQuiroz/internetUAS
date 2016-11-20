<?php

namespace Intranet\Http\Controllers\API\Investigation\Deliverable;

use Illuminate\Http\Request;

use Intranet\Http\Requests;
//use Intranet\Http\Controllers\Controller;

use Intranet\Models\Deliverable;
use Intranet\Models\Project;
use Intranet\Models\Invdocument;
use Intranet\Models\Investigatorxdeliverable;
use Intranet\Models\Investigator;

use Dingo\Api\Routing\Helpers;

use Intranet\Http\Requests\DeliverableMobileRequest;
use Illuminate\Routing\Controller as BaseController;

class DeliverableController extends BaseController
{
    use Helpers;

    public function getById($id)
    {
        $entregable = Deliverable::find($id)->with('project')->get();
        return $this->response->array($entregable->toArray());
        //return $entregable;
    }

    public function getByProjectId($id)
    {
        //$proyecto = Project::find($id);
        //$entregables = $proyecto->deliverables;

        $entregables = Deliverable::where('id_proyecto',$id)->with('project')->get();
        return $this->response->array($entregables->toArray());
        //return $entregables;
    }

    public function edit(DeliverableMobileRequest $request, $id){
        	
        $fecha_ini           = $request->only('fecha_ini');
        $fecha_fin           = $request->only('fecha_fin');
        
        //Guardar
        $entregable = Deliverable::find($id);
        $entregable->fecha_inicio          = $fecha_ini['fecha_ini'];
        $entregable->fecha_limite          = $fecha_fin['fecha_fin'];
        $entregable->save();

        //Retornar mensaje
        $mensaje = 'Se modifico correctamente';

        return $mensaje;
    }

    public function getAllVersions($idDeliv){
        $invDoc = Invdocument::where('id_entregable', $idDeliv)->get();
        return $this->response->array($invDoc->toArray());
    }

    public function getResponsibles($idDeliv){
        $responsibles = Investigatorxdeliverable::where('id_entregable',$idDeliv)->get()->investigator;
        return $this->response->array($responsibles->toArray());    
    }

    public function getObservation($idInvDoc){
        $invDoc = Invdocument::find($idInvDoc);
        return $this->response->array($invDoc->toArray());        
    }
}
