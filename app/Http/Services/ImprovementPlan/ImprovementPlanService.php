<?php namespace Intranet\Http\Services\ImprovementPlan;

use Intranet\Models\Teacher;
use Intranet\Models\Faculty;
use Intranet\Models\Suggestion;
use Intranet\Models\ImprovementPlan;
use Intranet\Models\TypeImprovementPlan;
use Intranet\Models\ActionPlan;
use Intranet\Models\Cicle;
use Intranet\Models\AcademicCycle;
use Intranet\Models\FileCertificate;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use DB;
use Session;

class ImprovementPlanService {
    public function retrieveAll() {
        return ImprovementPlan::get();
    }

    public function findByFaculty(){
        if (is_null(Session::get('faculty-code'))){
            $improvementPlans = ImprovementPlan::where('deleted_at', null)->get();
        }else{
            $improvementPlans = ImprovementPlan::where('IdEspecialidad', Session::get('faculty-code'))
                ->where('deleted_at', null)->get();
        }

        return $improvementPlans;
    }

    public function retrieveAllTypeImprovementPlan(){
        return TypeImprovementPlan::get();
    }

    public function findImprovementPlan($request) {
        $improvementPlan = ImprovementPlan::where('IdPlanMejora', $request['improvementPlanId'])->first();
        return $improvementPlan;
    }

    public function retrieveAllTeacher(){
        $vigente = "1";
        $teachers = Teacher::where('IdEspecialidad', $data['specialty'] = Session::get('faculty-code'))
            ->where('Vigente', $vigente)->get();
        return $teachers;
    }

    public function retrieveAllActions($request) {
        $actionplan = ActionPlan::where('IdPlanMejora', $request['improvementPlanId'])->get();
        return $actionplan;
    }

    public function retrieveAllCicles(){
        $cicles = AcademicCycle::get();
        return $cicles;
    }

    public function retrieveCicleAcademic(){
        if(Session::get('academic-cycle')!=null){
            $vigente = "1";
            $cicle = AcademicCycle::where('IdCicloAcademico', Session::get('academic-cycle')->IdCicloAcademico)->first();
            $cyclesAcademic=AcademicCycle::where('Numero','>=',$cicle->Numero)->get();
            return $cyclesAcademic;
        }
        else{
            return null;
        }
        
    }

    public function create($request) {

        if($_FILES['filefield']['name']!=""){
            $file = $request['filefield'];
            $extension = $file->getClientOriginalExtension();
            Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
            $entry = new FileCertificate();
            $entry->mime = $file->getClientMimeType();
            $entry->original_filename = $file->getClientOriginalName();
            $entry->filename = $file->getFilename().'.'.$extension;

            $entry->save();
        }
        else{

            $entry = null;
        }

        if($entry != null){
            if ($request['responsible'] != 0) {
                $responsable = $request['responsible'];
            }else{
                $responsable = null;
            }

            $s = $request['dateI'];
            $submitdate = str_replace( "/" , "-" , $s);
            $time = strtotime($submitdate);
            $date = date('Y-m-d',$time);

            $dataA = date('Y-m-d');
            if($date == $dataA){
                $estado = "En Ejecución";
            }else{
                $estado = "Pendiente"; 
            }

            $ImprovementPlan = ImprovementPlan::create([
                'Descripcion' => $request['title'],
                'AnalisisCausal' => $request['analysis'],
                'Hallazgo' => $request['find'],
                'IdTipoPlanMejora' => $request['typePlan'],
                'IdEspecialidad' => $data['specialty'] = Session::get('faculty-code'),
                'IdDocente' => $responsable,
                'IdArchivoEntrada' => $entry->IdArchivoEntrada,
                'FechaImplementacion' => $date,
                'Estado' => $estado
            ]);

        }else{
            if ($request['responsible'] != 0) {
                $responsable = $request['responsible'];
            }else{
                $responsable = null;
            }

            $s = $request['dateI'];
            $submitdate = str_replace( "/" , "-" , $s);
            $time = strtotime($submitdate);
            $date = date('Y-m-d',$time);

            $dataA = date('Y-m-d');

            if($date == $dataA){
                $estado = "En Ejecución";
            }else{
                $estado = "Pendiente"; 
            }

            $ImprovementPlan = ImprovementPlan::create([
                'Descripcion' => $request['title'],
                'AnalisisCausal' => $request['analysis'],
                'Hallazgo' => $request['find'],
                'IdTipoPlanMejora' => $request['typePlan'],
                'IdEspecialidad' => $data['specialty'] = Session::get('faculty-code'),
                'IdDocente' => $responsable,
                'FechaImplementacion' => $date,
                'Estado' => $estado
            ]);
        }



        for ($i=1; $i<count($_REQUEST['cicle']); $i++)
        {

            $respon = $_REQUEST['respon'][$i];

            if($respon == 0){
                $respon = null;
            }else{
                $respon = $_REQUEST['respon'][$i];
            }

            $ActionPlan =  ActionPlan::create([
                'IdPlanMejora' => $ImprovementPlan->IdPlanMejora,
                'IdCicloAcademico' => $_REQUEST['cicle'][$i],
                'IdDocente' => $respon,
                'Porcentaje' => 0,
                //'IdEspecialidad' => $data['specialty'] = Session::get('faculty-code'),
                //'Comentario' => $request['dateI'],
                'Descripcion' => $_REQUEST['desc'][$i]
            ]);
        }


    }

    public function update($request) {

        if ($request['responsible'] != 0) {
            $responsable = $request['responsible'];
        }else{
            $responsable = null;
        }

        $s = $request['dateI'];
        $submitdate = str_replace( "/" , "-" , $s);
        $time = strtotime($submitdate);
        $date = date('Y-m-d',$time);

        if($date<=date('Y-m-d') && $request['state']=="Pendiente"){
            $estado = "En Ejecución";
        }else{
            if($date > date('Y-m-d')){
                $estado = "Pendiente";  
            }else{
                $estado = $request['state'];
            }
            
        }

        $ImprovementPlan = ImprovementPlan::where('IdPlanMejora', $request['improvementPlanId'])
            ->update(array(	'AnalisisCausal' => $request['analysis'],
                'Descripcion' => $request['title'],
                'Hallazgo' => $request['find'],
                'Estado' => $estado,
                'IdDocente' => $responsable,
                'FechaImplementacion' => $date,
                'IdTipoPlanMejora' => $request['typePlan']));

        $aplan = ActionPlan::where('IdPlanMejora', $request['improvementPlanId'])->get();

        for($j=0; $j<count($aplan); $j++){
            $presente = false;
            for($z=1; $z<count($_REQUEST['idAction']);$z++){
                if($aplan[$j]->IdPlanAccion == $_REQUEST['idAction'][$z]){
                    $presente = true;
                }
            }
            if($presente== false){
                $actionP = ActionPlan::where('IdPlanAccion', $aplan[$j]->IdPlanAccion)->first();
                $actionP->delete();
            }

        }

        for ($i=1; $i<count($_REQUEST['cicle']); $i++)
        {

            $actualizar = false;
            $respon = $_REQUEST['respon'][$i];

            if($respon == 0){
                $respon = null;
            }else{
                $respon = $_REQUEST['respon'][$i];
            }

            if($_REQUEST['idAction'][$i]== ""){

                $ActPlan =  ActionPlan::create([
                    'IdPlanMejora' => $request['improvementPlanId'],
                    'IdCicloAcademico' => $_REQUEST['cicle'][$i],
                    'IdDocente' => $respon,
                    'Porcentaje' => 0,
                    //'IdEspecialidad' => $data['specialty'] = Session::get('faculty-code'),
                    //'Comentario' => $request['dateI'],
                    'Descripcion' => $_REQUEST['desc'][$i]
                ]);
            }else{

                $ActionPlan =  ActionPlan::where('IdPlanAccion', $_REQUEST['idAction'][$i])
                    ->update(array(	'IdCicloAcademico' => $_REQUEST['cicle'][$i],
                        'IdDocente' => $respon,
                        'Descripcion' =>$_REQUEST['desc'][$i],
                    ));

            }

        }
    }

    public function comment($request) {
        for ($i=0; $i<count($_REQUEST['actionPlanId']); $i++)
        {
            $ActionPlan = ActionPlan::where('IdPlanAccion', $_REQUEST['actionPlanId'][$i])
                ->update(array(	'Comentario' => $_REQUEST['comment'][$i] , 'Porcentaje' => $_REQUEST['porcent'][$i]));
        }

    }

    public function delete($request) {
        $teacher = Teacher::where('IdDocente', $request['teacherid'])->update(array('Vigente' => "0"));
    }


    public function getEnhacementPlan($improvementPlanId) {
        $improvementPlan = ImprovementPlan::where('IdPlanMejora', $improvementPlanId)->first();
        $data['improvementPlan'] = $improvementPlan;
        if ($improvementPlan->IdDocente != null) {
            $data['nameteacher'] = $improvementPlan->teacher->Nombre;
            $data['lastnameteacher'] = $improvementPlan->teacher->ApellidoPaterno;
            $data['secondlastnameteacher'] = $improvementPlan->teacher->ApellidoMaterno;
        }
        if($improvementPlan->IdTipoPlanMejora != null){
            if($improvementPlan->typeImprovementPlan->Descripcion!=null){
                $data['typeDescription'] = $improvementPlan->typeImprovementPlan->Descripcion;
            }else{
                $data['typeDescription'] = "-";
            }

            $data['typeCode'] = $improvementPlan->typeImprovementPlan->Codigo;
            $data['typeTheme'] = $improvementPlan->typeImprovementPlan->Tema;
        }
        return $data;
    }

    public function deleteImprovementPlan($request){
        $improvementPlan = ImprovementPlan::where('IdPlanMejora', $request['enhancementPlanId'])->first();
        $improvementPlan->delete();
    }

    public function search($request) {
        $word = $request['word'];
        //dd($word);
        $improvementPlan = ImprovementPlan::orWhere('Estado', 'LIKE', '%' . $word . '%')
                           ->orWhere('Descripcion', 'LIKE', '%' . $word . '%')
                           ->orWhere('FechaImplementacion', 'LIKE', '%' . $word . '%')
                           ->where('IdEspecialidad',$data['specialty']= Session::get('faculty-code'))
                           ->get();

        return $improvementPlan;
    }

    public function add($request) {
        if($_FILES['filefield']['name']!=""){
            $file = $request['filefield'];
            $extension = $file->getClientOriginalExtension();
            Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
            $entry = new FileCertificate();
            $entry->mime = $file->getClientMimeType();
            $entry->original_filename = $file->getClientOriginalName();
            $entry->filename = $file->getFilename().'.'.$extension;

            $entry->save();

            $ActionPlan = ActionPlan::where('IdPlanAccion', $request['actionPlanId'])
                ->update(array(	'IdArchivoEntrada' => $entry->IdArchivoEntrada
                ));

        }else{

            $entry = null;
        }
    }

    public function addPlan($request) {
        if($_FILES['filefield']['name']!=""){
            $file = $request['filefield'];
            $extension = $file->getClientOriginalExtension();
            Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
            $entry = new FileCertificate();
            $entry->mime = $file->getClientMimeType();
            $entry->original_filename = $file->getClientOriginalName();
            $entry->filename = $file->getFilename().'.'.$extension;

            $entry->save();

            $improvementPlan = ImprovementPlan::where('IdPlanMejora', $request['improvementPlanId'])
                ->update(array( 'IdArchivoEntrada' => $entry->IdArchivoEntrada
                ));

        }else{

            $entry = null;
        }
    }
}