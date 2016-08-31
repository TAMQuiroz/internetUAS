<?php namespace Intranet\Http\Services\AcademicCycle;

use Intranet\Models\AcademicCycle;
use DB;
use Session;

class AcademicCycleService {

	public function retrieveAll() {
		return AcademicCycle::orderby('Descripcion','ASC')->get();
	}

	public function save($request) {

		$anio = $request['anio'];
		$numberC = $request['numberC'];
		$numero = $anio. $numberC;
		$descripcion = $anio."-".$numberC;

		$academicCycle = AcademicCycle::create([
			'Numero' => $numero,
			'Descripcion' => $descripcion
		]);

		return $academicCycle;
	}

	public function delete($request) {	
					
		$academicCycle = AcademicCycle::find($request['cycleId']);
		$academicCycle->delete();	
		
	}

	public function getCycle($cycle) {
		$academicCycle = AcademicCycle::where('Descripcion', $cycle)->first();
		$retVal = (is_null($academicCycle)) ? True : False ;
		$data['academicCycle'] = $retVal;
		return $data;
	}
	
}