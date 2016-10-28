<?php 
namespace Intranet\Http\Controllers\StudentsResult;

use View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use Session;
use Intranet\Http\Services\Course\CourseService;
use Intranet\Http\Services\StudentsResult\StudentsResultService;
use Intranet\Http\Services\EducationalObjetive\EducationalObjetiveService;

class StudentsResultController extends BaseController {

    protected $educationalObjetiveService;
    protected $studentsResultService;
    protected $coursesService;

    public function __construct() {
        $this->studentsResultService = new StudentsResultService();
        $this->educationalObjetiveService = new EducationalObjetiveService();
        $this->coursesService = new CourseService();
    }

    // ------------------------------  RESULTADO ESTUDIANTIL -----------------------------

    public function index() {
        $data['title'] = "Resultados Estudiantiles";
        try {
            $data['studentsResults'] = $this->studentsResultService->retrieveAllByFaculty();
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return view('studentsResults.index', $data);
    }

    // Para la pantalla de crear - Ciclo actual y OE de la especialidad
    public function create() {
        $data['title'] = "Nuevo Resultado Estudiantil";

        try {            
            $data['educationalObjetives'] = $this->educationalObjetiveService->findByFaculty();
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return view('studentsResults.create', $data);
    }

    // Boton guardar de la pantalla crear
    public function save(Request $request) {
        try {
            $studentsResult = $this->studentsResultService->create($request->all());
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return redirect()->route('index.studentsResult')->with('success', "El resultado estudiantil se ha registrado exitosamente");
    }

    // Para la pantalla mostrar
    public function view($idStudentsResult) {
        $data['title'] = "Resultado Estudiantil";
        try {            
            $data['studentsResult'] = $this->studentsResultService->getById($idStudentsResult);
            $data['aspects'] = $this->studentsResultService->findAspect($idStudentsResult);
            $data['educationalObjetives'] = $this->studentsResultService->findEducationalObjetive($idStudentsResult);

        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return view('studentsResults.view', $data);
    }

    // Para la pantalla editar
    public function edit($idStudentsResult) {
        $data['title'] = "Editar Resultado Estudiantil";
        try {
           $data['studentsResult'] = $this->studentsResultService->getById($idStudentsResult);
            $data['aspects'] = $this->studentsResultService->findAspect($idStudentsResult);
            $data['educationalObjetives'] = $this->educationalObjetiveService->findByFaculty();
            $data['resultxObjective'] = $this->studentsResultService->getResultxObjective($idStudentsResult);

        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return view('studentsResults.edit', $data);
    }

    // Boton guardar de la pantalla editar
    public function update(Request $request) {
        try {
            $this->studentsResultService->update($request->all());
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return redirect()->route('index.studentsResult')->with('success', "Las modificaciones se han guardado exitosamente");
    }    

    public function delete(Request $request) {
        $msg = 1;
        try{
            $msg = $this->studentsResultService->delete($request->all());
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        if($msg == 1) {
            return redirect()->route('index.studentsResult')->with('success', 'El registro ha sido eliminado exitosamente');
        }
        else{
            return redirect()->route('index.studentsResult')->with('error', 'No se puede eliminar el registro ya que exiten otros registros asociados');
        }
    }

    // ----------------------------  RESULTADO ESTUDIANTIL EVALUADO -----------------------------

    public function indexEvaluated() {
        $data['stRst'] = null;
        $data['title'] = "Resultados Estudiantiles Evaluados en el Ciclo Actual";
        try {
            // buca por especialidad y por periodo
            $data['studentsResults'] = $this->studentsResultService->findResultEvaluated();
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return view('studentsResults.indexEvaluated', $data);
    }

    public function editEvaluated() {
        $data['stRst'] = null;
        $data['title'] = "Seleccionar los Resultados Estudiantiles a Evaluar";
        try {
            // buca por especialidad y por periodo
            $data['results'] = $this->studentsResultService->findResultEvaluated();
            $data['studentsResults'] = $this->studentsResultService->findByFaculty();
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return view('studentsResults.editEvaluated', $data);
    }

    public function updateEvaluated(Request $request) {
        try {
            $code = $this->studentsResultService->updateEvaluated($request->all());
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return $code == 0 ? redirect()->route('indexEvaluated.studentsResult')->with('success', "No se ha seleccionado ningún resultado estudiantil") : redirect()->route('indexEvaluated.studentsResult')->with('success', "Las modificaciones se han guardado exitosamente");
    }   

     // -----------------------------------  APORTE ---------------------------------

    public function contributions() {
        $data = [];
        try {
            $data['currentStudentsResults'] = $this->studentsResultService->findByFacultyAndCicle();
            $data['courses']= $this->coursesService->retrieveByFacultyandCicle(Session::get('faculty-code'));
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return view('studentsResults.contributions', $data);
    }

    public function updateContributions(Request $request) {
        if(!isset($request['selectorContVal'])){
            return redirect()->back()->with('warning','La matriz de aporte no puede estar vacia.');
        }

        try {
            $this->coursesService->updateContributions($request->all());
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return redirect()->route('contributions.studentsResult')->with('success', 'La matriz de aporte ha sido actualizada con exito.');
    }

    // -----------------------------------  AJAX --------------------------------

    public function getById($studentResultCode){
        $res = [];
        try{
            $res = $this->studentsResultService->getAspectById($studentResultCode);
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return json_encode($res);
    }

    public function getIdentifier($identifier) {
        try{
            $data['studentsResults'] = $this->studentsResultService->getIdentifier($identifier);
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return json_encode($data);
    }

}