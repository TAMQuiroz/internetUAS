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
use Intranet\Http\Services\AcademicCycle\AcademicCycleService;
use Illuminate\Support\Collection;

class EvidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $coursesService;
    protected $academicCycleService;

    public function __construct() {
        $this->coursesService = new CourseService();
        $this->academicCycleService = new AcademicCycleService();
        $this->middleware('auth', ['except' => 'getDownload']);
    }

    public function index()
    {
        $faculty_id = Session::get('faculty-code');
        $data['title'] = "Evidencias de la Especialidad";

        try {
            $data['courses'] = $this->coursesService->retrieveByFaculty($faculty_id);
            $data['ciclos'] = $this->academicCycleService->retrieveAll();
        } catch(\Exception $e) {
            redirect()->back()->with('warning','Ha ocurrido un error'); 
        }

        try {            
            $entries = Fileentry::all(); //archivos
            //Horarios del curso
            $archivos = array();
            foreach ($data['courses'] as $course) {
                $coursesxCycle = $course->coursexcycle;
                foreach ($coursesxCycle as $cxc) {
                    $cicloAcademico = $cxc->cicle->academicCycle;
                    $horarios = $cxc->timeTables;                    
                    $horariosIds = $horarios->pluck('IdHorario')->toArray();
                    $courseEvidences = CourseEvidence::whereIn('IdHorario', $horariosIds)->where('deleted_at', null)->get();
                    
                    // verficar si Fileentry y TimeTable (horario) es realmente many-to-many para eliminar este doble for
                    foreach ($courseEvidences as $evidencia) {
                        foreach ($entries as $file) {
                            if($evidencia->IdArchivoEntrada == $file->IdArchivoEntrada){

                                $datos['IdArchivoEntrada'] = $file->IdArchivoEntrada;
                                $datos['original_filename'] = $file->original_filename;
                                $datos['filename'] = $file->filename;
                                $datos['CodigoCurso'] = $course->Codigo; 
                                $datos['NombreCurso'] = $course->Nombre; 
                                $datos['CicloAcademico'] = $cicloAcademico->Descripcion;  

                                $collection = Collection::make($datos);                                
                                array_push($archivos, $collection); 
                            }
                        }
                    }

                }

            }
            $data['entries'] = $archivos;
        } catch (\Exception $e){
            redirect()->back()->with('warning','Ha ocurrido un error'); 
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
