<?php namespace Intranet\Http\Controllers\MeasurementSource;

use View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Intranet\Http\Services\MeasurementSource\MeasurementSourceService;
use Intranet\Http\Services\DictatedCourses\DictatedCoursesService;
use Intranet\Http\Services\StudentsResult\StudentsResultService;
use Intranet\Http\Services\Course\CourseService;

use Session;

class MeasurementSourceController extends BaseController {

    protected $measurementSourceService;
    protected $studentsResultService;
    protected $dictatedCoursesService;
    protected $coursesService;

    public function __construct() {
        $this->measurementSourceService = new MeasurementSourceService();
        $this->dictatedCoursesService = new DictatedCoursesService();
        $this->studentsResultService = new StudentsResultService();
        $this->coursesService = new CourseService();
    }

    public function index() {
        $data['title'] = "Instrumentos de Medición";
        try {
            // buca por especialidad 
            $data['sources'] = $this->measurementSourceService->allByFaculty();
           
        } catch(\Exception $e) {
            dd($e);
        }
        return view('measurementSource.index', $data);
    }

    //AJAX 

    public function save(Request $request) {
        try {
            $this->measurementSourceService->create($request->all());
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect()->route('index.measurementSource')->with('success', "El instrumento de medición se ha registrado exitosamente");
    }

    public function update(Request $request) {
        try {
            $this->measurementSourceService->update($request->all());
        } catch(\Exception $e) {
            dd($e);
        }
         return redirect()->route('index.measurementSource')->with('success', "Las modificaciones se han guardado exitosamente");
    } 

    public function delete(Request $request) {
        try{
            $this->measurementSourceService->delete($request->all());
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect()->route('index.measurementSource')->with('success', "El registro ha sido eliminado exitosamente");
    }

    public function viewMesuringByCourse(Request $request) {
        try{
            
            $data['course'] = $this->dictatedCoursesService->findCourse($request->all());
            $studentsResults = $this->studentsResultService->findResultEvaluated();

            $this->dictatedCoursesService->setCoursesEvaluated();

            // RE asociados al curso segun la matriz de aporte
            $data['studentsResults'] = $this->coursesService->findStudentsResultsByCourse($request->all(), $studentsResults);
            $data['msrxcrt'] = $this->measurementSourceService->findMxCByCourse($request['courseId']);
            $data['sources'] = $this->measurementSourceService->allByFaculty();

        } catch (\Exception $e) {
            dd($e);
        }
        //dd($data);
        return view('measurementSource.viewMesuringByCourse', $data);
    }

    public function editMesuringByCourse(Request $request) {
        try{
            $data['sources'] = $this->measurementSourceService->allMeasuringxPeriod();
            $data['course'] = $this->dictatedCoursesService->findCourse($request->all());
            $studentsResults = $this->studentsResultService->findResultEvaluated();
            $data['studentsResults'] = $this->coursesService->findStudentsResultsByCourse($request->all(), $studentsResults);
            $data['msrxcrt'] = $this->measurementSourceService->findMxCByCourse($request['courseId']);
        } catch (\Exception $e) {
            dd($e);
        }
        //dd($data);
        return view('measurementSource.editMesuringByCourse', $data);
    }

    public function saveMesuringByCourse(Request $request) {
        
        try {
            $this->measurementSourceService->saveMesuringByCourse($request->all());
        } catch (\Exception $e) {
            dd($e);
        }

        return redirect()->route('index.dictatedCourses')->with('success', "Las modificaciones se han guardado exitosamente");
    }

    public function findMeasuringByCriterion($idCriterioCurso) {
        $data['sources'] = [];
        $pos = strrpos($idCriterioCurso, 'R');
        $idCriterion = substr($item, 0, $pos);
        $idCourse = substr($item, $pos + 1);
        try {
            $data['sources'] = $this->measurementSourceService->findMeasuringByCriterion($idCourse, $idCriterion);
        } catch (\Exception $e) {
            dd($e);
        }
        dd($data);
        return json_encode($data);
    }

    public function measuringByCourse(Request $request) {
        
        try {            
            $msrxcrt = $this->measurementSourceService->findMxCByCourse($request['courseId']);
            $aspects = $this->studentsResultService->findAspect($request['idStudentsResult']);
            //$sources = $this->measurementSourceService->findMeasuringByCourse($request['courseId']);
            $sources = $this->measurementSourceService->allByFaculty();

        } catch (\Exception $e) {
            dd($e);
        }
        $data = collect(['sources' => $sources, 'aspects' => $aspects, 'msrxcrt' => $msrxcrt]);
        //dd($data);
        return response()->view('measurementSource.measuringByCourse-table', compact('data'));
    }
}