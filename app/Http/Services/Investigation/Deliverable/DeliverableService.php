<?php 
namespace Intranet\Http\Services\Investigation\Deliverable;

use Intranet\Models\Investigator;
use Intranet\Models\Deliverable;

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
}