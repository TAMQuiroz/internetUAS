<?php

namespace Intranet\Http\Controllers\API\Psp\FreeHour;
use JWTAuth;
use Response;
use DateTime;
use Illuminate\Http\Request;
use Intranet\Models\FreeHour;
use Intranet\Models\Supervisor;
use Intranet\Models\Student;
use Intranet\Models\User;
use Intranet\Models\Course;
use Intranet\Models\PspStudent;
use Intranet\Models\PspProcess;
use Intranet\Models\PspProcessxSupervisor;
use Intranet\Models\meeting;
use Dingo\Api\Routing\Helpers;
use Intranet\Models\PspProcessxTeacher;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Illuminate\Routing\Controller as BaseController;


class PspFreeHourController extends BaseController
{
    use Helpers;





    public function store(Request $request){


        

        try{




        $user =  JWTAuth::parseToken()->authenticate();
        



        $a = PspStudent::count();

        if($a == 0){

             $mensaje = 'ingrese previamente al sistema una lista de alumnos';

             $array['message'] = $mensaje;
            return $this->response->array($array);
        }
        

        $supervisor =   Supervisor::where('iduser',$user->IdUsuario)->first();


        $cantDisp = FreeHour::where('idsupervisor',$supervisor->id)->count();

        $maxi = $this->maximum();
        if($cantDisp >= $maxi){

             $mensaje = 'Ha llegado al maximo de disponibilidades a registrar';

             $array['message'] = $mensaje;
            return $this->response->array($array);


        }

        $idUser = $supervisor->id;
        $horaAux = $request['hora_ini'];
        
        $fecha = $request['fecha'];
    
      
        $format = "d/m/Y";
        $date= DateTime::createFromFormat($format, $fecha);
        $dt = Carbon::createFromFormat('d/m/Y',$fecha);
        $hh  = str_replace(":00","", $horaAux);
        $idpspprocess = $request['idpspprocess'];

        $var = FreeHour::where([['fecha',$dt->format('Y-m-d')],['hora_ini',$hh],['idpspprocess',$idpspprocess]])->get()->first();
        if($var != null){


                 $mensaje = 'Ya se registro previamente una reunion con fecha'.$fecha;

                 $array['message'] = $mensaje;
                 return $this->response->array($array);

        }
             


        $freeHour =  new FreeHour;
        $freeHour->fecha = $date;
        $freeHour->hora_ini = $horaAux;
        $freeHour->cantidad = 1;
        $freeHour->idsupervisor = $idUser;
        $freeHour->idpspprocess = $idpspprocess;
        $freeHour->save();



        $f = FreeHour::where('idsupervisor',$supervisor->id)->count();
        $m = $this->maximum();




        $mensaje = 'La disponibilidad se ha registrado exitosamente. Tiene registrado '.$f.'/'.$m.' disponibilidades';

        $array['message'] = $mensaje;
        return $this->response->array($array);



        }catch(Exception $e){


            $mensaje = "Solicitud Fallida";
             $array['message'] = $mensaje;
                return $this->response->array($array);

        }
        


        




    }


    //Vista para guardar disponibilidad
    public function create(){



        $user =  JWTAuth::parseToken()->authenticate();
      


        $a = PspStudent::count();
        if($a == 0){

             $mensaje = "Para registrar una disponibilidad, ingrese previamente al sistema una lista de alumnos";
             $array['message'] = $mensaje;
             return $this->response->array($array);
        }        


        $supervisor =   Supervisor::where('iduser',$user->IdUsuario)->first();
        
        //ver si hay procesos
        $procxs = PspProcessxSupervisor::where('idsupervisor',$supervisor->id)->get();
        $proc = array(); 
            $r = count($procxs);   
            if($r>0){
                foreach($procxs as $p){

                    $pro = PspProcess::find($p->idpspprocess);
                    $pro['curso'] = Course::where("IdCurso", $pro->idcurso)->first()->Nombre;
                    $proc[]= $pro;
                }
            }
        $cantDisp = FreeHour::where('idsupervisor',$supervisor->id)->count();
        $maxi = $this->maximum();
        
        
        
        if($cantDisp < $maxi){
            return  $this->response->array($proc);
        }else{


             $mensaje = 'Ha llegado al maximo de disponibildades a registrar para eleccion del alumno. Maximo: '.$maxi;
             $array['message'] = $mensaje;
             return $this->response->array($array);
          
        }



    }



    public function showFreeHourForStudent(){


        try{



        $user =  JWTAuth::parseToken()->authenticate();
        


        $student = Student::where('IdUsuario',$user->IdUsuario)->get()->first();
        $pspStudent  = PspStudent::where('idalumno', $student->IdAlumno)->get()->first();


        if(is_null($pspStudent->idsupervisor))
            $freeHours = FreeHour::where('idpspprocess',$pspStudent->idpspprocess)->get();
       
        else 
            $freeHours = FreeHour::where('idsupervisor', $pspStudent->idsupervisor)->where('idpspprocess', $pspStudent->idpspprocess)->get();   


      $validFreeHour = array();

      
        foreach ($freeHours as $hour) {

           


          $val  = meeting::where('idfreehour' , $hour->id)->count();
         
                    if($val == 0){

                  $hour->supervisor;
                  array_push($validFreeHour, $hour);
          }
        

        }


          return  $this->response->array($validFreeHour);





        }catch(Exception $ex){

                $mensaje = "Error";
                $array['message'] = $mensaje;
                return $this->response->array($array);




        }
       


 
       // ->where('idpspprocess', $pspStudent->idpspprocess);	

  }
       // ->where('idpspprocess', $pspStudent->idpspprocess);   


        //return  $this->response->$message;

      
/*
        $array= array();

        foreach ($freeHours as $freeHour) {
            if($freeHour->idpspprocess ==  )

         }          
*/




    public function showFreeHourForSupervisor(){
        

        $user =  JWTAuth::parseToken()->authenticate();

    try{
        $supervisor = Supervisor::where('iduser',$user->IdUsuario)->get()->first();

        $freeHours = DB::table('freehours')->join('pspprocessesxsupervisors','pspprocessesxsupervisors.idpspprocess','=','freehours.idpspprocess')->join('pspprocesses','pspprocessesxsupervisors.idpspprocess','=','pspprocesses.id')->join('Curso','pspprocesses.idcurso','=','Curso.IdCurso')->select('freehours.id', 'freehours.idpspprocess','freehours.fecha','freehours.hora_ini','Curso.Nombre')->where('pspprocessesxsupervisors.idsupervisor',$supervisor->id)->where('freehours.deleted_at',null)->orderBy('fecha','asc')->orderBy('hora_ini','asc')->get();

       /*

        $freeHours = FreeHour::where([
            ['idsupervisor',$supervisor->id],
            ['idpspprocess',$supervisor->idpspprocess]])->get();*/

        return $this->response->array($freeHours);




    }catch(Exception $ex){
                $mensaje = "Error";
                $array['message'] = $mensaje;
                return $this->response->array($array);




    }

        

    }





    private function maximum(){

        try{

            $a = PspStudent::count();
            $s = Supervisor::count();
            $maximum = $a/$s;

            return $maximum;



        }catch(Exception $ex){



        }
        
    }
}