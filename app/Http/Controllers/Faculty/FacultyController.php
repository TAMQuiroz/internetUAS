<?php namespace Intranet\Http\Controllers\Faculty;

use DB;
use View;
use Session;
use Illuminate\Http\Request;
use Intranet\Http\Services\Cicle\CicleService;
use Intranet\Http\Services\Period\PeriodService;
use Intranet\Http\Services\Faculty\FacultyService;
use Intranet\Http\Services\Teacher\TeacherService;
use Intranet\Http\Services\StudentsResult\StudentsResultService;
use Intranet\Http\Services\EducationalObjetive\EducationalObjetiveService;

use Illuminate\Routing\Controller as BaseController;
use Intranet\Http\Services\MeasurementSource\MeasurementSourceService;

class FacultyController extends BaseController
{

    protected $facultyService;
    protected $educationalObjetiveService;
    protected $studentsResultService;

    public function __construct(){
        $this->facultyService= new FacultyService();
        $this->teacherService= new TeacherService();
        $this->periodService= new PeriodService();
        $this->cicleService= new CicleService();
        $this->measureService= new MeasurementSourceService();
        $this->studentsResultService = new StudentsResultService();
        $this->educationalObjetiveService = new EducationalObjetiveService();
    }
    public function index() {
        $data['title'] = "Faculties";
        $data['fac']=null;
        try {
            $data['faculties'] = $this->facultyService->retrieveAll();
        } catch(\Exception $e) {
            dd($e);
        }
        return view('faculty.index', $data);
    }

    public function getCode($codigo) {
        try{
            $data['faculty'] = $this->facultyService->getCode($codigo);
        } catch(\Exception $e) {
            dd($e);
        }
        return json_encode($data);
    }

    public function getName($nombre) {
        try{
            $data['faculty'] = $this->facultyService->getName($nombre);
        } catch(\Exception $e) {
            dd($e);
        }
        return json_encode($data);
    }
    public function create() {
        $data['title'] = 'New Faculty';

        return view('faculty.createFaculty', $data);
    }

    public function save(Request $request) {
        try {
            $this->facultyService->create($request->all());
        } catch(\Exception $e) {
            dd($e);
        }
        return redirect()->route('index.faculty')->with('success', 'La especialidad se ha registrado exitosamente');
    }

    public function update(Request $request) {
        try {
            $this->facultyService->update($request->all());
        } catch(\Exception $e) {
            dd($e);
        }
        return redirect()->route('index.faculty')->with('success', 'Las modificaciones se han guardado exitosamente');
    }

    public function updateCoordinator(Request $request) {
        try {

            $this->facultyService->updateCoordinator($request->all());
        } catch(\Exception $e) {
            dd($e);
        }
        return redirect()->route('index.ourFaculty' , ['faculty-code' => $request['facultyId']])->with('success', 'El registro ha sido eliminado exitosamente');
    }

    public function edit(Request $request) {
        $data['title'] = 'Edit Faculty';
        try {
            $data['fac'] = $this->facultyService->find($request->all());
            $data['teachers'] = $this->facultyService->teachers($request->all());
        } catch (\Exception $e) {
            dd($e);
        }
        return view('faculty.edit', $data);
    }

    public function editCoordinator(Request $request) {
        $data['title'] = 'Edit Faculty';
        try {
            $data['fac'] = $this->facultyService->find($request->all());
            $data['teachers'] = $this->facultyService->teachers($request->all());
        } catch (\Exception $e) {
            dd($e);
        }
        return view('faculty.editCoordinator', $data);
    }

    public function delete($id) {

        try{
            $del = $this->facultyService->delete($id);

            if($del == null){
                return redirect()->back()->with('warning', 'No se puede eliminar la especialidad mientras se tengan ciclos activos');
            }
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect()->route('index.faculty')->with('success', 'Se eliminó la especialidad con éxito');
    }

    public function view($id) {
        try {
            $fac = $this->facultyService->find($id);
            $data['fac'] = $fac;
            if($fac->teacher!=null){
                $data['coordinatorName'] = $fac->teacher->Nombre;
                $data['coordinatorLastName'] = $fac->teacher->ApellidoPaterno;
                $data['coordinatorSLastName'] = $fac->teacher->ApellidoMaterno;
            }else{
                $data['coordinatorName'] = " ";
                $data['coordinatorLastName'] = " ";
                $data['coordinatorSLastName'] = " ";
            }
        } catch(\Exception $e) {
            dd($e);
        }
        return $data;
    }

    /*Academic Cycle*/

    public function indexAcademicCycle() {
        $data['title'] = Session::get('faculty-name');
        $data['fac']=null;
        try {
            $data['configs'] = $this->facultyService->retrieveAllAcademicCycle();
            $data['faculties'] = $this->facultyService->retrieveAll();
            $data['teachers'] = $this->teacherService->findTeacherByFaculty( Session::get('faculty-code'));
        } catch(\Exception $e) {
            dd($e);
        }
        return view('faculty.indexAcademicCycle', $data);
    }

    public function createAcademicCycle(Request $request) {
        $data['title'] = Session::get('faculty-name');
        try {
            $data['conf']= $this->facultyService->findConfFaculty(Session::get('faculty-code'), Session::get('period-code'));
            //$data['faculties'] = $this->facultyService->retrieveAll();
            $data['teachers'] = $this->teacherService->findTeacherByFaculty( Session::get('faculty-code'));
        } catch (\Exception $e) {
            dd($e);
        }

        return view('faculty.createAcademicCycle', $data);
    }

    public function saveAcademicCycle(Request $request) {
        $data['title'] = Session::get('faculty-name');
        try {
            $data['conf']= $this->facultyService->findConfFaculty(Session::get('faculty-code'), Session::get('period-code'));
            if ($data['conf']!=null)
                $this->facultyService->updateAcademicCycle($data['conf']->IdConfEspecialidad,$request);
            else
                $this->facultyService->createAcademicCycle($request->all(),Session::get('faculty-code'));
            $data['conf']= $this->facultyService->findAcademicCycleByFaculty(Session::get('faculty-code'));
        } catch(\Exception $e) {
            dd($e);
        }
        return redirect()->route('newAcademicCycle.faculty',$data)->with('success', 'La especialidad ha sido actualizada con éxito');
    }

    public function editAcademicCycle(Request $request) {
        $data['title'] = Session::get('faculty-name');
        $data['name'] = Session::get('faculty-name');
        try {

            $data['conf'] = $this->facultyService->findAcademicCycle($request->all());
            $data['faculty'] = $this->facultyService->find($data['conf']->IdEspecialidad);
            $data['coordinator'] = $this->facultyService->getTeacherById($data['conf']->IdDocente);
        } catch (\Exception $e) {
            dd($e);
        }
        return view('faculty.editAcademicCycle', $data);
    }

    public function viewPeriod() {
        $data['title'] = 'Información del Periodo Actual';
        try {
            $data['conf'] = $this->facultyService->findConfFaculty(Session::get('faculty-code'), Session::get('period-code'));
        } catch(\Exception $e) {
            dd($e);
        }
        return view('faculty.viewPeriod', $data);
    }

    public function updatePeriod(Request $request) {
        try {
            $conf= $this->facultyService->updateConfFaculty($request->all());
            $period = $this->facultyService->findPeriod(Session::get('faculty-code'));
        } catch(\Exception $e) {
            dd($e);
        }
        return redirect('/faculty/periods')->with('success', 'La Información del Periodo ha sido actualizada con éxito');
    }

    public function viewCycle() {
        $data['title'] = 'Información del Ciclo Actual';
        $data['teachers'] = $this->teacherService->findTeacherByFaculty( Session::get('faculty-code'));
        try {
            $cycle = Session::get('academic-cycle');
            $data['cycle'] = $cycle;
            if($cycle!=null){
                    $data['dateI'] = date('d/m/Y',strtotime($cycle->FechaInicio.''));
                    $data['dateF'] = date('d/m/Y',strtotime($cycle->FechaFin.''));
            }
            else{
                    $data['dateI'] = null;
                    $data['dateF'] = null;

            }
        $data['cicle'] = $this->facultyService->findCycle(Session::get('faculty-code'));
        $data['period'] = $this->facultyService->findPeriod(Session::get('faculty-code'));
        if(Session::get('academic-cycle')!= null){
        	$data['cyclexresults'] = $this->facultyService->findResultsxCycle(Session::get('academic-cycle')->IdCicloAcademico);
        }



        } catch(\Exception $e) {
            dd($e);
        }
        return view('faculty.viewCycle', $data);
    }

    public function editCycle() {
        $data['title'] = 'Información del Ciclo Actual';
        $data['teachers'] = $this->teacherService->findTeacherByFaculty( Session::get('faculty-code'));
        try {
            $cycle = Session::get('academic-cycle');
            $data['cycle'] = $cycle;
            if($cycle!=null){
                    $data['dateI'] = date('d/m/Y',strtotime($cycle->FechaInicio.''));
                    $data['dateF'] = date('d/m/Y',strtotime($cycle->FechaFin.''));
            }
            else{
                    $data['dateI'] = null;
                    $data['dateF'] = null;

            }

        $data['cicle'] = $this->facultyService->findCycle(Session::get('faculty-code'));
        $data['cycleAcademic'] = $this->facultyService->AllCyclesAcademics();
        $data['results'] = $this->facultyService->allResultsInPeriod();
        if(Session::get('academic-cycle')!= null){
        	$data['cyclexresults'] = $this->facultyService->findResultsxCycle(Session::get('academic-cycle')->IdCicloAcademico);
        }else{
        	$data['cyclexresults'] = null;
        }

        } catch(\Exception $e) {
            dd($e);
        }
        return view('faculty.editCycle', $data);
    }

    public function updateCycle(Request $request) {
        try {

            //$lastcicle = $this->facultyService->findCycleLast(Session::get('faculty-code'));
            //dd($lastcicle);
            if(Session::get('academic-cycle')!=null){
            //if($lastcicle!=null){
                    $cycle = $this->facultyService->updateCycle($request->all());
            }
            else {
                    $cycle = $this->facultyService->createCycle($request->all());

            }

            $cycle = $this->facultyService->findCycle(Session::get('faculty-code'));
            //Session::forget('academic-cycle');
            //Session::set('academic-cycle',$cycle);
        } catch(\Exception $e) {
            dd($e);
        }
        return redirect()->route('editCycle.faculty')->with('success', 'La Información del Ciclo ha sido actualizada con éxito');
    }

    public function viewAcademicCycle($IdConfEspecialidad) {
        $data['name'] = Session::get('faculty-name');
        $data['title'] = Session::get('faculty-name');
        try {
            $data['conf'] = $this->facultyService->findAcademicCycle($IdConfEspecialidad);
            $data['faculty'] = $this->facultyService->find($data['conf']->IdEspecialidad);
            $data['coordinator'] = $this->facultyService->getTeacherById($data['conf']->IdDocente);
        } catch(\Exception $e) {
            dd($e);
        }
        return $data;
    }

    public function updateAcademicCycle(Request $request) {
        $data['title'] = Session::get('faculty-name');
        try {
            $this->facultyService->updateAcademicCycle($request->all());
        } catch(\Exception $e) {
            dd($e);
        }
        return redirect()->route('indexAcademicCycle.faculty')->with('success', 'La especialidad ha sido actualizada con éxito');
    }

    public function activateCycle(Request $request) {
        try {
            if(Session::get('academic-cycle')!=null){
            //if($lastcicle!=null){
                    $cycle = $this->facultyService->updateCycle($request->all());
                    $info = 0;
            }
            else {
                    $cycle = $this->facultyService->createCycle($request->all());
                    $info = 1;
            }
            $this->facultyService->activateCycle($request->all());
            $cycle = $this->facultyService->findCycle(Session::get('faculty-code'));
            Session::forget('academic-cycle');
            Session::set('academic-cycle',$cycle);
        } catch(\Exception $e) {
            dd($e);
        }
        if($info == 0){
        	return redirect()->route('viewCycle.faculty')->with('success', 'La Información del Ciclo ha sido actualizada con éxito');
        }else{
        	return redirect()->route('viewCycle.faculty')->with('success', 'Inició el Ciclo Académico');
        }
    }

    public function desactivateCycle(Request $request) {
        try {
            $this->facultyService->desactivateCycle($request->all());
            if(Session::get('academic-cycle')!=null){
                Session::forget('academic-cycle');
            }

        } catch(\Exception $e) {
            dd($e);
        }
        return redirect()->route('viewCycle.faculty')->with('success', 'Finalizó el Ciclo Académico');
    }

    public function desactivatePeriod(Request $request) {
        try {
            $this->facultyService->desactivatePeriod($request->all(), Session::get('faculty-code'));
            Session::forget('period-code');

        } catch(\Exception $e) {
            dd($e);
        }

        return redirect()->route('viewPeriod.faculty')->with('success', 'Finalizó el Periodo');
    }

    public function getPeriods()
    {
        $periods = collect();
        try {
            $periods = $this->periodService->getAll(Session::get('faculty-code'));
        } catch (Exception $e) {
        }

        return view('periods.index', compact('periods'));
    }

    public function editPeriod($period_id)
    {
        $data['title'] = 'Información del Periodo Actual';

        try {
            $data['period'] = $this->periodService->get($period_id);
            $data['semesters'] = $this->facultyService->AllCycleAcademic();
            $data['measures'] = $this->measureService->allByFaculty(Session::get('faculty-code'));
            $data['period_semesters'] = $this->cicleService->getCicleByPeriod($period_id);
            $data['studentsResults'] = $this->studentsResultService->findByFaculty();
            $data['educationalObjetives'] = $this->educationalObjetiveService->findByFaculty();
        } catch(\Exception $e) {
            dd($e);
        }

        return view('faculty.editPeriod', $data);
    }

    public function endPeriod($period_id)
    {
        $this->facultyService->desactivatePeriod($period_id, Session::get('faculty-code'));

        if(Session::get('academic-cycle')!=null){
            Session::forget('academic-cycle');
        }

        return redirect()->route('viewPeriod.faculty')->with('success', 'El periodo se ha finalizado satisfactoriamente');
    }

    public function createPeriod()
    {
        $data['title'] = 'Iniciar Nuevo Periodo';

        try {
            $data['semesters'] = $this->facultyService->AllCycleAcademic();
            $data['measures'] = $this->measureService->allByFaculty(Session::get('faculty-code'));
            $data['studentsResults'] = $this->studentsResultService->findByFaculty();
            $data['educationalObjetives'] = $this->educationalObjetiveService->findByFaculty();
        } catch(\Exception $e) {
            dd($e);
        }

        return view('periods.create', $data);
    }

    public function storePeriod(Request $request)
    {
        try {
            $period = $this->facultyService->createConfFaculty($request->all());

            Session::put('period-code', $period->IdPeriodo);
        } catch (Exception $e) { }

        return redirect()->route('viewPeriod.faculty')->with('success', 'El periodo se ha iniciado satisfactoriamente');
    }
}