<?php

namespace Intranet\Http\Controllers\Psp\PspProcess;

use Illuminate\Http\Request;
use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;

use Intranet\Http\Services\Course\CourseService;
use Intranet\Http\Services\Faculty\FacultyService;

use Intranet\Models\PspProcess;

use Carbon\Carbon;
use Auth;
use Session;

class PspProcessController extends Controller
{
	public function __construct() {
        $this->courseService = new CourseService;
        $this->facultyService = new FacultyService;
    }
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$proceso = PspProcess::get();

        $data = [
            'proceso'    =>  $proceso,
        ];
        return view('psp.pspProcess.index',$data);
    }

    public function create()
    {
    	$faculty_id = Session::get('faculty-code');
    	$cycle_id = $this->facultyService->findCycle($faculty_id)->IdCicloAcademico; 
    	$order='asc';
    	try {
 		   	$courses =   	$this->courseService->findCoursesBySemester($faculty_id,1,$order)->lists('Nombre','IdCurso');
 		   	$data = ['courses' => $courses];
 		   	return view('psp.pspProcess.create',$data);
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	try{
    		$proceso                   = new PspProcess;
    		$proceso->Vigente = 1;

    		return redirect()->route('pspProcess.index')->with('success', 'El modulo se ha activado exitosamente');
    	}catch (Exception $e){
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
