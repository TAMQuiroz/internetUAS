<?php namespace Intranet\Http\Controllers\Psp\Report;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Http\Requests;
use Intranet\Models\Teacher;
use Intranet\Models\PspProcessxTeacher;
use Intranet\Models\PspProcess;
use Intranet\Models\Supervisor;
use Intranet\Models\User;
use Intranet\Models\meeting;
use Auth;

class AttendanceRateController extends Controller
{
	public function create()
	{
		$proc=null;
        $teacher = Teacher::where('IdUsuario',Auth::User()->IdUsuario)->first(); 
        $procxt= PspProcessxTeacher::where('iddocente',$teacher->IdDocente)->get(); 
        $proc = array(); 
        $r = count($procxt);   
        if($r>0){
            foreach($procxt as $p){
                $proc[]=PspProcess::find($p->idpspprocess);
            }
        }
            //dd($proc);
        $data = [
            'pspproc'    =>  $proc,
        ];
        $reporte = null;
        $data['reporte'] = $reporte;
        return view('psp.report.attendanceRate',$data);
	}

	public function generate(Request $request)
	{
		$proc=null;
        $teacher = Teacher::where('IdUsuario',Auth::User()->IdUsuario)->first(); 
        $procxt= PspProcessxTeacher::where('iddocente',$teacher->IdDocente)->get(); 
        $proc = array(); 
        $r = count($procxt);   
	    if($r>0){
	        foreach($procxt as $p){
	            $proc[]=PspProcess::find($p->idpspprocess);
	        }
	    }
            //dd($proc);
        $rep = null;


        $supervisors = Supervisor::where('idpspprocess',$request['Proceso_de_Psp'])->get();
       //dd($students);
        $attendanceRates = array();            
        //if($r>0){
            foreach($supervisors as $supervisor){
            		$attendanceNum = meeting::where([
            			['idsupervisor',$supervisor->id],
            			['idtipoestado',13],
            			])->count();
            		$attendanceDen = meeting::where([
            			['idsupervisor',$supervisor->id],
            			])->count();
                    $attendanceRate = $attendanceNum/$attendanceDen;                
                    $attendanceRates[] = number_format($attendanceRate*100,2);
            }

        //}
        $report =$attendanceRates;
        //dd($cri);
        $data = [
            'pspproc'    =>  $proc,
        ];
        $data['reporte'] = $report;
        $data['supervisors'] = $supervisors;
        //dd($data);
        return view('psp.report.attendanceRate',$data);
	}

	
}