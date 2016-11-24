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
use Intranet\Models\PspStudent;
use Intranet\Models\meeting;
use Dingo\Api\Routing\Helpers;
use Intranet\Models\PspProcessxTeacher;
use Illuminate\Routing\Controller as BaseController;


class PspFreeHourController extends BaseController
{
    use Helpers;



    public function create(){

        $user =  JWTAuth::parseToken()->authenticate();
        $nStudent =     PspStudent::count();

        if($nStudent == 0){

            $array = array();
            $mensaje = "Registrar lista de alumnos";

            $array['message'] = $mensaje;
            return $this->Response->array($array);




        }


        $supervisor =  Supervisor::where('iduser', $user->IdUsuario)->get()->first();
        $cantDisp = FreeHour::where('idsupervisor',$supervisor->id)->count();
        $maxi =  $this->maximum();

        if($cantDisp < $maxi){


        }



    }

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

        $freeHour =  new FreeHour;
        $freeHour->fecha = $date;
        $freeHour->hora_ini = $horaAux;
        $freeHour->cantidad = 1;
        $freeHour->idsupervisor = $idUser;
        $freeHour->idpspprocess = $supervisor->idpspprocess;
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

    public function showFreeHourForStudent(){


        $user =  JWTAuth::parseToken()->authenticate();
        


        $student = Student::where('IdUsuario',$user->IdUsuario)->get()->first();
        $pspStudent  = PspStudent::where('idalumno', $student->IdAlumno)->get()->first();
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



        $supervisor = Supervisor::where('iduser',$user->IdUsuario)->get()->first();

        $freeHours = FreeHour::where('idsupervisor',$supervisor->id)->get();

        return $this->response->array($freeHours->toArray());

    }





    private function maximum(){
        $a = PspStudent::count();
        $s = Supervisor::count();
        $maximum = $a/$s;

        return $maximum;
    }
}