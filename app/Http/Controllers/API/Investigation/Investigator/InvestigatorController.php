<?php

namespace Intranet\Http\Controllers\API\Investigation\Investigator;

use Illuminate\Http\Request;
use Intranet\Models\Investigator;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller as BaseController;
//
class InvestigatorController extends BaseController
{
    use Helpers;
   
    public function getAll()
    {
        $investigator = Investigator::with('faculty')->with('area')->get();
        return $this->response->array($investigator->toArray());
    }

    
    public function getById($id)
    {
        $investigator = Investigator::where('id',$id)->with('faculty')->with('user')->with('area')->get();
        return $this->response->array($investigator->toArray());
    }

    public function edit(Request $request, $id){
        $nombre    = $request->only('nombre');
        $ape_paterno         = $request->only('ape_paterno');
        $ape_materno         = $request->only('ape_materno');
        $correo              = $request->only('correo');
        $celular             = $request->only('celular');
        

        //Guardar
        $investigator = Investigator::find($id);
        $investigator->nombre           = $nombre['nombre'];
        $investigator->ape_paterno      = $ape_paterno['ape_paterno'];
        $investigator->ape_materno      = $ape_materno['ape_materno'];
        $investigator->correo           = $correo['correo'];
        $investigator->celular          = $celular['celular'];
        $investigator->save();

        //Retornar mensaje
        //$mensaje = 'Se modifico correctamente';
        $mensaje = ['mensaje' => 'Se modifico correctamente'];
        return response()->json($mensaje);

        //return $mensaje;
    }

   
}   