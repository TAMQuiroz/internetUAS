<?php

namespace Intranet\Http\Controllers\API\Investigation\Deliverable;

use Illuminate\Http\Request;

use Intranet\Http\Requests;
//use Intranet\Http\Controllers\Controller;
use Mail;
use DB;
use DateTime;
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
        
        $entregable = Deliverable::where('id',$id)->with('project')->with('versions')->with('investigators')->with('students')->with('teachers')->get();

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

    public function edit(Request $request, $id){
        	
        $fecha_ini           = $request->only('fecha_inicio');
        $fecha_fin           = $request->only('fecha_limite');
        
        //Guardar
        $entregable = Deliverable::find($id);
        $entregable->fecha_inicio          = $fecha_ini['fecha_inicio'];
        $entregable->fecha_limite          = $fecha_fin['fecha_limite'];
        $entregable->save();

        //Retornar mensaje
        $mensaje = 'Se modifico correctamente';

       return response()->json($mensaje);
    }

    public function getAllVersions($idDeliv){
        $invDoc = Invdocument::where('id_entregable', $idDeliv)->get();
        return $this->response->array($invDoc->toArray());
    }

    public function getResponsibles($idDeliv){
        $responsibles = Investigatorxdeliverable::where('id_entregable',$idDeliv)->get();
        $invList=[];

        foreach ($responsibles as $key => $value) {
            $inv = $value->investigator;
            array_push($invList, $inv);
        }
        //dd($invList);
        return $this->response->array($invList);    
    }

    public function getObservation($idInvDoc){
        $invDoc = Invdocument::where('id',$idInvDoc)->get();
        return $this->response->array($invDoc->toArray());        
    }

    public function registerObservation(Request $request, $idInvDoc){
        $observation = $request->only('observacion');

        $invDoc= Invdocument::find($idInvDoc);
        $invDoc->observacion         = $observation['observacion'];
        $invDoc->save();

        $deliverable = $invDoc->deliverable;
        //dd($deliverable);
        $responsibles = $deliverable->investigators;
        try
        { 
            $nombreEntregable = $deliverable->nombre;
            $numVersion = $invDoc->version;
            $observacion = $invDoc->observacion;
            /*$mail = 'cdongo@pucp.edu.pe';
            Mail::send('emails.notifyObservation', compact('nombreEntregable', 'numVersion', 'observacion'), function($m) use($mail){
                    $m->subject('Registro de observación');
                    $m->to($mail);
                });*/
            foreach ($responsibles as $key => $value) {
                //$inv = $value->investigator;
                $mail = $value->correo;
                Mail::send('emails.notifyObservation', compact('nombreEntregable', 'numVersion', 'observacion'), function($m) use($mail){
                    $m->subject('Registro de observación');
                    $m->to($mail);
                });

            }

        }
        catch (\Exception $e)
        {
            dd($e->getMessage());
        }

        $mensaje = ['mensaje' => 'Se modifico correctamente'];
        return response()->json($mensaje);
    }
}
