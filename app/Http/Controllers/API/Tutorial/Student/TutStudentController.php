<?php

namespace Intranet\Http\Controllers\API\Tutorial\Student;

use Illuminate\Http\Request;
use Intranet\Models\Tutstudent;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller as BaseController;
//Tested
class TutStudentController extends BaseController
{
    use Helpers;
    
    public function getAll()
    {
        $groups = Tutstudent::get();
        return $this->response->array($groups->toArray());
    }
    
    public function getById($id)
    {        
        $groups = Tutstudent::where('id',$id)->get();
        return $this->response->array($groups->toArray());
    }

}  