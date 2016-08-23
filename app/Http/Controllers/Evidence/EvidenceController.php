<?php namespace Intranet\Http\Controllers\Evidence;

use View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use Intranet\Models\CourseEvidence;
use Intranet\Models\MeasurementEvidence;
use Intranet\Models\SourcexCoursexCriterionxCycle;
use Intranet\Models\Fileentry;
use Intranet\Http\Services\StudentsResult\StudentsResultService;
use Intranet\Http\Services\Course\CourseService;
use Intranet\Http\Services\TimeTable\TimeTableService;
use Intranet\Http\Services\MeasurementSource\MeasurementSourceService;

class EvidenceController extends BaseController {

    protected $studentsResultService;
    protected $coursesService;
    protected $timeTableService;
    protected $measurementSourceService;

    public function __construct() {
        $this->studentsResultService = new StudentsResultService();
        $this->coursesService = new CourseService();
        $this->timeTableService = new TimeTableService();
        $this->measurementSourceService = new MeasurementSourceService();

        $this->middleware('auth', ['except' => 'getDownload']);
    }

    public function upload(Request $request)
    {
        $data['title'] = "Evidencias del Curso";
        try{
            $entries = Fileentry::all();
            $data['timeTable'] = $this->timeTableService->find($request->all());
            //$data['courseEvidences'] = CourseEvidence::all();
            $courseEvidences = CourseEvidence::where('IdHorario',$data['timeTable']->IdHorario)->where('deleted_at', null)->get();
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
        return view('evidences.upload', $data);
    }

    public function uploadMeasuring(Request $request)
    {
        $data['title'] = "Evidencia de Medición";
        try {
            $timeTable = $data['timeTable'] = $this->timeTableService->find($request->all());
            //$data['studentsResults'] = $this->studentsResultService->findResultEvaluated();
            $studentsResults = $this->studentsResultService->findResultEvaluated();
            $data['studentsResults'] = $this->coursesService->findStudentsResultsByCourse($timeTable->courseXCicle->IdCurso, $studentsResults);
            $evidenciasxcurso = $data['sources'] = $this->measurementSourceService->findMxCByCourse($timeTable->courseXCicle->IdCurso);
            $evidencias = array();
            foreach($evidenciasxcurso as $exc){
                $fuentexcursoxcriterio = MeasurementEvidence::where('IdFuentexCursoxCriterioxCiclo', $exc->IdFuentexCursoxCriterioxCiclo)->get();
                if(count($fuentexcursoxcriterio)!=0){
                    foreach($fuentexcursoxcriterio as $fxcxc){
                        $ev = Fileentry::where('IdArchivoEntrada', $fxcxc->IdArchivoEntrada)->first();
                        array_push($evidencias, $ev);
                    }
                }
                
            }
            $data['entries'] = $evidencias;

        } catch(\Exception $e) {
            dd($e);
        }
        return view('evidences.uploadMeasuring', $data);
    }

    public function add(Request $request) {
        $timeTable = $data['timeTable'] = $this->timeTableService->find($request->all());
        try{
            $file = $request->file('filefield');
            $extension = $file->getClientOriginalExtension();

            $entries = Fileentry::all();
            foreach ($entries as $entry){
                if($entry->original_filename == $file->getClientOriginalName()){
                    return redirect('/myCourses/evidences/upload?id='.$timeTable->IdHorario)->with('error', 'Evidencia repetida');
                }
            }
            Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
            $entry = new Fileentry();
            $entry->mime = $file->getClientMimeType();
            $entry->original_filename = $file->getClientOriginalName();
            $entry->filename = $file->getFilename().'.'.$extension;
            $entry->save();

            $courseEvidence = new CourseEvidence();
            $courseEvidence->IdArchivoEntrada = $entry->IdArchivoEntrada;
            $courseEvidence->IdHorario = $timeTable->IdHorario;
            $courseEvidence->save();
        } catch(\Exception $e){
            dd($e);
        }
        return redirect('/myCourses/evidences/upload?id='.$timeTable->IdHorario)->with('success', 'La evidencia se ha cargado exitosamente');
        //return view('evidences.upload', $data);
    }

    public function addM(Request $request) { //ADD MEASURING

        $timeTable = $data['timeTable'] = $this->timeTableService->find($request->all());
        $sxcxcxc = $data['sxcxcxc'] = $this->measurementSourceService->findSxCxCxC($request->all());
            try{
            $file = $request->file('filefield');
            $extension = $file->getClientOriginalExtension();
            
            Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
            $entry = new Fileentry();
            $entry->mime = $file->getClientMimeType();
            $entry->original_filename = $file->getClientOriginalName();
            $entry->filename = $file->getFilename().'.'.$extension;
            $entry->save();

            $measurementEvidence = new MeasurementEvidence();
            $measurementEvidence->IdArchivoEntrada = $entry->IdArchivoEntrada;
            $measurementEvidence->IdFuentexCursoxCriterioxCiclo = $sxcxcxc->IdFuentexCursoxCriterioxCiclo;
            $measurementEvidence->IdHorario = $timeTable->IdHorario;
            $measurementEvidence->save();

        } catch(\Exception $e){
            dd($e);
        }
        return redirect('/myCourses/evidences/uploadMeasuring?id='.$timeTable->IdHorario)->with('success', 'La evidencia de medición se ha cargado exitosamente');
    }

    public function get($filename){

        $entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('local')->get($entry->filename);

        return (new Response($file, 200))
            ->header('Content-Type', $entry->mime);
    }

    public function getDownload($filename){
        $entry = Fileentry::where('filename','=',$filename)->firstOrFail();
        $file =Storage::disk('local')->get($entry->filename);

        return (new Response($file))->header('Content-Type', $entry->mime);
    }

    public function delete(Request $request){
        $fileid = $request['fileid'];
        $courseEvidence = CourseEvidence::where('IdArchivoEntrada', $fileid)->first();
        $courseEvidence->delete();
        //->foreign('IdArchivoEntrada')->references('IdArchivoEntrada')->on('Fileentry')->onDelete('cascade');
        $fileEntry = Fileentry::where('IdArchivoEntrada',$fileid)->first();
        $fileEntry->delete();
        
        return back()->with('success', 'La evidencia se ha eliminado exitosamente');
    }

    public function deleteM(Request $request){
        $fileid = $request['fileid'];
        $measurementEvidence = MeasurementEvidence::where('IdArchivoEntrada', $fileid)->first();
        $measurementEvidence->delete();
        //->foreign('IdArchivoEntrada')->references('IdArchivoEntrada')->on('Fileentry')->onDelete('cascade');
        $fileEntry = Fileentry::where('IdArchivoEntrada',$fileid)->first();
        $fileEntry->delete();
        
        return back()->with('success', 'La evidencia de medición se ha eliminado exitosamente');
    }

    public function uploadFileToS3(Request $request)
    {
        $image = $request->file('image');
    }
}