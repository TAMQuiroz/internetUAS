<?php namespace Intranet\Http\Services\Investigation\Project;

use Intranet\Models\Investigator;
use Intranet\Models\Project;

class ProjectService {

    public function getNotSelectedInvestigators($id)
    {
        $proyecto = Project::find($id);
        $idsToDelete = [];
        $indexOfIds = [];

        foreach ($proyecto->investigators as $investigator) {
            array_push($idsToDelete,$investigator->id);
        }

        $investigators = $proyecto->group->investigators;
        foreach ($investigators as $key => $investigator) {
            if(in_array($investigator->id, $idsToDelete)){
                array_push($indexOfIds,$key);
            }
        }

        $investigators->forget($indexOfIds);

        return $investigators;
    }

    public function getNotSelectedStudents($id)
    {
        $proyecto = Project::find($id);
        $idsToDelete = [];
        $indexOfIds = [];

        foreach ($proyecto->students as $student) {
            array_push($idsToDelete,$student->id);
        }

        $students = $proyecto->group->students;
        foreach ($students as $key => $student) {
            if(in_array($student->id, $idsToDelete)){
                array_push($indexOfIds,$key);
            }
        }

        $students->forget($indexOfIds);

        return $students;
    }

    public function getNotSelectedTeachers($id)
    {
        $proyecto = Project::find($id);
        $idsToDelete = [];
        $indexOfIds = [];

        foreach ($proyecto->teachers as $teacher) {
            array_push($idsToDelete,$teacher->IdDocente);
        }

        $teachers = $proyecto->group->teachers;
        foreach ($teachers as $key => $teacher) {
            if(in_array($teacher->IdDocente, $idsToDelete)){
                array_push($indexOfIds,$key);
            }
        }

        $teachers->forget($indexOfIds);

        return $teachers;
    }
}