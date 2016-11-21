<?php

namespace Intranet\Http\Controllers\API\Psp\Meeting;
use JWTAuth;
use Response;
use DB;
use DateTime;
use Illuminate\Http\Request;
use Intranet\Models\FreeHour;
use Intranet\Models\Supervisor;
use Intranet\Models\Student;
use Intranet\Models\User;
use Intranet\Models\meeting;
use Intranet\Models\PspStudent;
use Intranet\Models\Status;
use Dingo\Api\Routing\Helpers;
use Intranet\Models\PspProcessxTeacher;
use Intranet\Models\Tutstudent;
use Mail;
use Illuminate\Routing\Controller as BaseController;


class PspMeetingController extends BaseController
{
	use Helpers;


 	public function getMeetings(){

 	

 		$user =  JWTAuth::parseToken()->authenticate();

 		if($user->IdPerfil==0){

 			$student = Student::where('IdUsuario',$user->IdUsuario)->first();
 			$meetings =  meeting::where('idstudent', $student->IdAlumno)->get();

      foreach ($meetings as $meeting) {

        $meeting['estado'] = Status::find($meeting->idtipoestado)->first();

        # code...
      }

 			

 			return $this->response->array($meetings->toArray());


 		}else if($user->IdPerfil == 6){

 			$supervisor =	Supervisor::where('iduser',$user->IdUsuario)->first();
 			$meetings = 	meeting::where('idsupervisor', $supervisor->id)->get();

 			foreach($meetings as $meeting ){

 				$meeting['estado'] =  Status::find($meeting->idtipoestado)->first();



 			}

 			

 			return $this->response->array($meetings->toArray());





 		}
 	

 	}



 	public function getMeetingByStudent($id){

 			$user =  JWTAuth::parseToken()->authenticate();

 	

 			$student = Student::find($id);

 			$meetings = 	meeting::where('idstudent', $id)->
                      where('tiporeunion', 1)->get();



 			foreach($meetings as $meeting ){

 				$meeting['estado'] =  Status::find($meeting->idtipoestado)->first();



 			}


 		
 			//$data = $meeting->toArray();
 			
 			return $this->response->array($meetings->toArray());



 	}	

 	public function update(Request $request){

 		
 	 $observation = $request['observaciones'];
 	 $feedback = $request['retroalimentacion'];
 	 $place =  $request['lugar'];
 	 $id = $request['id'];



 	 try{

 	 $meeting = meeting::where('id' , $id)->get()->first();
 	 $meeting->observaciones = $observation;
 	 $meeting->lugar = $place;
 	 $meeting->retroalimentacion = $feedback;
 	 $meeting->save();
 	 $mensaje = "Actualizacion satisfactoria";
        $array['message'] = $mensaje;
        return $this->response->array($array);



 	 }catch(Exception $e){


 	 		$mensaje = "Hubo error";
            $array['message'] = $mensaje;
            return $this->response->array($array);


 	 }

 	
 	}

//VISTA ALUMNO
public function storeByStudent(Request $request){


  $user =  JWTAuth::parseToken()->authenticate();

  try{

    $meeting = new meeting;
    $freeHour =  FreeHour::find($request['id']);

    $student = Student::where('IdUsuario',$user->IdUsuario)->first();

    $pspstudent =PspStudent::where('IdAlumno',$student->IdAlumno)->first(); 

    $meeting->idtipoestado = 12;
    $meeting->fecha=$freeHour->fecha;
    $meeting->idsupervisor=$freeHour->idsupervisor;
    $meeting->idstudent=$student->IdAlumno;
    $timestamp = mktime($freeHour->hora_ini,0,0, 0,0,0);
            $time = date('H:i:s', $timestamp);
            $meeting->hora_inicio=$time;

    $timestamp = mktime($freeHour->hora_ini+1,0,0, 0,0,0);
            $time = date('H:i:s', $timestamp);
            $meeting->hora_fin=$time;


    $meeting->asistencia='o';
    $meeting->idfreeHour=$freeHour->id;
    $meeting->tiporeunion=1; //TIPO reunion supervisor - alumno
    $meeting->lugar = $freeHour->Supervisor->direccion;

    $meeting->save();

    $pspstudent->idsupervisor=$freeHour->idsupervisor;
    $pspstudent->save();    


    $mensaje = "La cita se ha registrado exitosamente";
    $array['message'] = $mensaje;
    return $this->response->array($array);

  }catch(Exception $e){

     $mensaje = "Ocurrio un error al registrar";
    $array['message'] = $mensaje;
    return $this->response->array($array);




  }



}



//VISTA SUPERVISOR
 	public function store(Request $request){

 		try{



		$user =  JWTAuth::parseToken()->authenticate();
 		if ($user->IdPerfil == 6){

 			$supervisor =	Supervisor::where('iduser',$user->IdUsuario)->first();

 		$idUser = $supervisor->id;
 		$lugar = $request['lugar'];
 		$idAlumno =  $request['idalumno'];
 		$horaAux = $request['hora'];

 		$hora  = $horaAux.":00";
 		

 		$fecha = $request['fecha'];

      $format = "d/m/Y";
        $date= DateTime::createFromFormat($format, $fecha);

    //POR SER DE TIPO REUNION  == 1


     $pspstudent =PspStudent::where('IdAlumno',$idAlumno)->first(); 

     $freeHour = new FreeHour;
      $meeting =  new meeting;

      $freeHour->fecha = $date;
      $freeHour->hora_ini = $hora;
      $freeHour->cantidad = 1;            
      $freeHour->idsupervisor = $supervisor->id;
      $freeHour->save();
      $meeting->idfreehour = $freeHour->id;

 
       
       $timestamp = strtotime($hora) + 60*60;
       $time = date('H:i:s', $timestamp);



       
        $meeting->idtipoestado = 12;
        $meeting->hora_inicio = $hora;
        $meeting->hora_fin = $time;
        $meeting->fecha = $date;
        $meeting->idstudent = $idAlumno;
        $meeting->idsupervisor = $idUser;
        $meeting->asistencia = 'o';
        $meeting->lugar = $lugar;
        $meeting->observaciones = '';
        $meeting->tiporeunion = 1;

        $meeting->save();



            $pspstudent->idsupervisor=$freeHour->idsupervisor;
            $pspstudent->save();   

/*


 		DB::table('pspmeetings')->insertGetId(
            [
                'idtipoestado' => 12, //id del estado pendiente
               'hora_inicio' => $hora,
               'hora_fin' => $horaFin ,
               'fecha' => $date,
               'idstudent' => $idAlumno,
               'idsupervisor' => $idUser  ,
               'asistencia' =>  'o',
               'lugar' => $lugar,
               'observaciones' =>'',
               'tiporeunion' =>   1, //Reunion tipo supervisor - jefe

            ]

        );*/
		$mensaje = "Solicitud satisfactoria";
        $array['message'] = $mensaje;
        return $this->response->array($array);




 		}







 		}catch(Exception $ex){


 		$mensaje = "Solicitud Fallida";
        $array['message'] = $mensaje;
        return $this->response->array($array);



 		}

 		
 		 
 	





 	}


 //Notificacion al alumno
   public function mail($id)
    {        
        try {
            $stud = Student::find($id);
            $student = Tutstudent::where('id_usuario',$stud->IdUsuario)->first();

            
                $mail = $student->correo;
                Mail::send('emails.notifyNearMeeting',['user' => $mail], function($m) use($mail){
                    $m->subject('Notificacion de Reunión con Supervisor');
                    $m->to($mail);
                });



               $mensaje = "Notificacon Enviada";
               $array['message'] = $mensaje;
               return $this->response->array($array);
          
        } catch (Exception $e){

            $mensaje = "Ocurrió un error al hacer esta acción";
            $array['message'] = $mensaje;
            return $this->response->array($array);

          
        } 
    }




  public function getStudentsMeetings(){



        $user =  JWTAuth::parseToken()->authenticate();

        $student =  Student::where('IdUsuario', $user->IdUsuario)->first();


                
        $pspstudents = PspStudent::where('IdAlumno',$student->idalumno)->get()->first();

        
               
                        



        return $this->response->array($data );


    }







}


