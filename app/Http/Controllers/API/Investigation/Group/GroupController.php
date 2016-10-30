waaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa<?php

namespace Intranet\Http\Controllers\API\Investigation\Group;

use Illuminate\Http\Request;
use Intranet\Models\Group;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller as BaseController;

class GroupController extends BaseController
{
    use Helpers;

    //Tested
    public function getAll()
    {
        $groups = Group::with('faculty')->with('leader')->get();
        return $this->response->array($groups->toArray());
    }
    
    public function getById($id)
    {        
        $groups = Group::where('id',$id)->with('faculty')->with('leader')->get();
        return $this->response->array($groups->toArray());
    }

    public function getByFacultyId($facultyId){
        $groups = Group::where('id_especialidad',$facultyId)->with('faculty')->with('leader')->get();        
        return $this->response->array($group->toArray());   
    }

    public function getByLeaderId($leaderId){
        $groups = Group::where('id_lider',$leaderId)->with('faculty')->with('leader')->get();        
        return $this->response->array($group->toArray());          
    }

    public function edit(Request $request, $id){
        $descripcion    = $request->only('descripcion');
        $nombre         = $request->only('nombre');

        //Guardar
        $group = Group::find($id);
        $group->descripcion = $descripcion['descripcion'];
        $group->nombre      = $nombre['nombre'];
        $group->save();

        //Retornar mensaje
        $mensaje = 'Se modifico correctamente';

        return $mensaje;
    }
}   