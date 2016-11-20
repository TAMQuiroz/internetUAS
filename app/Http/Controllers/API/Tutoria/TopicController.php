<?php

namespace Intranet\Http\Controllers\API\Tutoria;

use Illuminate\Http\Request;
use Intranet\Models\Topic;
use Intranet\Models\TutMeeting;
use Intranet\Models\Tutstudent;
use Intranet\Models\Tutorship;
use Intranet\Models\Teacher;
use Mail;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller as BaseController;
//Tested
class TopicController extends BaseController
{
    use Helpers;
    
    public function getAll()
    {
        $topics = Topic::get();
        return $this->response->array($topics->toArray());

    }
    
    public function getById($id)
    {        
        $topic = Topic::where('id',$id)->get();
        return $this->response->array($topic->toArray());
    }

    public function getAppointments()
    {
        $groups = TutMeeting::get();
        return $this->response->array($groups->toArray());
    }


   public function getCoordinatorStudent(){

        $studentInfo = Tutstudent::get();
        $i=0;  
        $LovingTheAlien;

        foreach ($studentInfo as $ttshipInfo) {

            $idTutoria = $ttshipInfo['id_tutoria'];
            if (!empty($idTutoria)){
            
                $infoTutorShip = Tutorship::where('id', $idTutoria)->get();
                $idDocente = $infoTutorShip[0]['id_tutor'];
                $docenteInfo = Teacher::where('IdDocente', $idDocente)->get();  
                $nombreChange = $ttshipInfo['nombre'];
                $pos = strpos($nombreChange, " ");
                if ($pos != 0) $nombreChange = substr($nombreChange,0,$pos);
                $ttshipInfo['nombre'] = $nombreChange;
                $LovingTheAlien[$i] = $ttshipInfo;
                $LovingTheAlien[$i]['fullName'] = $docenteInfo[0]['ApellidoPaterno']." ".$docenteInfo[0]['ApellidoMaterno'];    
               
            }
            else {
            
                $ttshipInfo['id_tutoria'] = 0;  
                $nombreChange = $ttshipInfo['nombre'];
                $pos = strpos($nombreChange, " ");
                if ($pos != 0) $nombreChange = substr($nombreChange,0,$pos);
                $ttshipInfo['nombre'] = $nombreChange;
                $LovingTheAlien[$i] = $ttshipInfo;
                $LovingTheAlien[$i]['fullName'] = "";               
            }
            $i++;

         } 
         return $this->response->array($LovingTheAlien);

   }

}  ;
