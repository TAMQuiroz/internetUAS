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
    public function index(Request $request)
    {
        $user = Auth::User()->professor;
        $procesos = PspProcessxTeacher::where('iddocente',$user->IdDocente)->get();
        
        $primerProc = PspProcess::find($request['IdProceso']);
        //$supActivos = PspProcessxSupervisor::where('idpspprocess',$request['IdProceso'])->get();
        $supActivos = DB::table('pspprocessesxsupervisors')->join('pspprocesses','pspprocesses.id','=','pspprocessesxsupervisors.idpspprocess')->join('supervisors','pspprocessesxsupervisors.idsupervisor','=','supervisors.id')->select('supervisors.id','supervisors.nombres','supervisors.apellido_paterno','supervisors.codigo_trabajador')->where('pspprocesses.id',$request['IdProceso'])->where('pspprocessesxsupervisors.deleted_at',null)->get();

        $ids = [];
        foreach ($supActivos as $sup) {
            array_push($ids, $sup->id);
        }
        
        $supervisores = Supervisor::where('idfaculty',$primerProc->idespecialidad)->whereNotIn('id',$ids)->get();

        $profActivos =DB::table('pspprocesses')->join('pspprocessesxdocente','pspprocesses.id','=','pspprocessesxdocente.idpspprocess')->join('Docente','pspprocessesxdocente.iddocente','=','Docente.IdDocente')->select('Docente.IdDocente','Codigo','Nombre','ApellidoPaterno','pspprocesses.id')->where('Docente.es_supervisorpsp',1)->where('pspprocesses.id',$request['IdProceso'])->where('Docente.IdEspecialidad',$user->IdEspecialidad)->where('pspprocessesxdocente.deleted_at',null)->get();

        $prof = [];
        array_push($prof, $user->IdDocente);
        foreach ($profActivos as $profA) {
            array_push($prof, $profA->IdDocente);
        }
        
        $profesores = Teacher::where('IdEspecialidad',$user->IdEspecialidad)->where('es_supervisorpsp',null)->whereNotIn('IdDocente',$prof)->get();

        //$profActivos = Teacher::where('IdEspecialidad',$user->IdEspecialidad)->where('es_supervisorpsp',1)->get();        

        $data = [
            'supervisores'    =>  $supervisores,
            'proceso'      =>  $primerProc,
            'supActivos'    =>  $supActivos,
            'profesores'    =>  $profesores,
            'profActivos'   => $profActivos,
        ];
        return view('psp.supervisor.index-participant',$data);
    }

    public function storeSupervisor(Request $request)
    {
        try {
            $faculty_id = Session::get('faculty-code'); 
            $process = PspProcess::where('idEspecialidad',$faculty_id)->first();

            $relation = new PspProcessxSupervisor;
            $relation->idPspProcess = $process->id;
            $relation->idSupervisor = $request['idSupervisor'];
            $relation->save();

            $data = [
            'IdProceso'    =>  $process->id,
            ];
            return redirect()->route('supervisor.index-participant',$data)->with('success', 'El supervisor se ha agregado exitosamente');
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
            $supervisor = PspProcessxSupervisor::find($id);
            $data = [
                'IdProceso'    =>  $supervisor->idpspprocess,
            ];
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
            $group = Group::find($request['id_group']);

            $group->teachers()->attach($request['id_docente']);

            return redirect()->route('grupo.edit',$group->id)->with('success', 'El profesor se ha agregado exitosamente');
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
            $teacherXgroup = Teacherxgroup::find($id);

            if($teacherXgroup){
                $group = Group::find($teacherXgroup->id_grupo);
                $teacherXgroup->delete();

                return redirect()->route('grupo.edit',$group->id)->with('success', 'El profesor se ha quitado exitosamente');
            }else{
                return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');    
            }
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
