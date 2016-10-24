<?php

namespace Intranet\Http\Controllers\Investigation\Deliverable;

use Illuminate\Http\Request;
use Log;
use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;

use Intranet\Models\Project;
use Intranet\Models\Deliverable;
use Intranet\Models\Invdocument;

use Intranet\Http\Requests\DeliverableRequest;

use Intranet\Http\Services\Investigation\Deliverable\DeliverableService;
use Intranet\Http\Services\Investigation\Group\GroupService;

class DeliverableController extends Controller
{
    protected $deliverableService;
    protected $groupService;

    public function __construct()
    {
        $this->deliverableService = new DeliverableService();
        $this->groupService = new GroupService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $proyecto       = Project::find($id);
        $entregables    = $proyecto->deliverables;

        $data = [
            'proyecto'          =>  $proyecto,
            'entregables'       =>  $entregables,
        ];

        return view('investigation.deliverable.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $proyecto = Project::find($id);
        $cantidad = count($proyecto->deliverables);

        if($cantidad < $proyecto->num_entregables){

            $data = [
                'proyecto'      =>  $proyecto,
            ];

            return view('investigation.deliverable.create', $data);
        }else{
            return redirect()->back()->with('warning', 'Se llego al maximo de entregables del proyecto'); 
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeliverableRequest $request)
    {
        try {
            $entregable = new Deliverable;
            $entregable->nombre          = $request->nombre;
            $entregable->id_proyecto     = $request->id_proyecto;
            $entregable->fecha_inicio    = $request->fecha_ini;
            $entregable->fecha_limite    = $request->fecha_fin;
            $entregable->porcen_avance   = 0;

            $entregable->save();
            
            return redirect()->route('entregable.index',$request->id_proyecto)->with('success', 'El entregable se ha registrado exitosamente');

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
        $entregable     = Deliverable::find($id);

        $profesores = $entregable->teachers;
        $investigadores = $entregable->investigators;

        $integrantes = null;
        $sorted = [];
        
        foreach ($investigadores as $investigador) {
            $integrantes = $profesores->push($investigador);    
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

        $data = [
            'entregable'    =>  $entregable,
            'integrantes'   =>  $integrantes,
        ];

        return view('investigation.deliverable.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entregable = Deliverable::find($id);
        $proyecto   = $entregable->project;
        $investigators  = $this->deliverableService->getNotSelectedInvestigators($id);
        $elegible_teachers  = $this->deliverableService->getNotSelectedTeachers($id);

        $data = [
            'entregable'        =>  $entregable,
            'proyecto'          =>  $proyecto,
            'investigators'    =>  $investigators,
            'elegible_teachers' =>  $elegible_teachers
        ];

        return view('investigation.deliverable.edit', $data);
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
            $entregable = Deliverable::find($id);
            $entregable->nombre          = $request->nombre;
            $entregable->fecha_inicio    = $request->fecha_ini;
            $entregable->fecha_limite    = $request->fecha_fin;
            $entregable->porcen_avance   = $request->porcen_avance;

            $entregable->save();
            
            return redirect()->route('entregable.show',$id)->with('success', 'El entregable se ha modificado exitosamente');

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
            $entregable = Deliverable::find($id);
            $proyecto   = Project::find($entregable->id_proyecto);
            

            if($this->groupService->checkLeader($proyecto->id_grupo)){

                if(count($entregable->versions) > 0){
                    return redirect()->back()->with('warning', 'El entregable tiene versiones creadas');
                }

                $entregable->delete();

                return redirect()->route('entregable.index',$proyecto->id)->with('success', 'El entregable se ha eliminado exitosamente');
            }else{
                return redirect()->back()->with('warning', 'El entregable no se puede eliminar debido a que no es el lider');
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
    public function destroyVersion($id)
    {
        try {
            $version    = Invdocument::find($id);
            $entregable = Deliverable::find($version->id_entregable);

            if($this->groupService->checkLeader($entregable->project->id_grupo)){
                if(file_exists($version->ruta)){
                    unlink($version->ruta);
                }

                $version->delete();

                return redirect()->route('entregable.show', $entregable->id)->with('success', 'La version se ha eliminado exitosamente');
            }else{
                return redirect()->back()->with('warning', 'La version no se puede eliminar debido a que no es el lider');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
        
    }

    public function upload(Request $request)
    {
        try {

            //FALTA: Revisar que la persona que sube sea uno de los asignados a hacerlo

            $entregable = Deliverable::find($request['id_entregable']);
            $lastversion = $entregable->lastversion->first();

            $invdocument = new Invdocument;
            $invdocument->id_investigador   = $request['id_usuario'];

            if($lastversion){
                $invdocument->version = $lastversion->version + 1;
            }else{
                $invdocument->version = 1;
            }

            $invdocument->id_entregable     = $request['id_entregable'];
            $invdocument->save();

            $destinationPath = 'uploads/entregables/'; // upload path
            $extension = $request['archivo']->getClientOriginalExtension();
            $filename = $invdocument->id.'.'.$extension; 
            $request['archivo']->move($destinationPath, $filename);

            $invdocument->ruta = $destinationPath.$filename;
            $invdocument->save();

            return redirect()->route('entregable.show',$entregable->id)->with('success', 'El entregable se ha subido exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción'); 
        }
    }

    public function download($id)
    {
        $version    = Invdocument::find($id);
        $file       = public_path().'/'.$version->ruta;

        return response()->download($file);
    }

    public function notify($id)
    {
        //$faculty_id = Session::get('faculty-code');
        $entregable = Deliverable::find($id);
        $groupId = $entregable->project->group->id;
        try {
            if($this->groupService->checkLeader($groupId)){
                $this->deliverableService->sendNotifications($id);
                return redirect()->back()->with('success', 'Se ha notificado a todos los responsables del entregable');
            }else{
                return redirect()->back()->with('warning', 'No se pueden enviar notificaciones debido a que no es el lider');
            }
            
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    public function viewVersion(Request $request){
        try {
            $data['version'] = $this->deliverableService->findVersion($request->all());
        } catch(\Exception $e) {
            dd($e);
        }
        return $data;
    }
    

    public function saveObservation(Request $request){
        try{
            $id = $request['versionId'];
            $version = Invdocument::find($id);
            $idEntregable = $version->deliverable; 
            $groupId = $version->deliverable->project->group->id;
            if($this->groupService->checkLeader($groupId)){
                //Log::info('Id: ' + $id);
                $observacion = $request['versionObservation'];
                $version->observacion = $observacion;
                $version->save();
               
                if($version != null && $observacion != null){
                    $this->deliverableService->sendNotificationsObs($id);
                    return redirect()->back()->with('success', 'Se ha registrado una observación');
                }
                else
                {
                    return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');    
                }    
            }else{
                return redirect()->back()->with('warning', 'No se puede registar una observación debido a que no es el lider');
            }
        } catch(\Exception $e) {
            dd($e);
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
