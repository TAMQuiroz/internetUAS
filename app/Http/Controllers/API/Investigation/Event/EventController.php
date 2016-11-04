<?php

namespace Intranet\Http\Controllers\API\Investigation\Event;

use Illuminate\Http\Request;

use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;

use Intranet\Models\Group;
use Intranet\Models\Event;

use Intranet\Http\Requests\EventMobileRequest;

class EventController extends Controller
{
    public function getById($id)
    {
        $event = Event::find($id);
        return $event;
    }

    public function getByGroupId($id)
    {
        $group = Group::find($id);
        $events = $group->events;
        return $events;
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
        $mensaje = 'Se modifico correctamente';

        return $mensaje;
    }
}
