<?php

namespace Intranet\Http\Controllers\API\Investigation\Event;

use Illuminate\Http\Request;
use Intranet\Models\Group;
use Intranet\Models\Event;
use Dingo\Api\Routing\Helpers;

use Intranet\Http\Requests\EventMobileRequest;
use Illuminate\Routing\Controller as BaseController;
//use Intranet\Http\Controllers\Controller;





class EventController extends BaseController
{

    use Helpers;

    public function getById($id)
    {
        $event = Event::where('id',$id)->with('group')->get();
        return $this->response->array($event->toArray());
        //return $event;
    }

    public function getByGroupId($id)
    {
        $events = Event::where('id_grupo',$id)->with('group')->get();
        //$group = Group::find($id);
        //$events = $group->events;
        return $this->response->array($events->toArray());
        //return $events;
    }

    public function edit(EventMobileRequest $request, $id){
        
        $nombre              = $request->only('nombre');
        $ubicacion           = $request->only('ubicacion');
        $fecha               = $request->only('fecha');
        $hora                = $request->only('hora');
        $descripcion         = $request->only('descripcion');
        
        //Guardar
        $evento = Event::find($id);
        $evento->nombre         = $nombre['nombre'];
        $evento->ubicacion      = $ubicacion['ubicacion'];
        $evento->fecha          = $fecha['fecha'];
        $evento->hora           = $hora['hora'];
        $evento->descripcion    = $descripcion['descripcion'];
        $evento->save();

        //Retornar mensaje
        //$mensaje = 'Se modifico correctamente';

        $mensaje = ['mensaje' => 'Se modifico correctamente'];
        return response()->json($mensaje);
        //return $mensaje;
    }
}
