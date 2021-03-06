<?php

namespace Intranet\Http\Controllers\API\Tutoria;

use DB;
use DateTime;
Use Mail;
use Illuminate\Http\Request;
use Intranet\Models\Tutstudent;
use Intranet\Models\Teacher;
use Intranet\Models\Tutorship;
use Intranet\Models\TutSchedule;
use Intranet\Models\TutMeeting;
use Intranet\Models\Topic;
use Intranet\Models\Status;
use Intranet\Models\Parameter;
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


    public function getAppointmentList($id)
    {



         $studentInfo = Tutstudent::where('id_usuario', $id)->get();
         $appointmentInfo = TutMeeting::where('id_tutstudent',$studentInfo[0]['id'])->get();

         $i = 0;

         
       foreach ($appointmentInfo as $appointInfo) {

           $motivoInfo =  Topic::where('id', $appointInfo['id_topic'])->get();
           //$statusInfo =  Status::where('id', $appointInfo['estado'])->get();
           $appointmentInfo[$i]['nombreTema'] = $motivoInfo[0]['nombre'];
          $fechaCitaTotal = $appointInfo['inicio'];
          $fechaCitaAux = substr($fechaCitaTotal,0,10);

          $fechaCita = str_replace("-", "/", $fechaCitaAux);
          $fechaActual= date('Y/m/d');


          $fechaCitaEntero =  strtotime($fechaCita);
          $fechaActualEntero =  strtotime($fechaActual);

           if (4 == $appointInfo['estado'] and $appointInfo['creador'] == 0 and ($fechaActualEntero <= $fechaCitaEntero)) {
                $appointmentInfo[$i]['nombreEstado']  = "Pendiente";
           }
           else if  (4 == $appointInfo['estado'] and  $appointInfo['creador'] == 0 and ($fechaActualEntero > $fechaCitaEntero)  ){
                $appointmentInfo[$i]['nombreEstado']  = "Rechazada";
           }

           else if  (2 == $appointInfo['estado'] and ($fechaActualEntero > $fechaCitaEntero)  ){
                $appointmentInfo[$i]['nombreEstado']  = "No asistida";
           }
           else if  (2 == $appointInfo['estado'] and ($fechaActualEntero <= $fechaCitaEntero) ){
                $appointmentInfo[$i]['nombreEstado']  = "Confirmada";
           }
           else if  (3 == $appointInfo['estado']){
                $appointmentInfo[$i]['nombreEstado']  = "Cancelada";
           }
           else if  (4 == $appointInfo['estado'] and $appointInfo['creador'] == 1 and ($fechaActualEntero > $fechaCitaEntero) ){
              $appointmentInfo[$i]['nombreEstado']  = "Rechazada";
           }
            else if  (4 == $appointInfo['estado'] and $appointInfo['creador'] == 1 and ($fechaActualEntero <= $fechaCitaEntero) ) {
              $appointmentInfo[$i]['nombreEstado']  = "Sugerida";
            }
           else if  (5 == $appointInfo['estado'] ){
                $appointmentInfo[$i]['nombreEstado']  = "Rechazada";
           }
            else if  (6 == $appointInfo['estado'] ){
              $appointmentInfo[$i]['nombreEstado']  = "Asistida";
            }
            else if  (7 == $appointInfo['estado'] ){
              $appointmentInfo[$i]['nombreEstado']  = "No asistida";
            }

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
        //---------------BEGIN FINALDATETIME ---------
        $dateStringAux = $request->only('fecha');
        $dateString = $dateStringAux['fecha']; //fecha reserva 
        $horaAux1 =  $request->only('horaF');  
        $horaAux2 = $horaAux1['horaF']; 
        $hora =  $horaAux2.":00"; // hora reserva ejem 12:00:00
        $dateHour = $dateString." ".$hora;
        $format = "d/m/Y H:i:s";
        $dateTimeEnd= DateTime::createFromFormat($format, $dateHour); //dateTime para registrar a la base de datos
        //---------------END FINALDATETIME------------


        //------------BEGIN MOTIVO--------------------
        $motivoAux = $request->only('motivo');
        $motivoString = $motivoAux['motivo'];
        $motivoInfo =  Topic::where('nombre',   $motivoString)->get();

        //--------------END MOTIVO--------------------

        //------INICIO OBTENIENDO ID DEL TUTOR--------
         $tutorshipInfo = Tutorship::where('id',$studentInfo[0]['id_tutoria'])->get();
         $idDocente = $tutorshipInfo[0]['id_profesor'];  
        //------FIN OBTENIENDO ID DEL TUTOR-----------

         $teacherInfo = Teacher::where('IdDocente',$idDocente)->get();
         $duracionCitaAux = $request->only('duracionCita');
         $duracionCita = $duracionCitaAux['duracionCita'];

        //-------------BEGIN DATABASE INSERT ---------------
        DB::table('tutmeetings')->insertGetId(
            [
                'id_tutstudent' => $studentInfo[0]['id'],
                'inicio' => $dateTimeBegin,
                'fin'  => $dateTimeEnd,
                'duracion' => $duracionCita,
                'id_docente' => $idDocente,
                'id_topic' => $motivoInfo[0]['id'],
                'creador' => 0,
                'no_programada' => 0,
                'estado' => 4
            ]

        );
        //-------------END DATABASE INSERT ---------------

   /*

        $fecha =  $dateString;
        $hora = $horaAux2;
        $mail = $studentInfo[0]['correo'];


        try
        {
            Mail::send('emails.notifyTutorAppointment', compact('fecha','hora'), function($m) use($mail) {
                $m->subject('Su alumno   desea tener una reunión contigo - UASTUTORIA');
                $m->to($mail);
            });
        }
        catch (\Exception $e)
        {
            dd($e->getMessage());
        }
*/
        return "exito";    



        
    }


    public function filterStudentAppointment(Request $request)
    {        
       
        $fechaInicioAux =  $request->only('fechaI');
        $fechaFinAux =  $request->only('fechaF');
        $motivoAux = $request->only('motivo');
        $idAux = $request->only('idUser');
        $id = $idAux['idUser'];
        $fechaInicioChangeFormat =  $fechaInicioAux['fechaI'];
        $fechaFinChangeFormat =  $fechaFinAux['fechaF'];
        $motivo =  $motivoAux['motivo'];

        $fechaInicio = $fechaInicioAux['fechaI'];
        $fechaFin = $fechaFinAux['fechaF'];
        $rest = substr($fechaInicio, -3, 1); // returns "d"


        $fechaInicio1 = date("Y/m/d ", strtotime(str_replace("/","-",$fechaInicioChangeFormat)));
        $fechaFin1 = date("Y/m/d", strtotime(str_replace("/","-",$fechaFinChangeFormat)));

        if (empty($fechaInicio) && empty($fechaFin) && empty($motivo)){

            $studentInfo = Tutstudent::where('id_usuario', $id)->get();
            $appointmentInfo = TutMeeting::where('id_tutstudent',$studentInfo[0]['id'])->get();
            $i = 0;

       
        


            foreach ($appointmentInfo as $appointInfo) {
                $motivoInfo =  Topic::where('id', $appointInfo['id_topic'])->get();
                //$statusInfo =  Status::where('id', $appointInfo['estado'])->get();
                $appointmentInfo[$i]['nombreTema'] = $motivoInfo[0]['nombre'];

                $fechaCitaTotal = $appointInfo['inicio'];
                $fechaCitaAux = substr($fechaCitaTotal,0,10);
                $fechaCita = str_replace("-", "/", $fechaCitaAux);
                $fechaActual= date('Y/m/d');
                $fechaCitaEntero =  strtotime($fechaCita);
                $fechaActualEntero =  strtotime($fechaActual);


                if (4 == $appointInfo['estado'] and $appointInfo['creador'] == 0 and ($fechaActualEntero <= $fechaCitaEntero)) {
                    $appointmentInfo[$i]['nombreEstado']  = "Pendiente";
                }
                else if  (4 == $appointInfo['estado'] and  $appointInfo['creador'] == 0 and ($fechaActualEntero > $fechaCitaEntero)  ){
                    $appointmentInfo[$i]['nombreEstado']  = "Rechazada";
                }

                else if  (2 == $appointInfo['estado'] and ($fechaActualEntero > $fechaCitaEntero)  ){
                    $appointmentInfo[$i]['nombreEstado']  = "No asistida";
                }
                else if  (2 == $appointInfo['estado'] and ($fechaActualEntero <= $fechaCitaEntero) ){
                    $appointmentInfo[$i]['nombreEstado']  = "Confirmada";
                }
                else if  (3 == $appointInfo['estado']){
                    $appointmentInfo[$i]['nombreEstado']  = "Cancelada";
                }
                else if  (4 == $appointInfo['estado'] and $appointInfo['creador'] == 1 and ($fechaActualEntero > $fechaCitaEntero) ){
                    $appointmentInfo[$i]['nombreEstado']  = "Rechazada";
                }
                else if  (4 == $appointInfo['estado'] and $appointInfo['creador'] == 1 and ($fechaActualEntero <= $fechaCitaEntero) ) {
                    $appointmentInfo[$i]['nombreEstado']  = "Sugerida";
                }
                else if  (5 == $appointInfo['estado'] ){
                    $appointmentInfo[$i]['nombreEstado']  = "Rechazada";
                }
                else if  (6 == $appointInfo['estado'] ){
                    $appointmentInfo[$i]['nombreEstado']  = "Asistida";
                }
                else if  (7 == $appointInfo['estado'] ){
                    $appointmentInfo[$i]['nombreEstado']  = "No asistida";
                }
                $i++;
            }
            return $this->response->array($appointmentInfo->toArray());

        }


        else if (empty($fechaInicio) && empty($fechaFin) && !empty($motivo)) {

            $studentInfo = Tutstudent::where('id_usuario', $id)->get();
            //$motivoInformation =  Topic::where('nombre', $motivo)->get();
            if ("Pendiente" == $motivo){
                $idMotivo  = 4;
            }
            else if  ("Confirmada" == $motivo){
                $idMotivo  = 2;
            }
            else if  ("Cancelada" == $motivo){
                $idMotivo  = 3;
            }
            else if  ("Sugerida" == $motivo){
                $idMotivo  = 4;
            }
            else if  ("Rechazada" == $motivo){
                $idMotivo  = 4;
            }
            else if  ("Asistida" == $motivo){
                $idMotivo  = 6;
            }
            else if  ("No asistida" == $motivo){
                $idMotivo  = 2;
            }

            $appointmentInfo = TutMeeting::where('id_tutstudent',$studentInfo[0]['id'])->where('estado',$idMotivo)->get();
            $i = 0;

            foreach ($appointmentInfo as $appointInfo) {
                $motivoInfo =  Topic::where('id', $appointInfo['id_topic'])->get();
                $appointmentInfo[$i]['nombreTema'] = $motivoInfo[0]['nombre'];

                $fechaCitaTotal = $appointInfo['inicio'];
                $fechaCitaAux = substr($fechaCitaTotal,0,10);
                $fechaCita = str_replace("-", "/", $fechaCitaAux);
                $fechaActual= date('Y/m/d');
                $fechaCitaEntero =  strtotime($fechaCita);
                $fechaActualEntero =  strtotime($fechaActual);


                if (4 == $appointInfo['estado'] and $appointInfo['creador'] == 0 and ($fechaActualEntero <= $fechaCitaEntero)) {
                    $appointmentInfo[$i]['nombreEstado']  = "Pendiente";
                }
                else if  (4 == $appointInfo['estado'] and  $appointInfo['creador'] == 0 and ($fechaActualEntero > $fechaCitaEntero)  ){
                    $appointmentInfo[$i]['nombreEstado']  = "Rechazada";
                }

                else if  (2 == $appointInfo['estado'] and ($fechaActualEntero > $fechaCitaEntero)  ){
                    $appointmentInfo[$i]['nombreEstado']  = "No asistida";
                }
                else if  (2 == $appointInfo['estado'] and ($fechaActualEntero <= $fechaCitaEntero) ){
                    $appointmentInfo[$i]['nombreEstado']  = "Confirmada";
                }
                else if  (3 == $appointInfo['estado']){
                    $appointmentInfo[$i]['nombreEstado']  = "Cancelada";
                }
                else if  (4 == $appointInfo['estado'] and $appointInfo['creador'] == 1 and ($fechaActualEntero > $fechaCitaEntero) ){
                    $appointmentInfo[$i]['nombreEstado']  = "Rechazada";
                }
                else if  (4 == $appointInfo['estado'] and $appointInfo['creador'] == 1 and ($fechaActualEntero <= $fechaCitaEntero) ) {
                    $appointmentInfo[$i]['nombreEstado']  = "Sugerida";
                }
                else if  (5 == $appointInfo['estado'] ){
                    $appointmentInfo[$i]['nombreEstado']  = "Rechazada";
                }
                else if  (6 == $appointInfo['estado'] ){
                    $appointmentInfo[$i]['nombreEstado']  = "Asistida";
                }
                else if  (7 == $appointInfo['estado'] ){
                    $appointmentInfo[$i]['nombreEstado']  = "No asistida";
                }
                $i++;
            }
            return $this->response->array($appointmentInfo->toArray());

        }



        else if (!empty($fechaInicio) && !empty($fechaFin) && empty($motivo)) {

            $fechaInicioUsar = $fechaInicio1." "."00:00:00";
            $fechaFinUsar = $fechaFin1." "."23:59:00";

            $studentInfo = Tutstudent::where('id_usuario', $id)->get();
            $appointmentInfo = TutMeeting::where('id_tutstudent',$studentInfo[0]['id'])->where('inicio','>=',$fechaInicioUsar)->where('inicio','<=',$fechaFinUsar)->get();
           // $appointmentInfo = TutMeeting::where('id_tutstudent',$studentInfo[0]['id'])->get();
            $i = 0;

            foreach ($appointmentInfo as $appointInfo) {
                $motivoInfo =  Topic::where('id', $appointInfo['id_topic'])->get();
                //$statusInfo =  Status::where('id', $appointInfo['estado'])->get();
                $appointmentInfo[$i]['nombreTema'] = $motivoInfo[0]['nombre'];

                $fechaCitaTotal = $appointInfo['inicio'];
                $fechaCitaAux = substr($fechaCitaTotal,0,10);
                $fechaCita = str_replace("-", "/", $fechaCitaAux);
                $fechaActual= date('Y/m/d');
                $fechaCitaEntero =  strtotime($fechaCita);
                $fechaActualEntero =  strtotime($fechaActual);



                if (4 == $appointInfo['estado'] and $appointInfo['creador'] == 0 and ($fechaActualEntero <= $fechaCitaEntero)) {
                    $appointmentInfo[$i]['nombreEstado']  = "Pendiente";
                }
                else if  (4 == $appointInfo['estado'] and  $appointInfo['creador'] == 0 and ($fechaActualEntero > $fechaCitaEntero)  ){
                    $appointmentInfo[$i]['nombreEstado']  = "Rechazada";
                }

                else if  (2 == $appointInfo['estado'] and ($fechaActualEntero > $fechaCitaEntero)  ){
                    $appointmentInfo[$i]['nombreEstado']  = "No asistida";
                }
                else if  (2 == $appointInfo['estado'] and ($fechaActualEntero <= $fechaCitaEntero) ){
                    $appointmentInfo[$i]['nombreEstado']  = "Confirmada";
                }
                else if  (3 == $appointInfo['estado']){
                    $appointmentInfo[$i]['nombreEstado']  = "Cancelada";
                }
                else if  (4 == $appointInfo['estado'] and $appointInfo['creador'] == 1 and ($fechaActualEntero > $fechaCitaEntero) ){
                    $appointmentInfo[$i]['nombreEstado']  = "Rechazada";
                }
                else if  (4 == $appointInfo['estado'] and $appointInfo['creador'] == 1 and ($fechaActualEntero <= $fechaCitaEntero) ) {
                    $appointmentInfo[$i]['nombreEstado']  = "Sugerida";
                }
                else if  (5 == $appointInfo['estado'] ){
                    $appointmentInfo[$i]['nombreEstado']  = "Rechazada";
                }
                else if  (6 == $appointInfo['estado'] ){
                    $appointmentInfo[$i]['nombreEstado']  = "Asistida";
                }
                else if  (7 == $appointInfo['estado'] ){
                    $appointmentInfo[$i]['nombreEstado']  = "No asistida";
                }
            }
            return $this->response->array($appointmentInfo->toArray());
        }

        //holas


        else if (!empty($fechaInicio) && !empty($fechaFin) && !empty($motivo)) {

            $fechaInicioUsar = $fechaInicio1." "."00:00:00";
            $fechaFinUsar = $fechaFin1." "."23:59:00";


            $studentInfo = Tutstudent::where('id_usuario', $id)->get();


             if ("Pendiente" == $motivo){
                $idMotivo  = 4;
            }
            else if  ("Confirmada" == $motivo){
                $idMotivo  = 2;
            }
            else if  ("Cancelada" == $motivo){
                $idMotivo  = 3;
            }
            else if  ("Sugerida" == $motivo){
                $idMotivo  = 4;
            }
            else if  ("Rechazada" == $motivo){
                $idMotivo  = 4;
            }
            else if  ("Asistida" == $motivo){
                $idMotivo  = 6;
            }
            else if  ("No asistida" == $motivo){
                $idMotivo  = 2;
            }

            $appointmentInfo = TutMeeting::where('estado',$idMotivo)->where('id_tutstudent',$studentInfo[0]['id'])->where('inicio','>=',$fechaInicioUsar)->where('inicio','<=',$fechaFinUsar)->get();
           // $appointmentInfo = TutMeeting::where('id_tutstudent',$studentInfo[0]['id'])->get();
            $i = 0; 

            foreach ($appointmentInfo as $appointInfo) {
                $motivoInfo =  Topic::where('id', $appointInfo['id_topic'])->get();
                //$statusInfo =  Status::where('id', $appointInfo['estado'])->get();
                $appointmentInfo[$i]['nombreTema'] = $motivoInfo[0]['nombre'];

                $fechaCitaTotal = $appointInfo['inicio'];
                $fechaCitaAux = substr($fechaCitaTotal,0,10);
                $fechaCita = str_replace("-", "/", $fechaCitaAux);
                $fechaActual= date('Y/m/d');
                $fechaCitaEntero =  strtotime($fechaCita);
                $fechaActualEntero =  strtotime($fechaActual);



                if (4 == $appointInfo['estado'] and $appointInfo['creador'] == 0 and ($fechaActualEntero <= $fechaCitaEntero)) {
                    $appointmentInfo[$i]['nombreEstado']  = "Pendiente";
                }
                else if  (4 == $appointInfo['estado'] and  $appointInfo['creador'] == 0 and ($fechaActualEntero > $fechaCitaEntero)  ){
                    $appointmentInfo[$i]['nombreEstado']  = "Rechazada";
                }

                else if  (2 == $appointInfo['estado'] and ($fechaActualEntero > $fechaCitaEntero)  ){
                    $appointmentInfo[$i]['nombreEstado']  = "No asistida";
                }
                else if  (2 == $appointInfo['estado'] and ($fechaActualEntero <= $fechaCitaEntero) ){
                    $appointmentInfo[$i]['nombreEstado']  = "Confirmada";
                }
                else if  (3 == $appointInfo['estado']){
                    $appointmentInfo[$i]['nombreEstado']  = "Cancelada";
                }
                else if  (4 == $appointInfo['estado'] and $appointInfo['creador'] == 1 and ($fechaActualEntero > $fechaCitaEntero) ){
                    $appointmentInfo[$i]['nombreEstado']  = "Rechazada";
                }
                else if  (4 == $appointInfo['estado'] and $appointInfo['creador'] == 1 and ($fechaActualEntero <= $fechaCitaEntero) ) {
                    $appointmentInfo[$i]['nombreEstado']  = "Sugerida";
                }
                else if  (5 == $appointInfo['estado'] ){
                    $appointmentInfo[$i]['nombreEstado']  = "Rechazada";
                }
                else if  (6 == $appointInfo['estado'] ){
                    $appointmentInfo[$i]['nombreEstado']  = "Asistida";
                }
                else if  (7 == $appointInfo['estado'] ){
                    $appointmentInfo[$i]['nombreEstado']  = "No asistida";
                }
                $i++;
            }
            return $this->response->array($appointmentInfo->toArray());

        }

    }

    public function getTutorById($id_usuario)
    {        

        
        $studentInfo = Tutstudent::where('id_usuario',$id_usuario)->get(); //deberia darme 5 //aca no se cae
        $tutorshipInfo = Tutorship::where('id',$studentInfo[0]['id_tutoria'])->get();   //  aca no se cae
        $teacherInfo = Teacher::where('idDocente',$tutorshipInfo[0]['id_profesor'])->get(); //aca no se cae
        $scheduleInfo = TutSchedule::where('id_docente',$tutorshipInfo[0]['id_profesor'])->get();
        $scheduleMeeting = TutMeeting::where('id_tutstudent',$studentInfo[0]['id'])->get();


        $parametersInfo = Parameter::where('id_especialidad',$studentInfo[0]['id_especialidad'])->get();     
        $teacherInfo[0]['numberDays'] = $parametersInfo[0]['number_days'];
        $teacherInfo[0]['duracionCita'] = $parametersInfo[0]['duracionCita'];

        $teacherInfo[0]['scheduleInfo'] = '';
        $teacherInfo[0]['scheduleMeeting'] = '';

        $i = 0;
        foreach ($teacherInfo as $teacher) {
           $teacherInfo[$i]->scheduleInfo= $scheduleInfo;
           $teacherInfo[$i]->scheduleMeeting= $scheduleMeeting;
           $i++;
        }


                       
        return $this->response->array($teacherInfo->toArray());
    }



}  
