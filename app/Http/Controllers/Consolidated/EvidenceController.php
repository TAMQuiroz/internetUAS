<?php

namespace Intranet\Http\Controllers\Consolidated;

use Illuminate\Http\Request;
use Session;
use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;
use Intranet\Models\Fileentry;
use Intranet\Models\TimeTable;
use Intranet\Models\CourseEvidence;
use Intranet\Http\Services\Course\CourseService;
use Intranet\Http\Services\TimeTable\TimeTableService;
use Intranet\Http\Services\DictatedCourses\DictatedCoursesService;

class EvidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $coursesService;

    public function __construct() {
        $this->coursesService = new CourseService();
        $this->dictatedCoursesService = new DictatedCoursesService();
        $this->timeTableService = new TimeTableService();
        $this->middleware('auth', ['except' => 'getDownload']);
    }

    public function index()
    {
        $faculty_id = Session::get('faculty-code');
        $data['title'] = "Evidencias de la Especialidad";

        try {
            $data['courses'] = $this->coursesService->retrieveByFaculty($faculty_id);
        } catch(\Exception $e) {
            dd($e);
        }

        try {
            $entries = Fileentry::all(); //archivos
            $coursesIds = $data['courses']->pluck('IdCurso')->toArray();

            $coursexcicleIds = $this->dictatedCoursesService->retrieveCoursesxCycleByCourse($coursesIds)->pluck('IdCursoxCiclo')->toArray();
            $data['timeTable'] = $this->timeTableService->retrieveTimeTableByCoursesxCycle($coursexcicleIds);

            $horariosIds = $data['timeTable']->pluck('IdHorario')->toArray();
            $courseEvidences = CourseEvidence::whereIn('IdHorario', $horariosIds)->where('deleted_at', null)->get();
          
            $filteredEntries = array();
            foreach ($courseEvidences as $courEv){
                foreach ($entries as $ent){
                    if ($courEv->IdArchivoEntrada == $ent->IdArchivoEntrada){
                        array_push($filteredEntries, $ent);
                        break;
                    }
                }
            }
            $data['entries'] = $filteredEntries;
            
        } catch (\Exception $e){
            dd($e);
        }

        return view('consolidated.evidences.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
