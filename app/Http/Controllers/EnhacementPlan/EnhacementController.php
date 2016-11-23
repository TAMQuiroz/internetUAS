<?php namespace Intranet\Http\Controllers\EnhacementPlan;


use Intranet\Http\Services\TypeImprovementPlan\TypeImprovementPlanService;
use Intranet\Http\Services\AcademicCycle\AcademicCycleService;
use Intranet\Models\AcademicCycle;
use View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Intranet\Http\Services\ImprovementPlan\ImprovementPlanService;
use Carbon\Carbon;
use Intranet\Models\FileCertificate;
use Intranet\Models\ActionPlan;
use Intranet\Models\ImprovementPlan;
use Session;

class EnhacementController extends BaseController {

    protected $improvementPlanService;
    protected $typeImprovementPlanService;
    protected $academicCycleService;

    public function __construct() {
        $this->improvementPlanService = new ImprovementPlanService();
        $this->typeImprovementPlanService = new TypeImprovementPlanService();
        $this->academicCycleService = new ImprovementPlanService();
    }

    public function index() {

        try {
            $data['improvementPlans'] = $this->improvementPlanService->findByFaculty();
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }

        return view('enhacementPlan.index', $data);
    }

    public function create() {
        $data['title'] = 'Nuevo Plan de Mejora';

        try {

            //$data['cicles'] = $this->improvementPlanService->retrieveAllCicles();
            $data['cicles'] = $this->improvementPlanService->retrieveCicleAcademic();
            $data['teachers'] = $this->improvementPlanService->retrieveAllTeacher();

            $data['typeImprovementPlans'] = $this->typeImprovementPlanService->findByFaculty();
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }

        return view('enhacementPlan.form', $data);
    }

    public function save(Request $request) {

        $then   = Carbon::createFromFormat('d/m/Y',$request['dateI']);
        $now    = Carbon::now();

        if($then < $now){
            return redirect()->back()->with('warning','La fecha de inicio debe ser mayor a la fecha de hoy');
        }

        try {
            $this->improvementPlanService->create($request->all());
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return redirect()->route('index.enhacementPlan')->with('success', 'El plan de mejora se ha registrado exitosamente');
    }


    public function addCicleNew() {
        $data['title'] = 'Nuevo Ciclo Académico';
        return view('enhacementPlan.add-cicle',$data);
    } 
    
    public function addCicleEdit($id) {

        $data['improvementPlanId']=$id;
        $data['title'] = 'Editar Ciclo Académico';
        return view('enhacementPlan.add-cicle-edit',$data);
    } 

    public function saveCicleNew(Request $request) {
        try {
            $anio = $request['anio'];
            $numberC = $request['numberC'];
 
            $numero = $anio. $numberC;
            $descripcion = $anio."-".$numberC;

            $academicCycle = AcademicCycle::create([
                'Numero' => $numero,
                'Descripcion' => $descripcion
            ]);
            
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return redirect()->route('new.enhacementPlan')->with('success', 'El ciclo académico se ha registrado exitosamente');
    } 
    public function saveEditCicleNew(Request $request,$id) {

        try {
            $anio = $request['anio'];
            $numberC = $request['numberC'];
 
            $numero = $anio. $numberC;
            $descripcion = $anio."-".$numberC;

            $academicCycle = AcademicCycle::create([
                'Numero' => $numero,
                'Descripcion' => $descripcion
            ]);
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }

        $data['title'] = 'Editar Plan de Mejora';
        try {
            $data['actionplan'] = ActionPlan::where('IdPlanMejora', $id)->get();
            $data['cicles'] = $this->improvementPlanService->retrieveCicleAcademic();
            $data['teachers'] = $this->improvementPlanService->retrieveAllTeacher();
            $data['improvementPlan'] = ImprovementPlan::where('IdPlanMejora', $id)->first();
            $data['typeImprovementPlans'] = $this->typeImprovementPlanService->findByFaculty();
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }

        return view('enhacementPlan.edit', $data);
    }
    public function backEdit($id) {
        $data['title'] = 'Editar Plan de Mejora';
        try {
            $data['actionplan'] = ActionPlan::where('IdPlanMejora', $id)->get();
            $data['cicles'] = $this->improvementPlanService->retrieveCicleAcademic();
            $data['teachers'] = $this->improvementPlanService->retrieveAllTeacher();
            $data['improvementPlan'] = ImprovementPlan::where('IdPlanMejora', $id)->first();
            $data['typeImprovementPlans'] = $this->typeImprovementPlanService->findByFaculty();
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }

        return view('enhacementPlan.edit', $data);
    }   

    public function edit(Request $request) {
        $data['title'] = 'Editar Plan de Mejora';

        try {

            $data['actionplan'] = $this->improvementPlanService->retrieveAllActions($request->all());
            //$data['cicles'] = $this->improvementPlanService->retrieveAllCicles();
            $data['cicles'] = $this->improvementPlanService->retrieveCicleAcademic();
            $data['teachers'] = $this->improvementPlanService->retrieveAllTeacher();
            $data['improvementPlan'] = $this->improvementPlanService->findImprovementPlan(($request->all()));
            $data['typeImprovementPlans'] = $this->typeImprovementPlanService->findByFaculty();

        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }

        return view('enhacementPlan.edit', $data);
    }

    public function update(Request $request) {
        try {
            $this->improvementPlanService->update($request->all());
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return redirect()->route('index.enhacementPlan')->with('success', 'Las modificaciones se han guardado exitosamente');
    }

    public function comment(Request $request) {
        try {
            $this->improvementPlanService->comment($request->all());
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return redirect()->route('tracing.enhacementPlan', ['improvementPlanId' => $request['improvementPlanId']])->with('success', 'Las modificaciones se han guardado exitosamente');
    }

    public function tracing(Request $request) {
        $data['title'] = 'Seguimiento';

        try {

            $data['actionplan'] = $this->improvementPlanService->retrieveAllActions($request->all());
            //$data['cicles'] = $this->improvementPlanService->retrieveAllCicles();
            $data['cicles'] = $this->improvementPlanService->retrieveCicleAcademic();
            $data['teachers'] = $this->improvementPlanService->retrieveAllTeacher();
            $data['improvementPlan'] = $this->improvementPlanService->findImprovementPlan(($request->all()));
            $data['typeImprovementPlans'] = $this->typeImprovementPlanService->findByFaculty();

        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }

        return view('enhacementPlan.tracing', $data);
    }

    public function uploadAction(Request $request)
    {
    	//dd($request);
        $archivo = ActionPlan::where('IdPlanAccion', $request['actionPlanId'])->first();
        $data['planaccion'] = $archivo;
        $data['entries'] = FileCertificate::where('IdArchivoEntrada', $archivo->IdArchivoEntrada)->get();
        $data['actionPlanId'] = $request['actionPlanId'];
        $data['improvementPlanId'] = $request['improvementPlanId'];
        return view('enhacementPlan.upload', $data);
        //compact('entries')
    }

    public function downloadAction(Request $request)
    {
        $planmejora = ImprovementPlan::where('IdPlanMejora', $request['improvementPlanId'])->first();
        if($planmejora->IdArchivoEntrada != null){
            $data['entries'] = FileCertificate::where('IdArchivoEntrada', $planmejora->IdArchivoEntrada)->get();
        }else{
            $data['entries'] = null;
        }
        
        $data['improvementPlanId'] = $request['improvementPlanId'];
        return view('enhacementPlan.download', $data);
    }

    public function add(Request $request) {

        try {
            $this->improvementPlanService->add($request->all());
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return redirect()->route('uploadAction.enhacementPlan', ['actionPlanId' => $request['actionPlanId'], 'improvementPlanId' => $request['improvementPlanId']])->with('success', 'Se ha añadido el archivo exitosamente');

    }

    public function addPlan(Request $request) {

        try {
            $this->improvementPlanService->addPlan($request->all());
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return redirect()->route('downloadAction.enhacementPlan', ['improvementPlanId' => $request['improvementPlanId']])->with('success', 'Se ha añadido el archivo exitosamente');

    }

    public function get($filename){

        $entry = FileCertificate::where('filename','=',$filename)->firstOrFail();
        $file =Storage::disk('local')->get($entry->filename);

        return (new Response($file))->header('Content-Type', $entry->mime);
    }

    public function uploadFileToS3(Request $request)
    {
        $image = $request->file('image');
    }

    public function getEnhacementPlan($improvementPlanId) {
        try{
            $data['improvementPlan'] = $this->improvementPlanService->getEnhacementPlan($improvementPlanId);
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return json_encode($data);
    }

    public function CiclesAndTeachers() {
        try{
            $data['teachers'] = $this->improvementPlanService->retrieveAllTeacher();
            $data['info'] = $this->improvementPlanService->retrieveAllCicles();
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return json_encode($data);
    }

    //Deletion of courses
    public function delete(Request $request)
    {
        try{
            $this->improvementPlanService->deleteImprovementPlan($request->all());
        } catch (\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return redirect()->route('index.enhacementPlan')->with('success', 'El registro ha sido eliminado exitosamente');
    }

    public function search(Request $request) {
        try {
            $data['improvementPlans'] = $this->improvementPlanService->search($request->all());
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return view('enhacementPlan.index', $data);
    }

    public function report() {
        try {
            $data['improvementPlans'] = $this->improvementPlanService->findByFaculty();
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }
        return view('enhacementPlan.report', $data);
    }
}