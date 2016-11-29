<?php

namespace Intranet\Http\Controllers\API\Psp\Ps;

use Illuminate\Http\Request;
use Intranet\Models\PspProcessxSupervisor;
use Intranet\Models\PspProcess;
use Intranet\Models\Supervisor;
use Intranet\Models\FreeHour;
use Intranet\Models\meeting;
use Intranet\Models\PspStudent;
use Intranet\Models\Status;
use Intranet\Models\Student;
use Intranet\Models\Teacher;
use Intranet\Models\PspProcessxTeacher;
use Intranet\Models\Studentxinscriptionfiles;
use Intranet\Models\Inscription;
use Intranet\Models\PspDocument;

use Dingo\Api\Routing\Helpers;
use JWTAuth;
use Illuminate\Routing\Controller as BaseController;
//Tested
class Autenticar extends BaseController
{
    use Helpers;
       
       //Supervisor , reuniones

public function authStudent()
{

$array = array();
$user =  JWTAuth::parseToken()->authenticate();
$alumno = Student::where('IdUsuario',$user["IdUsuario"])->first();
$pspstucent = PspStudent::where('idalumno',$alumno['IdAlumno'])->first();


          //if($alumno["lleva_psp"]==1 && $pspstucent!=null){ //paràmetro recibido o por token
          if($alumno["lleva_psp"]==1){ 
     		 $mensaje  = "Si"; 
         }  
         else{
         	$mensaje  = "No"; 
         }
 
$array['mensaje'] = $mensaje;
//$array['psp'] = $pspstucent;
return $this->response->array($array);
}


public function authSuper()
{

$array = array();
$user =  JWTAuth::parseToken()->authenticate();
$supervisor = Supervisor::where('iduser',$user['IdUsuario'])->first();  
//$supervisor = Supervisor::find($user->IdUsuario);
$PsP = PspProcessxSupervisor::where('idsupervisor',$supervisor['id'])->first();

        //if($supervisor["idpspprocess"]!=null){ 
		if($PsP!=null){ 
     		 $mensaje  = "Si"; 
         }  
         else{
         	$mensaje  = "No"; 
         }
 
$array['mensaje'] = $mensaje;
//$array['psp'] = $supervisor;
return $this->response->array($array);
}


public function authTeach()
{

$array = array();
$user =  JWTAuth::parseToken()->authenticate();
$IdDocente = Teacher::where('IdUsuario',$user ["IdUsuario"])->first();
$PsP = PspProcessxTeacher::where('iddocente',$IdDocente['IdDocente'])->first();
		if($PsP!=null){ 
     		 $mensaje  = "Si"; 
         }  
         else{
         	$mensaje  = "No"; 
         }
 
$array['mensaje'] = $mensaje;

return $this->response->array($array);
}



   
}   