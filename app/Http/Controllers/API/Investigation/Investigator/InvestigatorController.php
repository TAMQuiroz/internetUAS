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
        $investigator = Investigator::with('faculty')->with('user')->with('area')->get();
                
        return $this->response->array($investigator->toArray());
    }

    
    public function getById($id)
    {
        $investigator = Investigator::where('id',$id)->with('faculty')->with('user')->with('area')->get();
        return $this->response->array($investigator->toArray());
    }

   
}   