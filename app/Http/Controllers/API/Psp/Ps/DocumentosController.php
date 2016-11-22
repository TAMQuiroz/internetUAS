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
$array['Documentos']=$documentosActual;
$array['Estados']=$status; 
return $this->response->array($array);
}


   
}   