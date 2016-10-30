<?php namespace Intranet\Http\Controllers\Student;

use View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Input;
use Intranet\Models\Student;
use Intranet\Models\TimeTable;
use Intranet\Http\Services\TimeTable\TimeTableService;
use Intranet\Models\Score;
use Intranet\Models\Tutstudent;
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

		return back()->with('success', 'Se descargo el archivo');
	}

	public function storeExcel($data){

		return Excel::create('AlumnosNoEncontrados', function($excel) use($data) {

			$excel->sheet('Sheetname', function($sheet) use($data) {
		        $sheet->fromArray($data);
		    });

		})->store('xls', storage_path('/')); //storage
	}

	public function importExcel(Request $request)
	{
		$idTimeTable =$request['idTimeTable'];

		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {})->get();

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

				$students = [];
				$studentsNotFound = [];
				foreach ($data as $key => $value) {
					$value_int = intval($value[1]);
					if ($value_int != 0){ 

						$insert = [
							'Codigo' => $value_int, 
							'Nombre' => $value[2],
							'ApellidoPaterno' => $value[3],
							'ApellidoMaterno' => $value[4],
							// other fields
							'IdHorario' => $idTimeTable,
						];

						// Para el curso PSP
						if(isset($request['selectPsp'])){
							// Buscar alumno en la tabla de tutoria
							$student = Tutstudent::where('codigo', $value_int)->first();
							if($student != null) { //encontro alumno -> obtener su idusuario
								$insert['IdUsuario'] = $student->id_usuario;
								array_push($students, $insert); 
							}
							else {
								// no encontro alumno -> agregar al excel para eviarlo a Tutoria y que creen alumno
								array_push($studentsNotFound, $insert); 
							}
						}
					}else{

						return redirect()->back()->with('warning', 'El formato interno del archivo es incorrecto');
					}
				}

				if(!empty($students)){
					foreach ($students as $student) {
						$alumno = new Student;
						$alumno->Codigo = $student['Codigo']; 
						$alumno->Nombre = $student['Nombre'];
						$alumno->ApellidoPaterno = $student['ApellidoPaterno'];
						$alumno->ApellidoMaterno = $student['ApellidoMaterno'];
						$alumno->IdHorario = $student['IdHorario'];
						$alumno->IdUsuario = $student['IdUsuario'];

						//Campos nuevos para PSP

						$alumno->id = null;
						$alumno->telefono = null;
						$alumno->correo = null;
						$alumno->direccion = null;
						//$alumno->IdUsuario = null;
						$alumno->idPspGroup = null;
						$alumno->IdEspecialidad = null;
						$alumno->idSupervisor = null;
						$alumno->lleva_psp = null;
						
						$alumno->save();
					}

					$horario = TimeTable::find($alumno->IdHorario);
				
					$horario->TotalAlumnos = $data->count();
					$horario->save();
				}

				//Agregar tamaño a tabla horario
				//dd($alumno->IdHorario);
				//$horario = TimeTable::find('IdHorario');				

				if(!empty($studentsNotFound)){					
					$this->storeExcel($studentsNotFound);
				}

			}else{
				return redirect()->back()->with('warning', 'Hubo un problema con el archivo de excel');
			}
		}

		return back()->with('success', 'La carga de alumnos se ha realizado exitosamente, se descargo archivo con alumnos no encontrados');
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