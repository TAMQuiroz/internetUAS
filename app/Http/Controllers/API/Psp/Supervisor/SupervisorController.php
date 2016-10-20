<?php

namespace Intranet\Http\Controllers\API\Psp\Supervisor;

use Illuminate\Http\Request;
use Intranet\Models\Supervisor;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller as BaseController;
//Sin testear
class SupervisorController extends BaseController
{
    use Helpers;
       
    public function getAll()
    {
        $supervisor = Supervisor::with('faculty')->with('user')->get();
                
        return $this->response->array($supervisor->toArray());
    }

    
    public function getById($id)
    {
        $supervisor = Supervisor::where('id',$id)->with('faculty')->with('user')->get();
        return $this->response->array($supervisor->toArray());
    }

   
}   