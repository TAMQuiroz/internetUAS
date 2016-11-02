<?php

namespace Intranet\Http\Controllers\API\Tutoria;

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
class TutStudentController extends BaseController
{
    user_error() Helpers;
    
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


    public function getAppointmentList()
    {
         // return "civil ctm";
         $appointmentInfo = tutmeeting::get();
         $i = 0;

       foreach ($appointmentInfo as $appointInfo) {

           $motivoInfo =  Topic::where('id', $appointInfo['id_topic'])->get();
           $statusInfo =  Status::where('id', $appointInfo['estado'])->get();
           $appointmentInfo[$i]['nombreTema'] = $motivoInfo[0]['nombre'];
           $appointmentInfo[$i]['nombreEstado'] = $statusInfo[0]['nombre'];
           $i++;
        }
         return $this->response->array($appointmentInfo->toArray());
    }


    public function postAppointment(Request $request)
    {        
       

        $studentInfo = Tutstudent::where('id_usuario', $request->only('idUser'))->get(); // permite registrar el id del studiante  

        //------------BEGIN DATETIME------------------
        $dateStringAux = $request->only('fecha');
        $dateString = $dateStringAux['fecha']; //fecha reserva 
        $horaAux1 =  $request->only('hora');  
        $horaAux2 = $horaAux1['hora']; 
        $hora =  $horaAux2.":00"; // hora reserva ejem 12:00:00
        $dateHour = $dateString." ".$hora;
        $format = "d/m/Y H:i:s";
        $dateTimeBegin= DateTime::createFromFormat($format, $dateHour); //dateTime para registrar a la base de datos
        //--------------END DATETIME------------------

        //------------BEGIN MOTIVO--------------------
        $motivoAux = $request->only('motivo');
        $motivoString = $motivoAux['motivo'];
        $motivoInfo =  Topic::where('nombre', $motivoString)->get();

        //--------------END MOTIVO--------------------

        //------INICIO OBTENIENDO ID DEL TUTOR--------
         $tutorshipInfo = Tutorship::where('id',$studentInfo[0]['id_tutoria'])->get();
        // $idDocente = $tutorshipInfo[0]['id_profesor']; 
         $idDocente = 4;                                    // Por el momento
        //------FIN OBTENIENDO ID DEL TUTOR-----------


        //-------------BEGIN DATABASE INSERT ---------------
        DB::table('tutmeetings')->insertGetId(
            [
                'id_tutstudent' => $studentInfo[0]['id'],
                'inicio' => $dateTimeBegin,
                //'fin'  => $dateTimeFin,
                //'duracion' => $dateTimeEnd,
                'id_docente' => $idDocente,
                'id_topic' => $motivoInfo[0]['id'],
                'no_programada' => 0,
                'estado' => 12
            ]

        );
        //-------------END DATABASE INSERT ---------------

        return "exito";    
    }

    public function getTutorById($id_usuario)
    {        

        $studentInfo = Tutstudent::where('id_usuario',$id_usuario)->get(); //deberia darme 5
       // $tutorshipInfo = Tutorship::where('id',5)->get();
        $tutorshipInfo = Tutorship::where('id',$studentInfo[0]['id_tutoria'])->get();
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
