<?php

namespace Intranet\Http\Controllers\API\Tutoria;

use Illuminate\Http\Request;
use Intranet\Models\Tutstudent;
use Intranet\Models\Teacher;
use Intranet\Models\TutSchedule;
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

    public function postAppointment(Request $request)
    {        
        //aggg
      return $request['nombre'];    
    }

    public function getTutorById($id_tutor)
    {        
        $teacherInfo = Teacher::where('idDocente',$id_tutor)->get();
        $scheduleInfo = TutSchedule::where('id_docente',$id_tutor)->get();
        $teacherInfo[0]['scheduleInfo'] = '';
        $i = 0;

       foreach ($teacherInfo as $teacher) {
           $teacherInfo[$i]->scheduleInfo= $scheduleInfo;
           $i++;
        }
                
        return $this->response->array($teacherInfo->toArray());
    }

}  
