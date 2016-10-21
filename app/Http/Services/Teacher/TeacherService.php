<?php namespace Intranet\Http\Services\Teacher;

use Intranet\Models\Teacher;
use Intranet\Models\Faculty;
use Intranet\Models\User;
use Intranet\Models\Accreditor;
use Intranet\Models\CoursexTeacher;
use Intranet\Http\Services\User\UserService;
use Intranet\Http\Services\User\PasswordService;
use DB;
use Session;

class TeacherService {

	public function retrieveAll() {
		$estado = "1";
		return Teacher::where('Vigente',$estado)->
						where('IdEspecialidad',$data['specialty']= Session::get('faculty-code'))->get();
	}

	public function findTeacher($request) {
		$teacher = Teacher::where('IdDocente', $request['teacherid'])->first();
		return $teacher;
	}

	public function findTeacherByFaculty($id) {
			return Teacher::where('IdEspecialidad',$id)->orderBy('nombre', 'asc')->get();
	}

	public function findTeacherById($id) {
		$teacher = Teacher::where('IdDocente',$id)->first();
		return $teacher;
	}

	public function findFaculty($request) {
		$faculty = Faculty::where('IdEspecialidad', $request['teacherfaculty'])->first();
		return $faculty;
	}

	public function getFaculties() {
		$faculties = Faculty::get();
		return $faculties;
	}

	public function createTeacher($request) {

		$password = bcrypt(123);

        $user = User::create([
            'Usuario' => $request['teachercode'],
            'Contrasena' => $password,
            'IdPerfil' => 2
        ]);

		$teacher = Teacher::create([
			'Correo' => $request['teacheremail'],
			'Nombre' => $request['teachername'],
			'Codigo' => $request['teachercode'],
			'ApellidoPaterno' => $request['teacherlastname'],
			'ApellidoMaterno' => $request['teachersecondlastname'],
			'IdEspecialidad' => $data['specialty']= Session::get('faculty-code'),
			'IdUsuario' => $user->IdUsuario,
			'Vigente' => intval($request['teacherstatus']),
			'Descripcion' => $request['teacherdescription'],
			'Cargo' => $request['teacherposition']
		]);

		return $user;
	}
	public function updateTeacher($request) {
		$teacher = Teacher::where('IdDocente', $request['teacherid'])
		//->where('deleted_at' -> null)
		->update(array(	'Codigo' => $request['teachercode'],
						'Nombre' => $request['teachername'],
						'ApellidoPaterno' => $request['teacherlastname'],
						'ApellidoMaterno' => $request['teachersecondlastname'],
						'Correo' => $request['teacheremail'],
						//'Vigente' => intval($request['teacherstatus']),
						'Vigente' => 1,
						'Descripcion' => $request['teacherdescription'],
						'Cargo' => $request['teacherposition']));
	}

	public function delete($request) {

		$coursexteacher = CoursexTeacher::where('IdDocente', $request['teacherid'])->get();
		if(count($coursexteacher)!=0){
			return $coursexteacher;
		}else{
			$teacher = Teacher::where('IdDocente', $request['teacherid'])->update(array('Vigente' => "0"));
			$teacherdelete = Teacher::where('IdDocente', $request['teacherid'])->first();
			$teacherdelete->delete();
			$teacherdelete->user->delete();
		}
	}

	public function getTeacher($teacherId) {
		$teacher = Teacher::where('IdDocente', $teacherId)->first();
		$data['teacher'] = $teacher;
		$data['specialty'] = Faculty::get();
		return $data;
	}

	public function getCodigo($codigo) {
		$teacher = Teacher::where('Codigo', $codigo)->first();
		$retVal = (is_null($teacher)) ? True : False ;
		$data['teacher'] = $retVal;
		return $data;
	}

	public function getEmail($email) {
		$teacher = Teacher::where('Correo', $email)->first();
		$retVal = (is_null($teacher)) ? True : False ;
		$data['teacher'] = $retVal;
		$data['info'] = $teacher;
		return $data;
	}

	public function search($request) {
		$word = $request['word'];

		if ($word == "activo" || $word == "Activo"){$estado="1";}
		else{
			if($word == "inactivo" || $word == "Inactivo"){$estado="0";}
			else{$estado=$word;}
		}

		//dd($word);
		if($word != ""){
			$teachers = Teacher::orWhere('Nombre', 'LIKE', '%' . $word . '%')
						   ->orWhere('ApellidoPaterno', 'LIKE', '%' . $word . '%')
						   ->orWhere('ApellidoMaterno', 'LIKE', '%' . $word . '%')
						   ->orWhere('Codigo', 'LIKE', '%' . $word . '%')
						   ->orWhere('Correo', 'LIKE', '%' . $word . '%')
						   ->get();

			for($i=0; $i<count($teachers); $i++){
				if($teachers[$i]->IdEspecialidad != Session::get('faculty-code')){
					unset($teachers[$i]);
				}
			}
		}else{
			$teachers = Teacher::where('IdEspecialidad', Session::get('faculty-code'))
						   ->get();
		}
		

		/*
		$cadena1 = 'activo';
		$cadena2 = 'inactivo';
		if (strcasecmp ($cadena1, $word)=== 0) {
			$resultado = 1;
		} else {
			$resultado = (strcasecmp ($cadena2, $word)=== 0) ? 0 : $word ;
		}
		*/
		//$teachers = DB::select('select * from docente where Nombre like ?', array('%[$word]%'));
		//$teachers = Teacher::where('Nombre', $word);
		//				  ->orWhere('Nombre', 'LIKE','%'.$request['word'].'%')->get();
						  //->orWhere('ApellidoPaterno', $word)
						  //->orWhere('ApellidoMaterno', $word)->get();
		//dd($teachers);
		return $teachers;
	}

	function searchByNameCodeFaculty($request, $except)
	{
		$teachers_query = Teacher::with('faculty')->where('Vigente', 1);

		if(trim($request['professor_name']) != "") {
			$teachers_query->where(DB::raw('CONCAT(Nombre, " ", ApellidoPaterno)'), 'like', "%{$request['professor_name']}%");
		}

		if ( trim($request['professor_code']) != "") {
			$teachers_query->where('Codigo', $request['professor_code']);
		}

		if ( $request['faculty_id'] != 0) {
			$teachers_query->where('IdEspecialidad', $request['faculty_id']);
		}

		$teachers_query->whereNotIn('IdDocente', $except);

		return $teachers_query->get();
	}
}