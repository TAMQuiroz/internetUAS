<?php namespace Intranet\Http\Services\StudentsResult;

use Intranet\Models\Course;
use Session;
use Intranet\Models\Aspect;
use Intranet\Models\Period;
use Intranet\Models\CyclexResult;
use Intranet\Models\ResultxObjective;
use Intranet\Models\StudentsResult;
use Intranet\Models\PeriodxResult;
use Intranet\Models\Contribution;
use DB;

class StudentsResultService {
    // obtener todos los resultados estudiantiles
    public function retrieveAll() {
        return StudentsResult::get();
    }

    // obtener todos los resultados estudiantiles (historicos) de la especialidad
    public function retrieveAllByFaculty($faculty_id = null) {
        $studentResults = StudentsResult::where('IdEspecialidad', Session::get('faculty-code', $faculty_id))->get();

        return $studentResults;
    }

    public function retrieveByFaculty($IdEspecialidad) {
        $studentResults = StudentsResult::where('IdEspecialidad', $IdEspecialidad)->where('deleted_at',null)->orderby('Identificador','ASC')->get();

        return $studentResults;
    }

    public function findByFaculty($faculty_id = null) {

        $studentResults = StudentsResult::where('IdEspecialidad', Session::get('faculty-code', $faculty_id))
            ->where('deleted_at', null)->where('Estado',0)->orderBy("Descripcion","ASC")->get();

        return $studentResults;
    }
    public function findByFaculty2($faculty_id= null) {

        $ar=[];
        $studentResults = StudentsResult::where('IdEspecialidad', $faculty_id)
            ->where('deleted_at', null)->where('Estado',0)->orderBy("Descripcion","ASC")->get();

        foreach ($studentResults as $res){
            array_push($ar, $res);
        }

        $studentResults2 = StudentsResult::where('IdEspecialidad', $faculty_id)
            ->where('deleted_at', null)->where('Estado',1)->orderBy("Descripcion","ASC")->get();

        foreach ($studentResults2 as $res){
            array_push($ar, $res);
        }

        return $ar;
    }
    public function findByFaculty3($faculty_id= null) {

        $studentResults = StudentsResult::where('IdEspecialidad', $faculty_id)
            ->where('deleted_at', null)->where('Estado',1)->orderBy("Descripcion","ASC")->get();

        return $studentResults;
    }

    public function findByFacultyAndCicle()
    {
        $studentResults = [];
        if(Session::get('academic-cycle') != null){
            $IdCicloAcademico=Session::get('academic-cycle')->IdCicloAcademico;
            if($IdCicloAcademico!=null){
                $resultsxCycles = CyclexResult::where('IdCicloAcademico', $IdCicloAcademico)
                    ->where('deleted_at', null)->get();

                    //dd($resultsxCycles);
            /*    $resultsDirties=StudentsResult::where('IdEspecialidad', Session::get('faculty-code'))
                    ->where('deleted_at', null)->get();

                foreach ($resultsxCycles as $resultsxCycle){
                    foreach ($resultsDirties as $resultsDirty){
                        if($resultsxCycle->IdResultadoEstudiantil == $resultsDirty->IdResultadoEstudiantil){
                            array_push($studentResults, $resultsDirty);
                            break;
                        }
                    }
                }*/
                
                if($resultsxCycles){      
                    foreach ($resultsxCycles as $resultsxCycle){
                        if($resultsxCycle->studentsResult!=null){
                            if($resultsxCycle->studentsResult->IdEspecialidad == Session::get('faculty-code') &&
                                    $resultsxCycle->studentsResult->deleted_at == null){
                                array_push($studentResults, $resultsxCycle->studentsResult);
                            }
                        }
                    }
                    return $studentResults;
                }else{
                    return $studentResults;
                }
            }else{
                return $studentResults;
            }
        }else{
            return $studentResults;
        }
        
    }

    public function findByFacultyAndCicle2($id)
    {
        $studentResults = [];
        if(Session::get('academic-cycle') != null){
            $IdCicloAcademico=Session::get('academic-cycle')->IdCicloAcademico;
            if($IdCicloAcademico!=null){
                $resultsxCycles = CyclexResult::where('IdCicloAcademico', $IdCicloAcademico)
                    ->where('deleted_at', null)->get();

                    //dd($resultsxCycles);
            /*    $resultsDirties=StudentsResult::where('IdEspecialidad', Session::get('faculty-code'))
                    ->where('deleted_at', null)->get();

                foreach ($resultsxCycles as $resultsxCycle){
                    foreach ($resultsDirties as $resultsDirty){
                        if($resultsxCycle->IdResultadoEstudiantil == $resultsDirty->IdResultadoEstudiantil){
                            array_push($studentResults, $resultsDirty);
                            break;
                        }
                    }
                }*/
                
                if($resultsxCycles){      
                    foreach ($resultsxCycles as $resultsxCycle){
                        if($resultsxCycle->studentsResult!=null){
                            if($resultsxCycle->studentsResult->IdEspecialidad == $id &&
                                    $resultsxCycle->studentsResult->deleted_at == null){
                                array_push($studentResults, $resultsxCycle->studentsResult);
                            }
                        }
                    }
                    return $studentResults;
                }else{
                    return $studentResults;
                }
            }else{
                return $studentResults;
            }
        }else{
            return $studentResults;
        }
        
    }

    public function findByFacultyAndCurrentPeriod()
    {
        $studentResults = [];
        $periodxStudentResults = PeriodxResult::where('IdPeriodo', Session::get('period-code'))->where('deleted_at', null)
            ->get();
        foreach ($periodxStudentResults as $periodxStudentResult){
            if($periodxStudentResult->studentsResult->IdEspecialidad == Session::get('faculty-code') &&
                $periodxStudentResult->studentsResult->deleted_at == null){
                array_push($studentResults, $periodxStudentResult->studentsResult);
            }
        }//$studentResults = StudentsResult::where('IdEspecialidad', Session::get('faculty-code'))
        //    ->where('deleted_at', null)->get();
        return $studentResults;
    }

    public function findByCourse($idCurso) {

        $studentResults = $this->findByFacultyPeriod();
        $ar =  array();
        $contributions   = Contribution::where('IdCurso', $idCurso)->where('deleted_at', null)->get();

        foreach($contributions as $pxsr){
            foreach($studentResults as $sr){
                if($pxsr->IdResultadoEstudiantil == $sr->IdResultadoEstudiantil){
                    array_push($ar, $sr);
                }
            }
        }
        return $ar;
    }

    // obtener todos los resultados estudiantiles de la especialidad
    public function findByFacultyActive() {

        $studentResults = StudentsResult::where('IdEspecialidad', Session::get('faculty-code'))
            ->where('Estado',1)->where('deleted_at', null)->get();

        return $studentResults;
    }

    // obtener todos los resultados estudiantiles del periodo actual y de la especialidad
    public function findByFacultyPeriod() {

        $ar =  array();

        $period = Period::where('IdEspecialidad', Session::get('faculty-code'))->where('Vigente', 1)->first();
        if ($period == null){
            return $ar;
        }
        /*
        $periodxresults = PeriodxResult::where('IdPeriodo', $period->IdPeriodo)
            ->where('deleted_at', null)->get();

        $studentResults = StudentsResult::where('IdEspecialidad', Session::get('faculty-code'))
            ->where('deleted_at', null)->get();

        foreach($periodxresults as $pxsr){
            foreach($studentResults as $sr){
                if($pxsr->IdResultadoEstudiantil == $sr->IdResultadoEstudiantil){
                    array_push($ar, $sr);
                }
            }
        }
        return $ar;
        */
        return $period->studentsResults;
    }

    // obtener todos los resultados estudiantiles evaluados en el ciclo actual
    public function findResultEvaluated($academic_cycle = null) {

        if (Session::get('academic-cycle', $academic_cycle)==null){
            return null;
        }

        $studentResults = $this->findByFaculty3(Session::get('academic-cycle', $academic_cycle)->IdEspecialidad);
        //dd(Session::get('academic-cycle')->IdEspecialidad);
        if ($studentResults == null)
            return null;

        $cyclexresults = CyclexResult::where('IdCicloAcademico', Session::get('academic-cycle', $academic_cycle)->IdCicloAcademico)
            ->where('deleted_at', null)->get();

        $ar =  array();
        foreach($studentResults as $sr){
            foreach($cyclexresults as $cxsr){
                if($sr->IdResultadoEstudiantil == $cxsr->IdResultadoEstudiantil){
                    array_push($ar, $sr);
                }
            }
        }

        return $ar;
    }


    // obtener todos los resultados estudiantiles evaluados de acuerdo al curso
    public function findResultEvaluatedByCourse($idCurso, $academic_cycle = null) {


        if (Session::get('academic-cycle', $academic_cycle)==null){
            return null;
        }

        $studentResults = $this->findByCourse($idCurso);
        if ($studentResults == null)
            return null;

        $cyclexresults = CyclexResult::where('IdCicloAcademico', Session::get('academic-cycle', $academic_cycle)->IdCicloAcademico)
            ->where('deleted_at', null)->get();

        $ar =  array();
        foreach($studentResults as $sr){
            foreach($cyclexresults as $cxsr){
                if($sr->IdResultadoEstudiantil == $cxsr->IdResultadoEstudiantil){
                    array_push($ar, $sr);
                }
            }
        }

        return $ar;
    }

    // obtener todos los resultados estudiantiles evaluados de acuerdo al curso
    public function findREByCourse($idCurso) {

        //$studentResultsByPeriod = $this->findByFacultyPeriod();
        $course = Course::where('IdCurso',$idCurso)->where('deleted_at', null)->first();
        $studentResultsByCourse = $course->studentsResults;

        $ar =  array();
        foreach($studentResultsByCourse as $sr){
            if($sr->Estado == 1){
                array_push($ar, $sr);
            }
        }
        return $ar;
    }

    public function updateEvaluated($request) {

        $results = CyclexResult::where('IdCicloAcademico', Session::get('academic-cycle')->IdCicloAcademico)
            ->where('deleted_at', null)->get();
        foreach($results as $cxr){
            $cxr->delete();
        }

        if ( array_key_exists('stRstCheck', $request) ){
            foreach($request['stRstCheck'] as $id){
                $r = CyclexResult::create([
                    'IdResultadoEstudiantil' => $id,
                    'IdCicloAcademico' => Session::get('academic-cycle')->IdCicloAcademico
                ]);
            }
            return 1;
        }
        return 0;
    }

    // obtener todos los resultados estudiantiles del periodo actual
    public function allByPeriod() {
        $cycles = Cycle::where('IdEspecialidad', Session::get('faculty-code'))
            ->where('IdPeriodo', Session::get('period-code'))->where('deleted_at', null)->get();

        $studentResults =  array();
        foreach($cycles as $cycle){
            $stdRsts = StudentsResult::where('IdEspecialidad', Session::get('faculty-code'))
                ->where('CicloRegistro', $cycle->Descripcion)->where('deleted_at', null)->get();
            foreach($stdRsts as $stdRst){
                array_push($studentResults, $stdRst);
            }
        }
        return $studentResults;
    }

    // obtener la entidad de resultado estudiantil
    public function find($request) {
        $studentsResult = StudentsResult::where('IdResultadoEstudiantil', $request['studentsResult-code'])->first();
        return $studentsResult;
    }
    public function findById($request) {
        $studentsResult = StudentsResult::where('IdResultadoEstudiantil', $request['resultado-estudiantil'])->first();
        return $studentsResult;
        
    }

    public function findActiveStudentsResults() {
        $studentsResults = StudentsResult::where('deleted_at', null)->get();
        return $studentsResults;
    }

    // Para el registrar -------------------------------------------------------------------------

    public function create($request) {


        $studentResult = StudentsResult::create([
            'IdEspecialidad' => Session::get('faculty-code'),
            'Identificador' => $request['identifier'],
            'Descripcion' => $request['description'],
            'Estado' => 0
        ]);

        /*
         if ( array_key_exists('aspect', $request) ){
            foreach($request['aspect'] as $name){
                $aspect = Aspect::create([
                    'IdResultadoEstudiantil' => $studentResult->IdResultadoEstudiantil,
                    'Nombre' => $name
                ]);
            }
        }
        */

        if ( array_key_exists('objsCheck', $request) ){
            foreach($request['objsCheck'] as $idObj){
                $resultxObjective = ResultxObjective::create([
                    'IdResultadoEstudiantil' => $studentResult->IdResultadoEstudiantil,
                    'IdObjetivoEducacional' => $idObj
                ]);
            }
        }
    }

    public function createByFaculty($request, $IdEspecialidad) {

        
        $studentResult = StudentsResult::create([
            'IdEspecialidad' => $IdEspecialidad,
            'Identificador' => $request['identifier'],
            'Descripcion' => $request['description'],
            'Estado' => 0
        ]);

        //dd($studentResult);

        if ( array_key_exists('objsCheck', $request) ){
            foreach($request['objsCheck'] as $idObj){
                $resultxObjective = ResultxObjective::create([
                    'IdResultadoEstudiantil' => $studentResult->IdResultadoEstudiantil,
                    'IdObjetivoEducacional' => $idObj
                ]);
            }
        }
    }

    // Para el visualizar  y editar -------------------------------------------------------------------------

    public function getById($idStudentsResult) {
        $studentResult = StudentsResult::where('IdResultadoEstudiantil', $idStudentsResult)->first();
        return $studentResult;
    }

    public function findAspect($idStudentsResult) {
        $aspects = Aspect::where('IdResultadoEstudiantil', $idStudentsResult)->where('deleted_at', null)->get();
        return $aspects;
    }

    // Para el visualizar -------------------------------------------------------------------------

    // obtener los objetivos educacionales asociados a un reultado estudiantil
    public function findEducationalObjetive($idStudentsResult) {

        $resultxObjective = ResultxObjective::where('IdResultadoEstudiantil', $idStudentsResult)
            ->where('deleted_at', null)->get();

        $educationalObjetives =  array();
        foreach($resultxObjective as $rxo){
            array_push($educationalObjetives, $rxo->educationalObjetive);
        }
        return $educationalObjetives;
    }

    // Para la vista del editar -------------------------------------------------------------------------

    // obtener la entidad de resultado estudiantil por Id
    public function getResultxObjective($idStudentsResult) {
        $resultxObjective = ResultxObjective::where('IdResultadoEstudiantil', $idStudentsResult)
            ->where('deleted_at', null)->get();
        return $resultxObjective;
    }

    // Para el guardar cambios -------------------------------------------------------------------------

    // actulizar la entidad de resultado estudiantil
    public function update($request) {
        $studentsResult = StudentsResult::where('IdResultadoEstudiantil', $request['code'])
            ->where('deleted_at', null)
            ->update([
                'Identificador' => $request['identifier'],
                'Descripcion' => $request['description']
            ]);

        $aspectList = Aspect::where('IdResultadoEstudiantil', $request['code'])->where('deleted_at', null)->get();

        if ( array_key_exists('aspectItem', $request) ){
            foreach($request['aspectItem'] as $item){
                $pos = strrpos($item, '-');
                $itemId = substr($item, 0, $pos);
                $itemName = substr($item, $pos + 1);

                if($itemId == 0){
                    $aspect = Aspect::create([
                        'IdResultadoEstudiantil' => $request['code'],
                        'Nombre' => $itemName
                    ]);
                }
                else{
                    $aspect = Aspect::where('IdAspecto', $itemId)
                        ->where('deleted_at', null)
                        ->update(['Nombre' => $itemName]);

                    foreach($aspectList as $aspect){
                        if($aspect->IdAspecto == $itemId){
                            $aspect->IdAspecto = -1;
                        }
                    }
                }
            }
            foreach($aspectList as $aspect){
                if($aspect->IdAspecto != -1){
                    $aspect->delete();
                }
            }
        }

        $resultxObjective = ResultxObjective::where('IdResultadoEstudiantil', $request['code'])
            ->where('deleted_at', null)->get();
        foreach($resultxObjective as $rxo){
            $rxo->delete();
        }

        if ( array_key_exists('objsCheck', $request) ){
            foreach($request['objsCheck'] as $idObj){
                $resultxObjective = ResultxObjective::create([
                    'IdResultadoEstudiantil' => $request['code'],
                    'IdObjetivoEducacional' => $idObj
                ]);
            }
        }
    }

    // Para eliminar logicamente -------------------------------------------------------------------------

    // eliminar la entidad de resultado estudiantil
    public function delete($request) {
        $studentsResult = $this->getById($request['id']);
        /*
        foreach($studentsResult->resultxObjective as $rxo){
            $rxo->delete();
        }

        foreach($studentsResult->periodxResult as $pxr){
            $pxr->delete();
        }

        foreach($studentsResult->contributions as $c){
            $c->delete();
        }

        foreach($studentsResult->aspect as $asp){
            foreach($asp->criterion as $crt){
                foreach($crt->criterionLevel as $lvl){
                    $lvl->delete();
                }
                $crt->delete();
            }
            $asp->delete();
        }
        */
        if( count($studentsResult->resultxObjective)>0 or count($studentsResult->periodxResult)>0 or
            count($studentsResult->contributions)>0 or count($studentsResult->aspects)>0){
            return 0;
        }
        $studentsResult->delete();
        return 1;
    }

    public function countCriteria($studentsResults) {
        $cant = 0;
        if($studentsResults != null){
            foreach($studentsResults as $stdRst){
                if($stdRst->Estado == 1) {
                    foreach ($stdRst->aspect as $asp) {
                        if($asp->Estado == 1) {
                            $cant = $cant + sizeof($asp->criterion);
                        }
                    }
                }
            }
        }
        return $cant;
    }

    public function getProgress($studentsResults, $scores, $cantStudents) {
        $cantCrit = 0;
        $cantScores = 0;
        foreach($studentsResults as $stdRst){
            if($stdRst->Estado == 1) {
                foreach ($stdRst->aspect as $asp) {
                    if($asp->Estado == 1) {
                        foreach ($asp->criterion as $crt){
                            if ($crt->Estado == 1){
                                $cantCrit++;
                                foreach ($scores as $s){
                                    if ($s->IdCriterio == $crt->IdCriterio){
                                        $cantScores++;
                                    }
                                }
                            }
                        }                        
                    }
                }
            }
        }
        
        $progress = round( ( $cantScores * 100.0 ) / ( intval($cantCrit) * $cantStudents * 1.0 ) , 2);
        return $progress;
    }

    // Funciones AJAX -------------------------------------------------------------------------

    public function getIdentifier($identifier) {
        $studentsResult = StudentsResult::where('Identificador', $identifier)
            ->where('IdEspecialidad', Session::get('faculty-code'))
            ->where('deleted_at', null)->first();

        $retVal = (is_null($studentsResult)) ? True : False ;
        $data['studentsResult'] = $retVal;
        $data['info']= $studentsResult;
        return $data;
    }
}