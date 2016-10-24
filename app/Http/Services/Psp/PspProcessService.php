<?php 

namespace Intranet\Http\Services\Psp;

use DB;
use Auth;
use Session;

use Intranet\Models\PspProcess;
use Intranet\Models\AcademicCycle;

use Intranet\Http\Services\Cicle\CicleService;
use Intranet\Http\Services\Course\CourseService;

class PspProcessService{

	public function find(){
		$proceso = PspProcess::get();
		$this->courseService = new CourseService;
		$this->cicleService = new CicleService;

		foreach ($proceso as $proc) {
			$proc->nomCurso = $this->courseService->findCourseById($proc->idCurso)->Nombre;
			$request['cicle_code'] = $proc->idCiclo;
			$ciclo = $this->cicleService->findCicle($request)->IdCiclo; //idciclo de cicloxespecialidad
			$proc->ciclo=AcademicCycle::where('IdCicloAcademico',$ciclo)->first()->Descripcion;
		}
		return $proceso;
	}


}