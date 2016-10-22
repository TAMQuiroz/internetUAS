<?php namespace Intranet\Http\Controllers\Teacher;

use Auth;
use View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intranet\Http\Services\Teacher\TeacherService;
use Intranet\Http\Services\User\UserService;
use Intranet\Http\Services\User\PasswordService;
use Session;
use Illuminate\Routing\Controller as BaseController;


class TeacherController extends BaseController {

    protected $teacherService;
    protected $userService;
    protected $passwordService;

    public function __construct() {
        $this->teacherService = new TeacherService();
        $this->userService = new UserService;
        $this->passwordService = new PasswordService;
    }

    public function index() {
        $data['title'] = "Profesores";
        try {
            $data['teachers'] = $this->teacherService->retrieveAll();
            $data['faculties'] = $this->teacherService->getFaculties();
        } catch(\Exception $e) {
            dd($e);
        }
        return view('teachers.index', $data);
    }

    public function create() {
        $data['title'] = 'Nuevo Profesor';
        //$data['specialty']= Session::get('faculty-code');
        //dd($data);
        try {
            $data['faculties'] = $this->teacherService->getFaculties();
        } catch (\Exception $e) {
            dd($e);
        }

        return view('teachers.form', $data);
    }

    public function edit(Request $request) {
        $data['title'] = 'Editar Profesor';
        try {
            $data['teacher'] = $this->teacherService->findTeacher($request->all());
            $data['faculties'] = $this->teacherService->getFaculties();
        } catch (\Exception $e) {
            dd($e);
        }
        return view('teachers.edit', $data);
    }

    public function save(Request $request) {
        try {
            $user = $this->teacherService->createTeacher($request->all());
        } catch(\Exception $e) {
            dd($e);
        }
        if ($user) {
            $this->passwordService->sendSetPasswordLink($user, $request->input('teacheremail'));
        }

        return redirect()->route('index.teachers')->with('success', 'El profesor se ha registrado exitosamente');
    }

    public function update(Request $request) {
        try {
            $this->teacherService->updateTeacher($request->all());
        } catch(\Exception $e) {
            dd($e);
        }
        return redirect()->route('index.teachers')->with('success', 'Las modificaciones se han guardado exitosamente');
    }

    public function view(Request $request) {
        $data['title'] = 'Teacher Record';
        try {
            $data['teacher'] = $this->teacherService->findTeacher($request->all());
        } catch (\Exception $e) {
            dd($e);
        }
        return view('teachers.view', $data);
    }

    public function search(Request $request) {
        $data['title'] = "Profesores";
        try {
            $data['teachers'] = $this->teacherService->search($request->all());
            $data['faculties'] = $this->teacherService->getFaculties();
        } catch(\Exception $e) {
            dd($e);
        }
        return view('teachers.index', $data);
    }

    //AJAX functions

    public function delete(Request $request) {
        try{
           $borrar = $this->teacherService->delete($request);
        } catch (\Exception $e) {
            dd($e);
        }

        if(count($borrar) != 0){
            return redirect()->route('index.teachers')->with('warning', 'No se puede eliminar al Profesor'); 
        }else{
           return redirect()->route('index.teachers')->with('success', 'El Profesor ha sido eliminado exitosamente'); 
        }
        
    }

    public function getTeacher($teacherId) {
        try{
            $data['teacher'] = $this->teacherService->getTeacher($teacherId);
        } catch(\Exception $e) {
            dd($e);
        }
        return json_encode($data);
    }

    public function getCodigo($codigo) {
        try{
            $data['teacher'] = $this->teacherService->getCodigo($codigo);
        } catch(\Exception $e) {
            dd($e);
        }
        return json_encode($data);
    }

    public function getEmail($email) {
        try{
            $data['teacher'] = $this->teacherService->getEmail($email);
        } catch(\Exception $e) {
            dd($e);
        }
        return json_encode($data);
    }

    public function searchModal(Request $request)
    {
        $teachers = collect();
        
        try {
            $teachers = $this->teacherService
                             ->searchByNameCodeFaculty(
                                $request->only('professor_name',
                                               'professor_code',
                                               'faculty_id'
                                               ),
                                $request->input('regular_professors', []));
        } catch (Exception $e) {

        }

        return response()->view('courses.teachers_table', compact('teachers'));
    }

    public function searchModalEv(Request $request)
    {
        $teachers = collect(); //creo una coleccion vacia  
        dd($teachers)     ;
        try {
            $teachers = $this->teacherService
                             ->searchByNameLastname(
                                $request->only('nombre'));//busco los profesores por el filtro
        } catch (Exception $e) {
            //
        }

        //le paso todo a la vista donde esta la tabla
        return response()->view('evaluations.evaluator.search-teachers-table', compact('teachers'));
    }

}


