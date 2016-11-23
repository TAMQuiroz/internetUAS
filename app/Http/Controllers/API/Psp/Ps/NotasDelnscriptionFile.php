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

use Dingo\Api\Routing\Helpers;
use JWTAuth;
use Illuminate\Routing\Controller as BaseController;
//Tested
class NotasDelnscriptionFile extends BaseController
{
    use Helpers;
       


       //Supervisor , reuniones

public function getAll(){
$user =  JWTAuth::parseToken()->authenticate();
$pspPxS = PspProcessxSupervisor::get();


$numeroProceso = array();
$idProcess = array();
$count = 0;


$IdDocente = Teacher::where('IdUsuario',$user ["IdUsuario"])->first();
$idProcess = PspProcessxTeacher::where('iddocente',$IdDocente["IdDocente"])->get();
$idSupervisors =  array();


foreach ($pspPxS  as $value)
{

  foreach ($idProcess  as $value2)
{

          if($value["idpspprocess"] ==$value2["idpspprocess"]){ //paràmetro recibido o por token
            $idSupervisors[$count] = $value;
            $count =  $count +1;
         }
 }

}



$pspAlumnos = PspStudent::get();
$alumnoFinales = array();
$count = 0;
foreach ($pspAlumnos as $value)
{
       

         foreach ($idSupervisors  as $value2)
{

          if($value["idsupervisor"] ==$value2["idsupervisor"]){ //paràmetro recibido o por token
            $alumnoFinales[$count] = $value;
            $count =  $count +1;
         }
 }

}


$pspSxI = Studentxinscriptionfiles::get();
$alumnoFinalesXnotaInscriptionFile= array();
$count = 0;

foreach ($pspSxI as $value)
{
       

         foreach ($alumnoFinales as $value2)
{

          if($value["idpspstudents"] ==$value2["id"]){ //paràmetro recibido o por token
            $alumnoFinalesXnotaInscriptionFile[$count] = $value;
            $count =  $count +1;
         }
 }

}

$alumnosTotales = Student::get();
$student = array();

$count = 0;

foreach ($alumnosTotales as $value)
{
       

         foreach ($alumnoFinales as $value2)
{

          if($value["IdAlumno"] ==$value2["idalumno"]){ //paràmetro recibido o por token
            $student[$count] = $value;
            $count =  $count +1;
         }
 }

}





$array = array();
$array["AlumnosPsp"]=$alumnoFinales;
$array["Alumnos"]= $student;
$array["Notas"]=$alumnoFinalesXnotaInscriptionFile;
    return $this->response->array($array);
}






    public function enviarRecomendaciones()
    {
      
         // $supervisor = array();
       // $supervisor = PspProcessxSupervisor::where('idpspprocess')->get();
$user =  JWTAuth::parseToken()->authenticate();
$supervisor = Supervisor::find($user->IdUsuario);
$array = array();

$Process = PspProcessxSupervisor::where('idsupervisor',$supervisor["id"])->get();


$alumnosTotales = Student::get();
$pspAlSupervisor = PspStudent::where('idsupervisor',$supervisor['id'])->get();
$alumnosDelSupervisor = array();
$count = 0;
foreach ($pspAlSupervisor as $value)
{
  $alumnosDelSupervisor[$count] = Student::find($value["idalumno"]);
  $count= $count+1;
}




$pspSxI = Studentxinscriptionfiles::get();
$studentXinscription = array();
$count = 0;
foreach ($pspSxI as $value) {
  foreach ($pspAlSupervisor as $value2) {
      if($value['idpspstudents']==$value2['id'])
      {
        $studentXinscription[$count] = $value;
        $count =  $count +1;
      }
    }  
}


$ins = Inscription::get();
$array["alumnos"]=$alumnosDelSupervisor;
$array["pspStudent"]= $pspAlSupervisor;
$array["studentXinscription"]= $studentXinscription;
$insFinal = array();
$count = 0;
foreach ($studentXinscription as $value) {
  foreach ($ins as $value2) {
      if($value['idinscriptionfile']==$value2['id'])
      {
        $insFinal[$count] = $value2;
        $count =  $count +1;
      }
    }  
}
$array["inscription"]= $insFinal;
return $this->response->array($array);
}



public function modificarFi(Request $request,$id)
{

        try{
        $user =  JWTAuth::parseToken()->authenticate();
        $supervisor = Supervisor::find($user->IdUsuario);
        $ins = Inscription::find($id);
        $recomendaciones = $request->only('recomendaciones');
        $ins->recomendaciones =  $recomendaciones['recomendaciones'];
        $ins->save();

        $array = array();
        $mensaje = "La ficha de inscripcion se acutalizo correctamente";
        $array['mensaje'] = $mensaje;
        return $this->response->array($array);
        } catch (Exception $e) {
         $message  = "No se pudo actualizar correctamente";
        $array = array();
        $array['mensaje'] = $mensaje;
        return $this->response->array($array);
        }
}



public function getAllInscriById(){

$user =  JWTAuth::parseToken()->authenticate();
$alumno = Student::where('IdUsuario',$user["IdUsuario"])->first();
$pspAlumno = PspStudent::find($alumno ->IdAlumno);
$pspSxI = Studentxinscriptionfiles::where('idpspstudents',$pspAlumno["id"])->get();
$ins = array();
$count = 0;
foreach ($pspSxI as $value) {
  $ins[$count] = Inscription::find($value['idinscriptionfile']);
 $count = $count +1;
}

$array = array();
$array["AlumnoPsp"]=$pspAlumno;
$array["Alumno"]= $alumno;
$array["pspSxI"]=$pspSxI;
$array["ins"]=$ins;
return $this->response->array($array);
}   



public function getINota($id){
$array = array();
$ins = Inscription::where('id',$id)->first();
$array["ins"]=$ins;
return $this->response->array($array);

}   


}


