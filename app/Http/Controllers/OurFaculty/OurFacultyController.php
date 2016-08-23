<?php namespace Intranet\Http\Controllers\OurFaculty;

use View;
use Session;
use Illuminate\Http\Request;
use Intranet\Http\Services\Faculty\FacultyService;
use Intranet\Http\Services\Teacher\TeacherService;
use Illuminate\Routing\Controller as BaseController;

class OurFacultyController extends BaseController {

    protected $facultyService;

    public function __construct(){
        $this->facultyService= new FacultyService();
    }

    public function index($id) {
        //$data['title'] = 'Edit Faculty';
        try {
            $data['fac'] = $this->facultyService->find($id);
            $period = $this->facultyService->findPeriod($id);
            $cycle = $this->facultyService->findCycle($id);
            $faculties = $this->facultyService->retrieveAll();
            $data['coordinator'] = $this->facultyService->findCoordinator();
            //dd($coordinator);

            if($period!=null){
                Session::put('period-code',$period->IdPeriodo);
                $data['conf'] = $this->facultyService->findConf($id, $period->IdPeriodo);
            } else {

                Session::put('period-code',null);
                $data['conf']=null;
            }

            if($cycle!=null){
                Session::put('academic-cycle',$cycle);
                 $data['teacher'] = $this->facultyService->getTeacherById($cycle->IdDocente);
            }
            else {

                Session::put('academic-cycle',null);
                $data['teacher']=null;
            }
           //Session::put('academic-cycle',$cycle);
            Session::put('faculty-code',$data['fac']->IdEspecialidad);
            Session::put('faculty-name',$data['fac']->Nombre);
        } catch (\Exception $e) {
            dd($e);
        }

        return view('ourFaculty.index', $data);
    }
}