<?php

namespace Intranet\Http\Controllers\API\Tutoria;
use Response;
use DB;
use Mail;
use DateTime;
use Illuminate\Http\Request;
use Intranet\Models\Tutstudent;
use Intranet\Models\TutSchedule;
use Intranet\Models\Teacher;
use Intranet\Models\Tutorship;
use Intranet\Models\TutMeeting;
use Intranet\Models\Parameter;
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
	    


	       $docenteInfo = Teacher::where('idUsuario',$id)->get();
         $appointmentInfo = TutMeeting::where('id_docente',$docenteInfo[0]['IdDocente'])->get();
         $i = 0;
         foreach ($appointmentInfo as $appointInfo) {

          $motivoInfo =  Topic::where('id', $appointInfo['id_topic'])->get();
		      $studentInfo =  Tutstudent::where('id', $appointInfo['id_tutstudent'])->get();
          $fechaCitaTotal = $appointInfo['inicio'];
          $fechaCitaAux = substr($fechaCitaTotal,0,10);

          $fechaCita = str_replace("-", "/", $fechaCitaAux);
          $fechaActual= date('Y/m/d');


          $fechaCitaEntero =  strtotime($fechaCita);
          $fechaActualEntero =  strtotime($fechaActual);



          
          if (4 == $appointInfo['estado'] and $appointInfo['creador'] == 1 and ($fechaActualEntero <= $fechaCitaEntero)) {
                $appointmentInfo[$i]['nombreEstado']  = "Pendiente";
          }
          else if  (4 == $appointInfo['estado'] and  $appointInfo['creador'] == 1 and ($fechaActualEntero > $fechaCitaEntero)  ){
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

          else if  (4 == $appointInfo['estado'] and $appointInfo['creador'] == 0 and ($fechaActualEntero < $fechaCitaEntero) ){
              $appointmentInfo[$i]['nombreEstado']  = "Rechazada";
          }
          else if  (4 == $appointInfo['estado'] and $appointInfo['creador'] == 0 and ($fechaActualEntero >= $fechaCitaEntero) ) {
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


          $appointmentInfo[$i]['nombreTema'] = $motivoInfo[0]['nombre'];
		      $appointmentInfo[$i]['nombreAlumno'] = $studentInfo[0]['nombre']." ".$studentInfo[0]['ape_paterno']." ".$studentInfo[0]['ape_materno'];

           $i++;
        }

         return $this->response->array($appointmentInfo->toArray());
    

    }

    public function getAppointInformationTuto($id)
    {
      

        // ACA DEBERIAMOS OBTENER LOS DATOS DEL ALUMNO DEL TUTOR, ADEMAS DE OTRAS COSAS QUE SIRVAN DE INFORMACION PARA LAS CITAS  COMO CALENDARIO(AUN NO LO HE HECHO XD)

         $docenteInfo = Teacher::where('idUsuario',$id)->get();
         $tutorshipInfo = Tutorship::where('id_profesor',$docenteInfo[0]['IdDocente'])->get();
         $parametersInfo = Parameter::where('id_especialidad',1)->get();

       

         $i=0;
         $LovingTheAlien;
         foreach ($tutorshipInfo as $ttshipInfo) {

            $idAlumno = $ttshipInfo['id_alumno'];
            $infoStudent = Tutstudent::where('id', $idAlumno)->get();
            $scheduleInfo = TutSchedule::where('id_docente',$tutorshipInfo[0]['id_profesor'])->get();
            $scheduleMeeting = TutMeeting::where('id_docente',$docenteInfo[0]['IdDocente'])->get();
            $LovingTheAlien[$i] = $infoStudent[0];
            $LovingTheAlien[$i]['fullName'] = $infoStudent[0]['ape_paterno']." ".$infoStudent[0]['ape_materno']." ".$infoStudent[0]['nombre'];
            $LovingTheAlien[$i]['duracionCita'] = $parametersInfo[0]['duracionCita'];
            $LovingTheAlien[$i]['numberDays'] = $parametersInfo[0]['number_days'];
            $LovingTheAlien[$i]->scheduleInfo = $scheduleInfo;
            $LovingTheAlien[$i]->scheduleMeeting= $scheduleMeeting;

            $i++;
         } 
      

         return $this->response->array($LovingTheAlien);
  

  
    }

    public function obtenerDatosCitaConfirmada($id)
    {
      
        // ME LLEGO AL PINCHO EL INGLES XDXDXDXDXDXDXDX
        // ACA DEBERIAMOS OBTENER LOS DATOS DEL ALUMNO DEL TUTOR, ADEMAS DE OTRAS COSAS QUE SIRVAN DE INFORMACION PARA LAS CITAS  COMO CALENDARIO(AUN NO LO HE HECHO XD)

         $tutMeetingInfo = TutMeeting::where('id',$id)->get();
         $tutStudentInfo = Tutstudent::where('id',$tutMeetingInfo[0]['id_tutstudent'])->get();
         $tutMeetingInfo[0]->studentInfo= $tutStudentInfo;
         return $this->response->array($tutMeetingInfo->toArray());

  
    }

 
    public function postAppointment(Request $request)
    {
      
 

 
 
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
        $idUserAux = $request->only('idUser');
        $idUser = $idUserAux['idUser'];
        $tutorInfo = Teacher::where('IdUsuario', $idUserAux['idUser'])->get();  // obtenemos la informacion para conseguir el IDDocente
        $idDocente = $tutorInfo[0]['IdDocente'];
        //------FIN OBTENIENDO ID DEL TUTOR-----------
        //------INICIO OBTENIENDO ID DEL ALUMNO--------
       
        $fullNameAux = $request->only('studentFullName');
        $fullName = $fullNameAux['studentFullName'];
        $pos = strpos($fullName, " ");
        $apePaterno = substr($fullName,0,$pos);
        $nameAux1 =  substr($fullName,$pos+1);
        $pos1 = strpos($nameAux1, " ");
        $apeMaterno = substr($nameAux1,0,$pos1);
        $nombre =  substr($nameAux1,$pos1+1);
        //$studentInfo = Tutstudent::where('ape_paterno',$apePaterno)->where('ape_materno',$apeMaterno)->where('nombre',$nombre)->get();
        $studentInfo = Tutstudent::where('ape_paterno',$apePaterno)->where('ape_materno',$apeMaterno)->where('nombre',$nombre)->get();

        //------FIN OBTENIENDO ID DEL ALUMNO-----------
    

        //-------------BEGIN DATABASE INSERT ---------------
        DB::table('tutmeetings')->insertGetId(
            [
                'id_tutstudent' => $studentInfo[0]['id'],
                'inicio' => $dateTimeBegin,
                //  'fin'  => $dateTimeFin,
                // 'duracion' => $dateTimeEnd,
                'id_docente' => $idDocente,
                'id_topic' => $motivoInfo[0]['id'],
                'creador' => 1,
                'no_programada' => 0,
                'estado' => 4
            ]

        );
        //-------------END DATABASE INSERT ---------------



        $fecha =  $dateString;
        $hora = $horaAux2;
        $mail = $studentInfo[0]['correo'];

        try
        {
            Mail::send('emails.notifyStudentSuggestion', compact('fecha','hora'), function($m) use($mail) {
                $m->subject('Su tutor desea tener una reunión contigo - UASTUTORIA');
                $m->to($mail);
            });
        }
        catch (\Exception $e)
        {
            dd($e->getMessage());
        }

        return "exito";    

        
    }



    public function updatePendienteAppointmentList(Request $request)
    {
	    
        $idUser = $request->only('idUser');
        //Guardar
        $groupTut = TutMeeting::find($idUser['idUser']);
        $groupTut->estado = 2;
        $groupTut->lugar = "Oficina del tutor";
        $groupTut->adicional = "-";

        $groupTut->save();

        //Retornar mensaje
        $mensaje = 'Se modifico correctamente';

    }

      public function cancelAppointmentList(Request $request)
    {
      
        $idUser = $request->only('idUser');
        //Guardar
        $groupTut = TutMeeting::find($idUser['idUser']);
        $groupTut->estado = 3;
        $groupTut->save();

        //Retornar mensaje
        $mensaje = 'Se modifico correctamente';

    }

    public function refuseAppointmentList(Request $request)
    {
      
        $idUser = $request->only('idUser');
        //Guardar
        $groupTut = TutMeeting::find($idUser['idUser']);
        $groupTut->estado = 5;
        $groupTut->save();

        //Retornar mensaje
        $mensaje = 'Se modifico correctamente';

    }

    public function atenderCita(Request $request)
    {
      
        $idUser = $request->only('idUser');
        $cita =  $request->only('fecha');

        //Guardar
        $groupTut = TutMeeting::find($idUser['idUser']);
        $groupTut->estado = 6;
        $groupTut->observacion = $cita['fecha'];
        $groupTut->save();

        //Retornar mensaje
        $mensaje = 'Se modifico correctamente';

    }



}  
