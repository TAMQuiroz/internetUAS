<?php

namespace Intranet\Http\Controllers\Course;

use View;
use Session;
use Illuminate\Http\Request;
use Intranet\Http\Services\Course\CourseService;
use Intranet\Http\Services\Faculty\FacultyService;
use Intranet\Http\Services\Teacher\TeacherService;
use Intranet\Http\Services\StudentsResult\StudentsResultService;
use Illuminate\Routing\Controller as BaseController;

class CourseController extends BaseController {

    protected $courseService;
    protected $facultyService;
    protected $teacherService;
    protected $studentResultService;


    public function __construct()
    {
        $this->courseService = new CourseService();
        $this->facultyService = new FacultyService();
        $this->teacherService = new TeacherService();
        $this->studentResultService = new StudentsResultService();
    }

    public function index()
    {
        $faculty_id = Session::get('faculty-code');
        $data['title'] = "Courses";

        try {
            $data['faculty'] = $this->facultyService->find($faculty_id);
        } catch (Exception $e) {
            dd($e);
        }

        try {
            $data['courses'] = $this->courseService->retrieveByFaculty($faculty_id);
        } catch(\Exception $e) {
            dd($e);
        }
        return view('courses.index', $data);
    }


    //Creation of courses
    public function create()
    {
        $data['title'] = 'New Course';

        try {
            $data['faculties'] = $this->facultyService->retrieveAll();
            $data['studentResults'] = $this->studentResultService->findByFaculty();
        } catch (\Exception $e) {
            dd($e);
        }
        return view('courses.form', $data);
    }

    public function save(Request $request)
    {
        try {
            $currentStudentsResults = $this->studentResultService->findByFaculty();
            $this->courseService->createCourse($request->all(), $currentStudentsResults);
        } catch(\Exception $e) {
            dd($e);
        }
        return redirect()->route('index.courses')->with('success', 'El curso se ha registrado exitosamente');
    }

    //Edit of courses
    public function edit(Request $request)
    {
        $data['title'] = 'Edit Course';
        try {
            $data['faculties'] = $this->facultyService->retrieveAll();
            $data['course'] = $this->courseService->findCourse($request->all());
            $data['studentResults'] = $this->studentResultService->findByFaculty();
            //Needs to get it from the selected one in the courses table
            $data['teachers'] = $this->teacherService->retrieveAll();
        } catch (\Exception $e) {
            dd($e);
        }

        return view('courses.edit', $data);
    }

    public function update(Request $request)
    {
        try {
            $currentStudentsResults = $this->studentResultService->findByFaculty();
            $this->courseService->updateCourse($request->all(), $currentStudentsResults);
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect()->route('index.courses')->with('success', 'Las modificaciones se han guardado exitosamente');
    }

    //Deletion of courses
    public function delete(Request $request)
    {
        try{
            $this->courseService->deleteCourse($request->all());
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect()->route('index.courses')->with('success', 'El registro ha sido eliminado exitosamente');
    }

    //Put evidences
    public function evidence(Request $request)
    {
        return view('courses.evidence');
    }

    //View course
    public function view(Request $request)
    {
        try {
            $data['course'] = $this->courseService->findCourse($request->all());
        } catch(\Exception $e) {
            dd($e);
        }
        return $data;
    }

    public function pick()
    {
        $data['title'] = "Cursos Evaluados en el ciclo";
        try {
            $data['pickedcourses'] = $this->courseService->retrieveAll();
            $data['notPickedcourses'] = $this->courseService->retrieveAll();
        } catch(\Exception $e) {
            dd($e);
        }
        return view('courses.pick', $data);
    }

    public function getCode($code) {
        try{
            $data['course'] = $this->courseService->getCode($code);
        } catch(\Exception $e) {
            dd($e);
        }
        return json_encode($data);
    }
}