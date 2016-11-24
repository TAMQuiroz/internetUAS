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
class DocumentosController extends BaseController
{
    use Helpers;
       
       //Supervisor , reuniones

public function getAll()
{

$array = array();
$user =  JWTAuth::parseToken()->authenticate();
$alumno = Student::where('IdUsuario',$user["IdUsuario"])->first();
$documentosActual = PspDocument::where('idstudent',$alumno["IdAlumno"])->get();
$status = Status::get();

foreach ($documentosActual as $value) {
    $value["idtipoestado"] = Status::where("id",$value->idtipoestado)->first()->nombre;
	if ($value["ruta"]!=""){
	$value["idtipoestado"] = "Subido";
    }
    else
    {
    	$value["idtipoestado"] = "No Subido";
    }
}

$array['Documentos']=$documentosActual;


return $this->response->array($array);
}

public function getAllStudentSuper()
{


$user =  JWTAuth::parseToken()->authenticate();
$supervisor = Supervisor::find($user->IdUsuario);          
$todosProcesos = PspProcess::get();
$procesosDelSupervisor = PspProcessxSupervisor::where('idsupervisor',$supervisor['id'])->get(); //Sentencia depende si pspProcessXsupervisor esta llena
$pspSudentDelSupervisor = PspStudent::where('idsupervisor',$supervisor['id'])->get();
$alumnosDePspStudent = array();
$count = 0;
foreach ($pspSudentDelSupervisor as $value)
{
  $alumnosDePspStudent[$count] = Student::find($value["idalumno"]);
  $count= $count+1;
}


$array = array();
//$array['su']=$supervisor;
$array['alumpsp']=$pspSudentDelSupervisor;
$array['alum']=$alumnosDePspStudent;
//$array['docs']=$documentosActual3;

return $this->response->array($array);
}

public function getDbyId($id)
{

$array = array();
$documentosActual = PspDocument::where('idstudent',$id)->get();
/*
$user =  JWTAuth::parseToken()->authenticate();
$alumno = Student::where('IdUsuario',$user["IdUsuario"])->first();
$documentosActual = PspDocument::where('idstudent',$alumno["IdAlumno"])->get();
$status = Status::get();

foreach ($documentosActual as $value) {
    $value["idtipoestado"] = Status::where("id",$value->idtipoestado)->first()->nombre;
}

$array['Documentos']=$documentosActual;
*/
foreach ($documentosActual as $value) {
    $value["idtipoestado"] = Status::where("id",$value->idtipoestado)->first()->nombre;
	if ($value["ruta"]!=""){
	$value["idtipoestado"] = "Subido";
    }
    else
    {
    	$value["idtipoestado"] = "No Subido";
    }
}
$array['Documentos']=$documentosActual;
return $this->response->array($array);
}




   
}   