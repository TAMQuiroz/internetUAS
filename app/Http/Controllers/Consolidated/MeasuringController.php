<?php 
namespace Intranet\Http\Controllers\Consolidated;

use View;
use Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use Intranet\Http\Services\Criterion\CriterionService;
use Intranet\Http\Services\StudentsResult\StudentsResultService;
use Intranet\Http\Services\EducationalObjetive\EducationalObjetiveService;
use Intranet\Http\Services\Period\PeriodService;

use PDF;
use Barryvdh\Snappy;
use Carbon;

class MeasuringController extends BaseController {

	protected $criterionService;
    protected $studentsResultService;
    protected $educationalObjetiveService;
    protected $periodService;

    public function __construct() {
    	$this->criterionService = new CriterionService();
        $this->studentsResultService = new StudentsResultService();
        $this->educationalObjetiveService = new EducationalObjetiveService();
        $this->periodService = new PeriodService();
    }

	public function index() {
		try {
            $data['periods'] = $this->periodService->getAll(Session::get('faculty-code'));
            $data['studentsResults'] = $this->studentsResultService->findByFaculty();
            $data['educationalObjetives'] = $this->educationalObjetiveService->findByFaculty();
            $data['cantLevels'] = $this->criterionService->getCantLevels();
        } catch(\Exception $e) {
            dd($e);
        }
		return view('consolidated.measuring.index',$data);
	}

    public function period(Request $request)
    {
        $period = collect();
        try {
            $period = $this->periodService->get($request['period']);
        } catch (Exception $e) {
            dd($e);
        }
        return response()->view('consolidated.measuring.view', compact('period'));
    }

    public function downloadAsPdf(Request $request) {
        try {
            $data['period'] = $period = $this->periodService->get($request['period']);
            $data['periods'] = $this->periodService->getAll(Session::get('faculty-code'));

            $data['studentsResults'] = $period->studentsResults;
            $data['educationalObjetives'] = $period->educationalObjetives;
            $data['cantLevels'] = $period->configuration->CantNivelCriterio;

        } catch(\Exception $e) {
            dd($e);
        }
        
        $mytime = Carbon\Carbon::now()->format('d-m-Y');
        $pdf = PDF::loadView('consolidated.measuring.viewPdf', $data)->setOrientation('landscape');
        return $pdf->download('Consolidado de Medición '.$mytime.'.pdf');
    }

}