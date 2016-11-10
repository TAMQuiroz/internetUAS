<?php

namespace Intranet\Http\Controllers\API\Psp\Meeting;
use JWTAuth;
use Response;
use Illuminate\Http\Request;
use Intranet\Models\FreeHour;
use Intranet\Models\Supervisor;
use Intranet\Models\Student;
use Intranet\Models\User;
use Intranet\Models\meeting;
use Intranet\Models\PspStudent;
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
 			$meeting = 	meeting::where('idsupervisor', $supervisor->id)->get();

 			$data = [ 
 			'meetings' => $meeting ];

 			return $this->response->array($data);





 		}
 	

 	}



 	public function getMeetingByStudent($id){

 			$user =  JWTAuth::parseToken()->authenticate();

 	

 			$student = Student::find($id);

 			$meeting = 	meeting::where('idstudent', $id)->get();



 		
 			$data = $meeting->toArray();
 			
 			return $this->response->array($data);



 	}	







}


