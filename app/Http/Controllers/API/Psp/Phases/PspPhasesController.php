<?php

namespace Intranet\Http\Controllers\API\Psp\Phases;
use JWTAuth;
use Response;
use Illuminate\Http\Request;
use Intranet\Models\Phase;
use Intranet\Models\Teacher;
use Dingo\Api\Routing\Helpers;
use Intranet\Models\PspProcessxTeacher;
use Illuminate\Routing\Controller as BaseController;

class PspPhasesController extends BaseController
{
    use Helpers;

    //Testeado y funcionando
    public function getAll()
    {
        


        $user =  JWTAuth::parseToken()->authenticate();
        $Phases = null;

        if($user->IdPerfil == 3){

           $Phases = Phase::get();

            } else{
                $teacher = Teacher::where('IdUsuario',$user->IdUsuario)->first(); 
                //if($teacher!=null){
                    $procxt= PspProcessxTeacher::where('iddocente',$teacher->IdDocente)->get(); 
                    $proc = array(); 
                    $r = count($procxt);   
                    if($r>0){
                    foreach($procxt as $p){
                        $proc2=null;                
                        $proc2=Phase::where('idpspprocess',$p->idpspprocess)->get();
                        $r2 = count($proc2);  
                        if($proc2!=null && $r2>0){
                            foreach($proc2 as $p2){ 
                                if($p2!=null){
                                    $pro = Phase::find($p2->id);
                                    $pro['curso'] = $pro->PspProcess->Course->Nombre;
                                    $proc[]=$pro;
                                }
                            }
                        }
                    } 
                    $Phases=$proc;
                    }
                //}
        }
       
      /*  $result =  $user->IdPerfil

        return $this->response->array($user);*/

      
        return $this->response->array($Phases);
    }
    
}   