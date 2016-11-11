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
use Illuminate\Routing\Controller as BaseController;


class PspMeetingController extends BaseController
{
	use Helpers;


 	public function getMeetings(){

 	

 		$user =  JWTAuth::parseToken()->authenticate();

 		if($user->IdPerfil==0){

 			$student = Student::where('IdUsuario',$user->IdUsuario)->first();
 			$meetings =  meeting::where('idstudent', $student->IdAlumno)->get();

 			$data = [
 			'meetings' => $meetings,

 			];

 			$data['student'] = $student;


 			return $this->response->array($data);


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

 			$meetings = 	meeting::where('idstudent', $id)->get();



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


 	public function store(Request $request){

 		$user =  JWTAuth::parseToken()->authenticate();
 		if ($user->IdPerfil == 6){

 			$supervisor =	Supervisor::where('iduser',$user->IdUsuario)->first();

 		$idUser = $supervisor->id;
 		$lugar = $request['lugar'];
 		$idAlumno =  $request['idalumno'];
 		$horaAux = $request['hora'];
 		$hora  = $horaAux.":00";
 		$horaFin = $hora;
 		$horaFin[3] = '3';

 		$fecha = $request['fecha'];
 	

 		$format = "d/m/Y";
        $date= DateTime::createFromFormat($format, $fecha);

 		DB::table('pspmeetings')->insertGetId(
            [
                'idtipoestado' => 12, //id del estado pendiente
               'hora_inicio' => $hora,
               'hora_fin' => $horaFin ,
               'fecha' => $date,
               'idstudent' => $idAlumno,
               'idsupervisor' => $idUser  ,
               'asistencia' =>  'No se ha registrado',
               'lugar' => $lugar,
               'observaciones' =>'',
               'tiporeunion' =>   1, //Reunion tipo supervisor - jefe

            ]

        );
		$mensaje = "Solicitud satisfactoria";
        $array['message'] = $mensaje;
        return $this->response->array($array);




 		}

 		 
 	





 	}







}


