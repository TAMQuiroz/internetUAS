<?php

namespace Intranet\Http\Controllers\Psp\Supervisor;

use Illuminate\Http\Request;

use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;

use Intranet\Models\Supervisor;
use Intranet\Models\PspProcess;
use Intranet\Models\PspProcessxSupervisor;
use Intranet\Models\PspProcessxTeacher;
use Intranet\Models\Teacher;
use Intranet\Models\Teacherxgroup;
use Intranet\Models\User;
use Intranet\Models\Course;
use Illuminate\Support\Facades\DB;

use Session;
use Auth;

class ParticipationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = Auth::User()->professor;
        $procesos = PspProcessxTeacher::where('iddocente',$user->IdDocente)->get();
        
        $primerProc = PspProcess::find($id);
        
        $supActivos = DB::table('pspprocessesxsupervisors')->join('pspprocesses','pspprocesses.id','=','pspprocessesxsupervisors.idpspprocess')->join('supervisors','pspprocessesxsupervisors.idsupervisor','=','supervisors.id')->select('supervisors.id','supervisors.nombres','supervisors.apellido_paterno','supervisors.codigo_trabajador','pspprocessesxsupervisors.id as idpsp')->where('pspprocesses.id',$id)->where('pspprocessesxsupervisors.deleted_at',null)->get();
        
        $ids = [];
        foreach ($supActivos as $sup) {
            array_push($ids, $sup->id);
        }
        
        $supervisores = Supervisor::where('idfaculty',$primerProc->idespecialidad)->whereNotIn('id',$ids)->get();

        $profActivos =DB::table('pspprocesses')->join('pspprocessesxdocente','pspprocesses.id','=','pspprocessesxdocente.idpspprocess')->join('Docente','pspprocessesxdocente.iddocente','=','Docente.IdDocente')->select('Docente.IdDocente','Codigo','Nombre','ApellidoPaterno','pspprocessesxdocente.id')->where('Docente.es_supervisorpsp',1)->where('pspprocesses.id',$id)->where('Docente.IdEspecialidad',$user->IdEspecialidad)->where('pspprocessesxdocente.deleted_at',null)->get();

        $profPsp =DB::table('pspprocesses')->join('pspprocessesxdocente','pspprocesses.id','=','pspprocessesxdocente.idpspprocess')->join('Docente','pspprocessesxdocente.iddocente','=','Docente.IdDocente')->select('Docente.IdDocente','Codigo','Nombre','ApellidoPaterno','pspprocessesxdocente.id')->where('Docente.es_supervisorpsp',null)->where('Docente.IdEspecialidad',$user->IdEspecialidad)->where('pspprocessesxdocente.deleted_at',null)->get();
        $prof = [];
        //array_push($prof, $user->IdDocente);
        foreach ($profActivos as $profA) {
            array_push($prof, $profA->IdDocente);
        }
        foreach ($profPsp as $profB) {
            array_push($prof, $profB->IdDocente);
        }
        $profesores = Teacher::where('IdEspecialidad',$user->IdEspecialidad)->whereNotIn('IdDocente',$prof)->get();

        $curso = Course::find($primerProc->idcurso);

        $data = [
            'supervisores'    =>  $supervisores,
            'proceso'      =>  $primerProc,
            'supActivos'    =>  $supActivos,
            'profesores'    =>  $profesores,
            'profActivos'   => $profActivos,
            'curso'         => $curso,
        ];
        
        return view('psp.supervisor.index-participant',$data);
    }

    public function storeSupervisor(Request $request)
    {
        try {
            $faculty_id = Session::get('faculty-code'); 
            $process = PspProcess::find($request['idproceso']);

            $supervisor = Supervisor::find($request['idSupervisor']);
            $supervisor->idpspprocess = $process->id;
            $supervisor->save(); 

            $relation = new PspProcessxSupervisor;
            $relation->idPspProcess = $process->id;
            $relation->idSupervisor = $request['idSupervisor'];
            $relation->save();

            return redirect()->route('supervisor.index-participant',$process->id)->with('success', 'El supervisor se ha agregado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroySupervisor($id)
    {
        try {
            $supervisor = PspProcessxSupervisor::find($id); //falta arreglar
            $data = $supervisor->idpspprocess;
            $supervisor->delete();
            return redirect()->route('supervisor.index-participant',$data)->with('success', 'El supervisor se ha quitado exitosamente');
            
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTeacher(Request $request)
    {
        try {
            $acceso = new PspProcessxTeacher;
            $acceso->idPspProcess = $request['idProceso'];
            $acceso->IdDocente =    $request['idProfesor'];
            $acceso->save();

            $profesor = Teacher::find($request['idProfesor']);
            $profesor->es_supervisorpsp = 1;
            $profesor->save();

            return redirect()->route('supervisor.index-participant',$request['idProceso'])->with('success', 'El profesor se ha agregado exitosamente como supervisor');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyTeacher($id)
    {
        try {
            $profesor = PspProcessxTeacher::find($id); 
            $data = $profesor->idpspprocess;
            $idProf = $profesor->iddocente;
            $profesor->delete();

            $existe = PspProcessxTeacher::where('iddocente',$idProf)->get();
            if(count($existe)==0){
                $prof = Teacher::find($idProf);
                $prof->es_supervisorpsp=null;
                $prof->save();
            }

            return redirect()->route('supervisor.index-participant',$data)->with('success', 'El profesor se ha quitado exitosamente como supervisor');
            
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
