<?php namespace Intranet\Http\Services\Suggestion;

use Intranet\Models\Teacher;
use Intranet\Models\Faculty;
use Intranet\Models\Suggestion;
use Intranet\Models\ImprovementPlan;
use Intranet\Models\TypeImprovementPlan;
use DB;
use Session;

class SuggestionService {

    public function retrieveAll() {
        return Suggestion::get();
    }

    public function findByTeacher() {
        if(Session::get('user')->IdDocente != 0){
            $suggestions = Suggestion::where('IdEspecialidad', Session::get('faculty-code'))
            ->where('IdDocente', Session::get('user')->IdDocente)->where('deleted_at', null)->get(); 
        }else{
            $suggestions = Suggestion::where('IdEspecialidad', Session::get('faculty-code'))
            ->where('IdDocente', null)->where('deleted_at', null)->get();
        }
        
        return $suggestions;
    }

    public function findByFaculty() {
        $suggestions = Suggestion::where('IdEspecialidad', Session::get('faculty-code'))
            ->where('deleted_at', null)->get();
        return $suggestions;
    }

    public function retrieveAllImprovementPlan(){
        return ImprovementPlan::get();
    }

    public function retrieveAllTypeImprovementPlan(){
        return TypeImprovementPlan::get();
    }

    public function findSuggestion($request) {
        $suggestion = Suggestion::where('IdSugerencia', $request['suggestionId'])->first();
        return $suggestion;
    }

    public function create($request) {

        if (Session::get('user')->IdDocente == 0) {
            $idDocente = null;
        }else{
            $idDocente = Session::get('user')->IdDocente;
        }

        if ($request['improvementPlan'] == 0) {
            $idImprovementPlan = null;
        }else{
            $idImprovementPlan = $request['improvementPlan'];
        }
        $suggestion = Suggestion::create([
            'Titulo' => $request['title'],
            'Descripcion' => $request['description'],
            'IdDocente' => $idDocente,
            'IdEspecialidad' => $data['specialty'] = Session::get('faculty-code'),
            'IdPlanMejora' => $idImprovementPlan,
            //'Estado' => 'Solicitado'
        ]);
    }

    public function aprrove($idSuggestion) {

        //$suggestion = Suggestion::where('IdSugerencia', $idSuggestion)
        //	->update(array(	'Estado' => 'Aprobado'));
    }

    public function reject($idSuggestion) {

        //$suggestion = Suggestion::where('IdSugerencia', $idSuggestion)
        //	->update(array(	'Estado' => 'Rechazado'));
    }

    public function update($request) {
        if (Session::get('user')->IdDocente == 0) {
            $idDocente = null;
        }else{
            $idDocente = Session::get('user')->IdDocente;
        }

        if ($request['improvementPlan'] == 0) {
            $idImprovementPlan = null;
        }else{
            $idImprovementPlan = $request['improvementPlan'];
        }
        $suggestion = Suggestion::where('IdSugerencia', $request['suggestionId'])
            //->where('deleted_at' -> null)
            ->update(array(	'Titulo' => $request['title'],
                'Descripcion' => $request['description'],
                'IdDocente' => $idDocente,
                'IdPlanMejora' => $idImprovementPlan));
    }

    public function delete($request) {
        $teacher = Teacher::where('IdDocente', $request['teacherid'])->update(array('Vigente' => "0"));
    }

    public function getSuggestion($suggestionId) {
        $suggestion = Suggestion::where('IdSugerencia', $suggestionId)->first();
        $data['suggestion'] = $suggestion;

        if($suggestion->IdDocente!= null){
            $data['name'] = $suggestion->teacher->Nombre;
            $data['lastname'] = $suggestion->teacher->ApellidoPaterno;
            $data['secondlastname'] = $suggestion->teacher->ApellidoMaterno;
        }else{
            $data['name'] = "Administrador";
            $data['lastname'] = "del";
            $data['secondlastname'] = "Sistemaa";
        }

        if($suggestion->IdPlanMejora != null){
            $data['typeDescription'] = $suggestion->improvementPlan->Descripcion;
            $data['typeTheme'] = $suggestion->improvementPlan->AnalisisCausal;
            $data['typeCode'] = $suggestion->improvementPlan->typeImprovementPlan->Codigo;
        }else{
            $data['typeDescription'] = "-";
            $data['typeCode'] = "-";
            $data['typeTheme'] = "-";
        }

        return $data;
    }

    public function searchSuggestions($request) {

        $idImprovementPlan =  $request['typePlan'];
        //$status =  $request['status'];

        $suggestions = null;
        if ($idImprovementPlan == 0){ // no buscar por tipo
            //if($status == '0' ){
            $suggestions = Suggestion::where('IdEspecialidad', Session::get('faculty-code'))
                ->where('deleted_at',null)->get();
            //}
            //else{
            //	$suggestions = Suggestion::where('IdEspecialidad', Session::get('faculty-code'))
            //		//->where('Estado',$status)
            //		->where('deleted_at',null)->get();
            //}
        }
        else{

            if($idImprovementPlan > 0){// buscar un tipo especifico
               $suggestions = Suggestion::where('IdEspecialidad', Session::get('faculty-code'))
                                        ->where('IdPlanMejora', $idImprovementPlan)
                                        ->where('deleted_at',null)->get(); 
            } 
            if($idImprovementPlan == -1){
                 $suggestions = Suggestion::where('IdEspecialidad', Session::get('faculty-code'))
                                        ->where('IdPlanMejora', null)
                                        ->where('deleted_at',null)->get();
            }
        }
        return $suggestions;
    }

    public function deleteSuggestion($request){
        $suggestion = Suggestion::where('IdSugerencia', $request['suggestion-id'])->first();
        $suggestion->delete();
    }
}