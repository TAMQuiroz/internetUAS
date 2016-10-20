<?php 
namespace Intranet\Http\Services\Investigation\Deliverable;

use Intranet\Models\Investigator;
use Intranet\Models\Deliverable;
use Intranet\Models\Invdocument;
use Mail;
use DB;
use DateTime;


class DeliverableService {

    public function getNotSelectedInvestigators($id)
    {
        $entregable = Deliverable::find($id);
        $idsToDelete = [];
        $indexOfIds = [];

        foreach ($entregable->investigators as $investigator) {
            array_push($idsToDelete,$investigator->id);
        }

        $investigators = $entregable->project->investigators;
        foreach ($investigators as $key => $investigator) {
            if(in_array($investigator->id, $idsToDelete)){
                array_push($indexOfIds,$key);
            }
        }

        $investigators->forget($indexOfIds);

        return $investigators;
    }

    public function getNotSelectedTeachers($id)
    {
        $entregable = Deliverable::find($id);
        $idsToDelete = [];
        $indexOfIds = [];

        foreach ($entregable->teachers as $teacher) {
            array_push($idsToDelete,$teacher->IdDocente);
        }

        $teachers = $entregable->project->teachers;
        foreach ($teachers as $key => $teacher) {
            if(in_array($teacher->IdDocente, $idsToDelete)){
                array_push($indexOfIds,$key);
            }
        }

        $teachers->forget($indexOfIds);

        return $teachers;
    }

    public function sendNotifications($id)
    {
        
        $entregable = Deliverable::find($id);

        try
        { 
            $nombreEntregable = $entregable->nombre;
            $fechaLimite = new DateTime($entregable->fecha_limite);
            $hoy = new DateTime();

            $diasRestantes = $fechaLimite->diff($hoy)->format('%d');
            $porcAvance = $entregable->porcen_avance;
            foreach($entregable->investigators as $investigator){
                $mail = $investigator->correo;
                Mail::send('emails.notifyDeadline', compact('nombreEntregable', 'diasRestantes', 'porcAvance'), function($m) use($mail){
                    $m->subject('Notificacion de fecha limite');
                    $m->to($mail);
                });
            }

            foreach($entregable->teachers as $teacher){
                $mail = $teacher->Correo;
                Mail::send('emails.notifyDeadline', compact('nombreEntregable', 'diasRestantes', 'porcAvance'), function($m) use($mail){
                    $m->subject('Notificacion de fecha limite');
                    $m->to($mail);
                });
            }
        }
        catch (\Exception $e)
        {
            dd($e->getMessage());
        }
    }

    public function findVersion($request)
    {
        $version = Invdocument::where('id', $request['versionId'])->first();
        return $version;
    }

    public function sendNotificationsObs($id)
    {
            
        $doc = Invdocument::find($id);
        $entregable = $doc->deliverable;
        try
        { 
            $nombreEntregable = $entregable->nombre;
            $numVersion = $doc->version;
            $observacion = $doc->observacion;
            foreach($entregable->investigators as $investigator){
                $mail = $investigator->correo;
                Mail::send('emails.notifyObservation', compact('nombreEntregable', 'numVersion', 'observacion'), function($m) use($mail){
                    $m->subject('Registro de observación');
                    $m->to($mail);
                });
            }

            foreach($entregable->teachers as $teacher){
                $mail = $teacher->Correo;
                Mail::send('emails.notifyObservation', compact('nombreEntregable', 'numVersion', 'observacion'), function($m) use($mail){
                    $m->subject('Registro de observación');
                    $m->to($mail);
                });
            }
        }
        catch (\Exception $e)
        {
            dd($e->getMessage());
        }
    }
}