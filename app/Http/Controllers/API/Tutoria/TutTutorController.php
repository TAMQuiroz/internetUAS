<?php

namespace Intranet\Http\Controllers\API\Tutoria;
use Response;
use DB;
use DateTime;
use Illuminate\Http\Request;
use Intranet\Models\Tutstudent;
use Intranet\Models\Teacher;
use Intranet\Models\Tutorship;
use Intranet\Models\tutmeeting;
use Intranet\Models\Topic;
use Intranet\Models\Status;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller as BaseController;
//Tested
class TutTutorController extends BaseController
{
    use Helpers;
    
    public function getTutorAppoints($id)
    {
         $appointmentInfo = tutmeeting::where('id_docente',$id)->get();
         $i = 0;
         foreach ($appointmentInfo as $appointInfo) {

           $motivoInfo =  Topic::where('id', $appointInfo['id_topic'])->get();
           $statusInfo =  Status::where('id', $appointInfo['estado'])->get();
           $appointmentInfo[$i]['nombreTema'] = $motivoInfo[0]['nombre'];
           $appointmentInfo[$i]['nombreEstado'] = $statusInfo[0]['nombre'];
           $i++;
        }
         return $this->response->array($appointmentInfo->toArray());
        return $this->response->array($appointmentInfo->toArray());
    }



}  
