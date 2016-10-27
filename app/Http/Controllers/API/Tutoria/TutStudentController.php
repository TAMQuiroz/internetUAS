<?php

namespace Intranet\Http\Controllers\API\Tutoria;

use Illuminate\Http\Request;
use Intranet\Models\Tutstudent;
use Intranet\Models\Teacher;
use Intranet\Models\TutSchedule;
use Intranet\Models\Tutorship;
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

    public function getTutorById($id_usuario)
    {        

        $studentInfo = Tutstudent::where('id_usuario',$id_usuario)->get(); //deberia darme 5
        $tutorshipInfo = Tutorship::where('id',5)->get();
        //aca deberia contemplarse que el teacher info no traiga informacion, pero ahorita quiero presentar algo (27-10-2016)
        $teacherInfo = Teacher::where('idDocente',$tutorshipInfo[0]['id_profesor'])->get();
        $scheduleInfo = TutSchedule::where('id_docente',$tutorshipInfo[0]['id_profesor'])->get();
        $teacherInfo[0]['scheduleInfo'] = '';
        $i = 0;

       foreach ($teacherInfo as $teacher) {
           $teacherInfo[$i]->scheduleInfo= $scheduleInfo;
           $i++;
        }
                        
        return $this->response->array($teacherInfo->toArray());


    }

}  
