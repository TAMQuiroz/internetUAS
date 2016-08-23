<?php 
namespace Intranet\Http\Controllers\Suggestion;

use View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use Session;
use Intranet\Http\Services\Suggestion\SuggestionService;
use Intranet\Http\Services\ImprovementPlan\ImprovementPlanService;
use Intranet\Http\Services\TypeImprovementPlan\TypeImprovementPlanService;

class SuggestionController extends BaseController {

    protected $suggestionService;
    protected $typeImprovementPlanService;
    protected $improvementPlanService;

    public function __construct() {
        $this->suggestionService = new SuggestionService();
        $this->typeImprovementPlanService = new TypeImprovementPlanService();
        $this->improvementPlanService =  new ImprovementPlanService();
    }

    public function index() {

        try {
            $data['suggestions'] = $this->suggestionService->findByTeacher();
        } catch (\Exception $e) {
            dd($e);
        }

        return view('suggestions.index',$data);
    }

    public function indexAll() {

        try {
            $data['suggestions'] = $this->suggestionService->findByFaculty();
            $data['improvementPlans'] = $this->improvementPlanService->findByFaculty();
        } catch (\Exception $e) {
            dd($e);
        }
        return view('suggestions.index-all',$data);
    }

    public function aprrove(Request $request) {

        try {
            $this->suggestionService->aprrove($request['idSuggestion']);
            $data['suggestions'] = $this->suggestionService->findByFaculty();
            $data['typeImprovementPlans'] = $this->typeImprovementPlanService->findByFaculty();
        } catch (\Exception $e) {
            dd($e);
        }
        return view('suggestions.index-all',$data);
    }

    public function reject(Request $request) {

        try {
            $this->suggestionService->reject($request['idSuggestion']);
            $data['suggestions'] = $this->suggestionService->findByFaculty();
            $data['typeImprovementPlans'] = $this->typeImprovementPlanService->findByFaculty();
        } catch (\Exception $e) {
            dd($e);
        }
        return view('suggestions.index-all',$data);
    }

    public function create() {
        $data['title'] = 'Nueva Sugerencia';

        try {
            $data['improvementPlans'] = $this->improvementPlanService->findByFaculty();
        } catch (\Exception $e) {
            dd($e);
        }

        return view('suggestions.form', $data);
    }

    public function save(Request $request) {
        try {
            $this->suggestionService->create($request->all());
        } catch(\Exception $e) {
            dd($e);
        }
        return redirect()->route('index.suggestions')->with('success', 'La sugerencia se ha registrado exitosamente');
    }

    public function edit(Request $request) {
        $data['title'] = 'Editar Sugerencia';

        try {
            $data['suggestion'] = $this->suggestionService->findSuggestion(($request->all()));
            $data['improvementPlans'] = $this->improvementPlanService->findByFaculty();

        } catch (\Exception $e) {
            dd($e);
        }

        return view('suggestions.edit', $data);
    }

    public function update(Request $request) {
        try {
            $this->suggestionService->update($request->all());
        } catch(\Exception $e) {
            dd($e);
        }
        return redirect()->route('index.suggestions')->with('success', 'Las modificaciones se han guardado exitosamente');
    }

    public function getSuggestion($suggestionId) {
        try{
            $data['suggestion'] = $this->suggestionService->getSuggestion($suggestionId);
        } catch(\Exception $e) {
            dd($e);
        }
        return json_encode($data);
    }

    public function searchSuggestions(Request $request) {
        $suggestions = collect();
        try{
            $data['suggestions'] = $this->suggestionService->searchSuggestions($request->all());
            $data['improvementPlans'] = $this->improvementPlanService->findByFaculty();
        } catch(\Exception $e) {
            dd($e);
        }
        //return response()->view('suggestions.suggestions-table', compact('suggestions'));
        return view('suggestions.index-all', $data);
    }

    public function delete(Request $request)
    {
        try{
            $this->suggestionService->deleteSuggestion($request->all());
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect()->route('index.suggestions')->with('success', 'El registro ha sido eliminado exitosamente');
    }

}