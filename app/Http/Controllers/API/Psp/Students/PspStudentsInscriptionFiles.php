<?php

namespace Intranet\Http\Controllers\API\Psp\Students;

use Illuminate\Http\Request;
use Intranet\Models\Student;
use Intranet\Models\Inscription;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller as BaseController;

class PspStudentsInscriptionFiles extends BaseController
{

    use Helpers;


        public function getAll()
    {
       $students = Student::get();
       return $this->response->array($students->toArray());
    }


  public function getInscriptions()
    {
       

   		$inscription = Inscription::get();
        return $this->response->array($inscription->toArray());

    }


   public function edit(Request $request, $id){
    
        $recomendaciones     = $request->only('recomendaciones');
             
        //Guardar
        $inscription = Inscription::find($id);
        $inscription->recomendaciones  = $recomendaciones['recomendaciones'];

        $inscription->save();

        //Retornar mensaje
        $mensaje = 'Se modifico correctamente';

        return $mensaje;
    }





}