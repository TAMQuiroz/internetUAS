<?php

namespace Intranet\Http\Controllers\API\Psp\Students;

use Illuminate\Http\Request;
use Intranet\Models\Student;
use Intranet\Models\PspDocument;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller as BaseController;
//Tested
class PspStudentsController extends BaseController
{
    use Helpers;
    
    public function getAll()
    {
       $students = Student::get();
        return $this->response->array($students->toArray());
    }
    
    public function getById($id)
    {        
        $students = Course::where('id',$id)->get();
        return $this->response->array($students->toArray());
    }


  public function getDocumentsAll()
    {        
        $documentsById = PspDocument::get();
        return $this->response->array($documentsById->toArray());
    }


  public function getDocumentsById($id)
    {        
        $documentsById = PspDocument::where('idStudent',$id)->get();
        return $this->response->array($documentsById->toArray());
    }

}  