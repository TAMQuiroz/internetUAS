<?php

namespace Intranet\Http\Controllers\API\Psp\FreeHour;
use JWTAuth;
use Response;
use Illuminate\Http\Request;
use Intranet\Models\FreeHour;
use Intranet\Models\Supervisor;
use Intranet\Models\Student;
use Intranet\Models\User;
use Intranet\Models\PspStudent;
use Dingo\Api\Routing\Helpers;
use Intranet\Models\PspProcessxTeacher;
use Illuminate\Routing\Controller as BaseController;


class FreeHourController extends Controller
{



	public function create(){

 		$user =  JWTAuth::parseToken()->authenticate();
		$nStudent =		PspStudent::count();

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

	public function store($request){


		try{


				$freeHour = new FreeHour;

				$StringFecha = $request['fechaIni'];
				


		}





	}




}