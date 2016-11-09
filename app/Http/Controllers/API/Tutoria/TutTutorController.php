<?php

namespace Intranet\Http\Controllers\API\Tutoria;
use Response;
use DB;
use DateTime;
use Illuminate\Http\Request;
use Intranet\Models\Tutstudent;
use Intranet\Models\Teacher;
use Intranet\Models\Tutorship;
use Intranet\Models\TutMeeting;
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

          if (1 == $appointInfo['estado']){
           		$appointmentInfo[$i]['nombreEstado']  = "Pendiente";
          }
          else if  (2 == $appointInfo['estado']){
           		$appointmentInfo[$i]['nombreEstado']  = "Confirmada";
          }
          else if  (3 == $appointInfo['estado']){
              $appointmentInfo[$i]['nombreEstado']  = "Cancelada";
          }

          $appointmentInfo[$i]['nombreTema'] = $motivoInfo[0]['nombre'];
		      $appointmentInfo[$i]['nombreAlumno'] = $studentInfo[0]['nombre']." ".$studentInfo[0]['ape_paterno']." ".$studentInfo[0]['ape_materno'];

           $i++;
        }
         return $this->response->array($appointmentInfo->toArray());
    }

    public function getAppointInformationTuto($id)
    {
      

        // ACA DEBERIAMOS OBTENER LOS DATOS DEL ALUMNO DEL TUTOR, ADEMAS DE OTRAS COSAS QUE SIRVAN DE INFORMACION PARA LAS CITAS (AUN NO LO HE HECHO XD)

         $docenteInfo = Teacher::where('idUsuario',$id)->get();
         $tutorshipInfo = Tutorship::where('id_profesor',$docenteInfo[0]['IdDocente'])->get();
         $i=0;
         $LovingTheAlien;
         foreach ($tutorshipInfo as $ttshipInfo) {

            $idAlumno = $ttshipInfo['id_alumno'];
            $infoStudent = Tutstudent::where('id', $idAlumno)->get();
            $LovingTheAlien[$i] = $infoStudent[0];
            $LovingTheAlien[$i]['fullName'] = $infoStudent[0]['ape_paterno']." ".$infoStudent[0]['ape_materno']." ".$infoStudent[0]['nombre'];

            $i++;
         } 
      

         return $this->response->array($LovingTheAlien);
  
        
    }


    public function updatePendienteAppointmentList(Request $request)
    {
	    
        $idUser = $request->only('idUser');
        //Guardar
        $groupTut = TutMeeting::find($idUser['idUser']);
        $groupTut->estado = 2;
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





}  
