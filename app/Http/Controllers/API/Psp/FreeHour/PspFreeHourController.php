<?php

namespace Intranet\Http\Controllers\API\Psp\FreeHour;
use JWTAuth;
use Response;
use Illuminate\Http\Request;
use Intranet\Models\FreeHour;
use Intranet\Models\Supervisor;
use Intranet\Models\Student;
use Intranet\Models\PspStudent;
use Dingo\Api\Routing\Helpers;
use Intranet\Models\PspProcessxTeacher;
use Illuminate\Routing\Controller as BaseController;


class FreeHourController extends Controller
{



	public function create(){


		$nStudent =		PspStudent::count();

		if($nStudent == 0){

			$array = array();
			$mensaje = "Registrar lista de alumnos";

			return $this->Response->array($array);




		}


	}




}