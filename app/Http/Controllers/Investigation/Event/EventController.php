<?php

namespace Intranet\Http\Controllers\Investigation\Event;

use Illuminate\Http\Request;

use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;

use Intranet\Http\Services\Investigation\Group\GroupService;

use Intranet\Models\Event;
use Intranet\Models\Group;

use Intranet\Http\Requests\EventRequest;

class EventController extends Controller
{

    protected $groupService;

    public function __construct()
    {
        $this->groupService = new GroupService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::get();

        $data = [
            'events'    =>  $events,
        ];

        return view('investigation.event.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups     = Group::lists('nombre', 'id');

        if($groups->isEmpty()){
            return redirect()->back()->with('warning','Primero debe crear grupos');
        }

        $data = [
            'groups'    =>  $groups,
        ];

        return view('investigation.event.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(EventRequest $request)
    {
        try {
            //Crear evento
            $evento = new Event;
            $evento->nombre     = $request['nombre'];
            $evento->ubicacion  = $request['ubicacion'];
            $evento->fecha      = $request['fecha'];
            $evento->hora       = date("Y-m-d H:i", strtotime($request['hora']));
            $evento->duracion   = $request['duracion'];
            $evento->descripcion   = $request['descripcion'];
            $evento->tipo       = $request['tipo'];
            $evento->id_grupo   = $request['grupo'];
            
            $evento->save();

            if(isset($request['imagen']) && $request['imagen'] != ""){
                $destinationPath = 'uploads/eventos/'; // upload path
                $extension = $request['imagen']->getClientOriginalExtension();
                $filename = $evento->id.'.'.$extension; 
                $request['imagen']->move($destinationPath, $filename);

                $evento->imagen = $destinationPath.$filename;
                $evento->save();
            }
            
            return redirect()->route('evento.index')->with('success', 'El evento se ha registrado exitosamente');
        }catch (Exception $e){
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
        $evento     = Event::find($id);

        $data = [
            'evento'    =>  $evento,
        ];

        return view('investigation.event.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento     = Event::find($id);

        if($this->groupService->checkLeader($evento->id_grupo)){

            $groups     = Group::lists('nombre', 'id');

            $data = [
                'evento'    =>  $evento,
                'groups'    =>  $groups,
            ];    

        }else{
            return redirect()->back()->with('warning', 'El evento no se puede editar debido a que no es el lider');
        }
        
        return view('investigation.event.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(EventRequest $request, $id)
    {

        try {
            //Editar evento
            $evento = Event::find($id);
            $evento->nombre     = $request['nombre'];
            $evento->ubicacion  = $request['ubicacion'];
            $evento->descripcion   = $request['descripcion'];
            $evento->fecha      = $request['fecha'];
            $evento->hora       = date("Y-m-d H:i", strtotime($request['hora']));
            $evento->duracion   = $request['duracion'];
            $evento->tipo       = $request['tipo'];
            $evento->id_grupo   = $request['grupo'];
            
            $evento->save();

            if(isset($request['imagen']) && $request['imagen'] != ""){
                if(file_exists($evento->imagen)){
                    unlink($evento->imagen);
                }

                $destinationPath = 'uploads/eventos/'; // upload path
                $extension = $request['imagen']->getClientOriginalExtension();
                $filename = $evento->id.'.'.$extension; 

                $request['imagen']->move($destinationPath, $filename);

                $evento->imagen = $destinationPath.$filename;
                $evento->save();
            }

            
            return redirect()->route('evento.show',$id)->with('success', 'El evento se ha modificado exitosamente');
        }catch (Exception $e){
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
            $event = Event::find($id);
            if($this->groupService->checkLeader($event->id_grupo)){

                $event->delete();

                return redirect()->route('event.index')->with('success', 'El evento se ha eliminado exitosamente');

            }else{
                return redirect()->back()->with('warning', 'El evento no se puede eliminar debido a que no es el lider');
            } 
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
        
    }
}
