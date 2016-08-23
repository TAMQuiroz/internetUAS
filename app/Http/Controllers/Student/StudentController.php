<?php namespace Intranet\Http\Controllers\Student;

use View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Input;
use Intranet\Models\Student;
use Intranet\Http\Services\TimeTable\TimeTableService;
use Intranet\Models\Score;
use DB;
use Excel;


class StudentController extends BaseController {

	protected $timeTableService;

	public function __construct() {
		$this->timeTableService = new TimeTableService();
	}

	public function load(Request $request)  {
		$data['title'] = 'Carga de Alumnos';
		try {
			$timeTable = $data['timeTable'] = $this->timeTableService->find($request->all());
			//check if there is an uploaded file
			$studentsExist = 0;
			$studentsGroupedByHorario = DB::table('Alumno')->groupBy('IdHorario')->get();
			if ($studentsGroupedByHorario){
				foreach($studentsGroupedByHorario as $stu){
					if ($stu->IdHorario == $timeTable->IdHorario){
						$studentsExist = 1;
						break;
					}
				}
			}
			$data['studentsExist'] = $studentsExist;				

		} catch(\Exception $e) {
			dd($e);
		}
		return view('students.load',$data);
	}

	public function importExport()
	{
		return view('importExport');
	}
	public function downloadExcel($type)
	{
		$data = Item::get()->toArray();
		return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}

	public function importExcel(Request $request)
	{
		$idTimeTable =$request['idTimeTable'];

		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
				$reader->skip(7);
			})->get();

			if(!empty($data) && $data->count()){
				//check if file was already imported
				$studentsGroupedByHorario = DB::table('Alumno')->groupBy('IdHorario')->get();
					if ($studentsGroupedByHorario){
					foreach($studentsGroupedByHorario as $stu){
						if ($stu->IdHorario == $idTimeTable){
							return back()->with('error', 'Ya se realizó la carga de alumnos para este horario');
						}
					}
				}

				foreach ($data as $key => $value) {
					if (is_numeric($value[0])){
						$insert[] = ['Codigo' => $value[0], 'Nombre' => $value[1],
							// other fields
							'IdHorario' => $idTimeTable,
							'created_at' => date('Y-m-d H:i:s'),
							'updated_at' => date('Y-m-d H:i:s')];
					}
				}
				if(!empty($insert)){
					DB::table('Alumno')->insert($insert);
					//dd('Registros de alumnos subidos exitosamente');
				}
			}
		}

		return back()->with('success', 'La carga de alumnos se ha realizado exitosamente');
	}

	public function delete(Request $request)
	{
		try{
			DB::table('Alumno')->where('IdHorario', $request['timeTableId'])->delete();
		} catch (\Exception $e) {
			if (Score::where('IdHorario',$request['timeTableId'])->get() != null){
				return back()->with('error', 'Ya existen alumnos calificados en este horario');
			} else {
			dd($e);
			}
		}
		return back()->with('success', 'La lista de alumnos se ha eliminado exitosamente');
	}

}