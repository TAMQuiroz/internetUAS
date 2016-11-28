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
use Dingo\Api\Routing\Helpers;
use JWTAuth;
use Illuminate\Routing\Controller as BaseController;
use DB;
use DateTime;
use Mail;




//Tested
class PsController extends BaseController
{
    use Helpers;
       


       //Supervisor , reuniones

    public function getAll()
    {
$user =  JWTAuth::parseToken()->authenticate();  
//$supervisor = Supervisor::find($user->IdUsuario);  
$supervisor = Supervisor::where('iduser',$user['IdUsuario'])->first();        
$todosProcesos = PspProcess::get();
$meetingSupervisorId = meeting::where('idsupervisor',$supervisor['id'])->get();
$procesosDelSupervisor = PspProcessxSupervisor::where('idsupervisor',$supervisor['id'])->get(); //Sentencia depende si pspProcessXsupervisor esta llena
$pspSudentDelSupervisor = PspStudent::where('idsupervisor',$supervisor['id'])->get();
$todosStatus = Status::get();
$alumnosDePspStudent = array();
$count = 0;
foreach ($pspSudentDelSupervisor as $value)
{
    //Student::find($value["idalumno"]);
  $alumnosDePspStudent[$count] = Student::where('IdAlumno',$value["idalumno"])->first();   
  $count= $count+1;
}

foreach ($meetingSupervisorId as $value) {
    $value["idtipoestado"] = Status::where("id",$value->idtipoestado)->first()->nombre;
}

$array = array();
$array ['Status']  = $user;
$array ['Supervisor']  = $supervisor;
$array ['PspProcessxSupervisor']  = $procesosDelSupervisor;
$array ['PspProcess']  = $todosProcesos;
$array ['Metting']  = $meetingSupervisorId;
$array ['PspStudents']  = $pspSudentDelSupervisor;
$array ['Students']  = $alumnosDePspStudent;
//$array ['Status']  = $todosStatus;
    return $this->response->array($array);
}




public function getAllStudentSuper()
{

$user =  JWTAuth::parseToken()->authenticate();
//$supervisor = Supervisor::find($user->IdUsuario); 
$supervisor = Supervisor::where('iduser',$user['IdUsuario'])->first();        
$todosProcesos = PspProcess::get();
$procesosDelSupervisor = PspProcessxSupervisor::where('idsupervisor',$supervisor['id'])->get(); //Sentencia depende si pspProcessXsupervisor esta llena
$pspSudentDelSupervisor = PspStudent::where('idsupervisor',$supervisor['id'])->get();
$alumnosDePspStudent = array();
$count = 0;
foreach ($pspSudentDelSupervisor as $value)
{
  //$alumnosDePspStudent[$count] = Student::find($value["idalumno"]);
  $alumnosDePspStudent[$count] = Student::where('IdAlumno',$value["idalumno"])->first(); 
  $count= $count+1;
}


$array = array();
$array ['Supervisor']  = $supervisor;
$array ['PspProcessxSupervisor']  = $procesosDelSupervisor;
$array ['PspProcess']  = $todosProcesos;
$array ['PspStudents']  = $pspSudentDelSupervisor;
$array ['Students']  = $alumnosDePspStudent;
    return $this->response->array($array);
}




    public function asistioReunion(Request $request,$id)
    {

        try{
        $user =  JWTAuth::parseToken()->authenticate();
        //$alumno = Student::where('IdUsuario',$user->IdUsuario)->get()->first();
        //$pspAlumno   = PspStudent::where('IdAlumno' , $alumno->IdAlumno)->get()->first();
        //$supervisor = Supervisor::where('IdUsuario',$user->IdUsuario)->get()->first();
        //$supervisor = Supervisor::find($user->IdUsuario);
        $supervisor = Supervisor::where('iduser',$user['IdUsuario'])->first();  
        $asistio = $request->only('asistencia');
        $observaciones = $request->only('obser');
        //$meeting = meeting::find($id);
        $meeting = meeting::where('id',$id)->first(); 

        $meeting ->asistencia = $asistio['asistencia'];
        $meeting->observaciones = $observaciones['obser'];
        $observaciones = $request->only('observaciones');
        $meeting->retroalimentacion = $observaciones['observaciones'];
        $meeting->save();
        $array = array();
        $mensaje = "La reunión se actualizo correctamente";
        $array['mensaje'] = $mensaje;
        $array['asistencia'] = $asistio['asistencia'];
        $array['observaciones'] = $observaciones['observaciones'];
        return $this->response->array($array);
        //return json_encode($mensaje);

        } catch (Exception $e) {
            
         $message  = "No se pudo actualizar correctamente";
        $array = array();
        $array['mensaje'] = $mensaje;
        return $this->response->array($array);
        //return json_encode($message);

        }
    }




public function getAllSutudentMetting()
{
$user =  JWTAuth::parseToken()->authenticate();
$alumno = Student::where('IdUsuario',$user["IdUsuario"])->first();
$pspAlumno   = PspStudent::where('idalumno',$alumno ->IdAlumno)->first();
//$pspAlumno = PspStudent::find($alumno ->IdAlumno);
$array = array();
$MeetingFinal = meeting::where('idstudent',$pspAlumno["idalumno"])->get();
$count = 0;
foreach($MeetingFinal as $value)
{
    //$SupervisorPorMetting[$count] = Supervisor::find($value->idsupervisor);
    $SupervisorPorMetting[$count] = Supervisor::where('id',$value->idsupervisor)->first(); 
    $value["idtipoestado"] = Status::where("id",$value->idtipoestado)->first()->nombre;
    $count =  $count +1;
}


$array['Meeting'] =$MeetingFinal;
$array['Supervisor'] =$SupervisorPorMetting;

   return $this->response->array($array);
}



public function getAllFreeHours()
{
$user =  JWTAuth::parseToken()->authenticate();
$array = array();
$alumno = Student::where('IdUsuario',$user["IdUsuario"])->first();
//$pspAlumno   = PspStudent::find($alumno ->IdAlumno);
$pspAlumno   = PspStudent::where('idalumno',$alumno ->IdAlumno)->first();
//$supervisor = Supervisor::find($pspAlumno->idsupervisor);
$supervisor = Supervisor::where('id',$pspAlumno->idsupervisor)->first();
$ldate = date('Y-m-d');
$freeHourFinal = FreeHour::where('idsupervisor',$supervisor["id"])->where('fecha', '>=', $ldate)->get();
$array = array();
$array['Supervisor'] =$supervisor;
$array['FreeHour'] = $freeHourFinal;
return $this->response->array($array);
}





public function nuevaReunionAL(Request $request,$id)
{

        try{
        $user =  JWTAuth::parseToken()->authenticate();

$alumno = Student::get();

$array = array();
$alumno = Student::where('IdUsuario',$user["IdUsuario"])->first();
$pspAlumno   = PspStudent::where('idalumno',$alumno ->IdAlumno)->first();
//$pspAlumno   = PspStudent::find($alumno ->IdAlumno);
//$supervisor = Supervisor::find($pspAlumno->idsupervisor);
$supervisor = Supervisor::where('id',$pspAlumno->idsupervisor)->first();

$metting= new meeting;

$metting->idtipoestado =12; //Estado y fala tipo
$tmp = $request->only('hora_inicio');
$metting->hora_inicio =array_values($tmp)[0]; 
$tmp = $request->only('hora_fin');
$metting->hora_fin = array_values($tmp)[0]; ;
$tmp = $request->only('fecha');
$metting->fecha=array_values($tmp)[0]; 
$metting->idstudent= $alumno ->IdAlumno;
$metting->idsupervisor= $pspAlumno->idsupervisor;
$metting->asistencia= "o";
$tmp = $request->only('lugar');
$metting->lugar= array_values($tmp)[0]; 
$metting->observaciones= "";
$metting->retroalimentacion= "";
$metting->tiporeunion= 1;
$metting->idfreehour = $id;
$ldate = date('Y-m-d H:i:s');
$metting->created_at= $ldate;
$metting->updated_at=$ldate;
$metting->deleted_at=null;
$metting->save();

        $mensaje = "La reunión se actualizo correctamente";
        $array['mensaje'] = $mensaje;


        return $this->response->array($array);
        //return json_encode($mensaje);

        } catch (Exception $e) {
            
         $message  = "No se pudo actualizar correctamente";
        $array = array();
        $array['mensaje'] = $mensaje;
        return $this->response->array($array);
        //return json_encode($message);

   

        }
    }


public function nuevaReunionS(Request $request)
{

        try{
         $array = array();
        $user =  JWTAuth::parseToken()->authenticate();
        //$supervisor = Supervisor::find($user->IdUsuario);
        $supervisor = Supervisor::where('iduser',$user['IdUsuario'])->first(); 

$tmp = $request->only('IdUsuario');
$alumno = Student::where('IdUsuario',$tmp)->first();

//$pspAlumno   = PspStudent::find($alumno ->IdAlumno);
$pspAlumno   = PspStudent::where('idalumno',$alumno ->IdAlumno)->first();

$metting= new meeting;

$tmp = $request->only('Tipo');
$metting->idtipoestado =12; //Estado y fala tipo
$tmp = $request->only('hora_inicio');
$metting->hora_inicio =array_values($tmp)[0]; 
$tmp = $request->only('hora_fin');
$metting->hora_fin = array_values($tmp)[0]; ;
$tmp = $request->only('fecha');
$metting->fecha=array_values($tmp)[0]; 
$metting->idstudent= $alumno ->IdAlumno;
$metting->idsupervisor= $pspAlumno->idsupervisor;
$metting->asistencia= "o";
$tmp = $request->only('lugar');
$metting->lugar= array_values($tmp)[0]; 
$metting->observaciones= "";
$metting->retroalimentacion= "";
$tmp = $request->only('Tipo');
$metting->tiporeunion= array_values($tmp)[0];
$ldate = date('Y-m-d H:i:s');
$metting->created_at= $ldate;
$metting->updated_at=$ldate;
$metting->deleted_at=null;
$metting->save();

           $mensaje = "La reunión se actualizo correctamente";
        $array['mensaje'] = $mensaje;
        return $this->response->array($array);
        //return json_encode($mensaje);

        } catch (Exception $e) {
            
         $message  = "No se pudo actualizar correctamente";
        $array = array();
        $array['mensaje'] = $mensaje;
        return $this->response->array($array);
        //return json_encode($message);

   

        }
    }







}








