<?php

namespace Intranet\Http\Controllers\API\Evaluation;

use Illuminate\Http\Request;
use Intranet\Models\Faculty;
use Intranet\Models\Evaluation;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller as BaseController;

class EvaluationController extends BaseController
{
    use Helpers;

    public function getAll()
    {
        $evaluations = Evaluation::get();
        return $this->response->array($evaluations->toArray());
    }


    public function getById($id)
    {        
        $evaluations = Evaluation::where('id',$id)->get();       
        return $this->response->array($evaluations->toArray());
    }


    public function getEvaluationByFilter($name, $state, $id)
    {


        //--- GET Especialidad
        //$faculty = Faculty::find($id);
        //------------Evaluation--------------------         
        


        $filters = [
            "nombre" => $name,
            "estado" => $state,            
        ];

        $evaluations = Evaluation::get();
        
        $evals = Evaluation::getEvaluationsFilteredMobile($filters, $id);
        
        return $this->response->array($evals->toArray());

         
    }


    

}