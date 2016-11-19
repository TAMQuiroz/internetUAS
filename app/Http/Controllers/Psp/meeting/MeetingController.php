<?php namespace Intranet\Http\Controllers\Psp\meeting;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Models\meeting;
use Intranet\Models\Student;
use Intranet\Models\Status;
use Intranet\Http\Requests;
use Intranet\Http\Requests\MeetingRequest;
use Intranet\Http\Requests\MeetingEditRequest;
use Intranet\Models\freeHour;
use Intranet\Models\PspStudent;
use Intranet\Models\Supervisor;
use Intranet\Models\User;
use Intranet\Models\Tutstudent;
use Auth;
use Carbon\Carbon;
use Mail;
use DateTime;


class MeetingController extends Controller
{
    
    //Vista alumno
    public function index()
    {
        $meeting = meeting::get();

        $data = [
            'meeting'    =>  $meeting,
        ];
        return view('psp.meeting.index', $data);
        //return view('template.index');
    }

    //Vista alumno
    public function create()
    {
        $arr = array(); 
        $meet=meeting::get();
        $horas = freeHour::get();
        foreach ($horas as $hora) {
            $m=null;            
            $m=meeting::where('idfreehour',$hora->id)->get();
            if(count($m)==0){
                $arr[]=$hora;
            }
        }
        //$data['freeHours'] = $arr;
        $data['freeHours'] = $arr;
        $data['meeting'] = $meet;
     
        return view('psp.meeting.create',$data);
    }

    //Vista alumno
    public function store(Request $request)
    {
        
        try {

            $meeting = new meeting;
            $freeHour = FreeHour::find($request['disponibilidad']);
            $student = Student::where('IdUsuario',Auth::User()->IdUsuario)->first(); 
            $pspstudent =PspStudent::where('IdAlumno',$student->IdAlumno)->first(); 

            $meeting->idtipoestado = 12;
            $meeting->fecha=$freeHour->fecha;
            $meeting->idsupervisor=$freeHour->idsupervisor;
            $meeting->idstudent=$student->IdAlumno;

            $timestamp = mktime($freeHour->hora_ini,0,0, 0,0,0);
            $time = date('H:i:s', $timestamp);
            $meeting->hora_inicio=$time;

            $timestamp = mktime($freeHour->hora_ini+1,0,0, 0,0,0);
            $time = date('H:i:s', $timestamp);
            $meeting->hora_fin=$time;

            $meeting->asistencia='o';
            $meeting->idfreeHour=$freeHour->id;
            $meeting->tiporeunion=1;
            $meeting->lugar = $freeHour->Supervisor->direccion;

            $meeting->save();

            $pspstudent->idsupervisor=$freeHour->idsupervisor;
            //dd($pspstudent);
            $pspstudent->save();            

            return redirect()->route('meeting.index')->with('success','La cita se ha registrado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning','Ocurrio un error al realizar la accion');
        }

    }

    //Vista supervisor y alumno
    public function show($id)
    {
        $meeting = meeting::find($id);

        $data = [
            'meeting' => $meeting,
        ];

        $data['supervisor'] = supervisor::find($meeting->idSupervisor);

        $data['user'] = User::find(Auth::User()->IdUsuario);
        
        return view('psp.meeting.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Vista supervisor
    public function edit($id)
    {
        //
        $meeting = meeting::where('id',$id)->with('supervisor','student','status')->get()->first();
        //dd($meeting);
        $statuses = Status::where('tipo_estado',3)->get();        
        $data = [
            'meeting' => $meeting,
        ];
        $data['statuses'] = $statuses;
        //dd($data);
        return view('psp.meeting.edit',$data);
    }

    public function mail($id)
    {        
        try {
            $stud = Student::find($id);
            $student = Tutstudent::where('id_usuario',$stud->IdUsuario)->first();

            
                $mail = $student->correo;
                Mail::send('emails.notifyNearMeeting',['user' => $mail], function($m) use($mail){
                    $m->subject('Notificacion de Reunión con Supervisor');
                    $m->to($mail);
                });
            
             return redirect()->back()->with('success', 'Notificacon Enviada');
        } catch (Exception $e){
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        } 
    }

    //Vista supervisor
    public function update(Request $request, $id)
    {
        //
        try {
            $meeting = meeting::find($id);
            $meeting->lugar = $request['lugar'];
            $meeting->observaciones = $request['observaciones'];
            $meeting->retroalimentacion = $request['retroalimentacion'];
            $meeting->idtipoestado = $request['idtipoestado'];
            $meeting->save();

            return redirect()->route('meeting.show',$id)->with('success','La reunion se ha actualizado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning','Ocurrio un error al realizar la accion');
        }
    }

    //Vista supervisor (cancelar reunion)
    public function destroy($id)
    {
        try {
            $meeting = meeting::find($id);
            $meeting->delete();

            return redirect()->route('meeting.indexSup')->with('success','Se ha cancelado la reunion');
        } catch (Exception $e) {
            return redirect()->back()->with('warning','Ocurrio un error al realizar la accion');
        }
    }

    //Vista supervisor
    public function search($id)
    {
        
        $student = Student::find($id);
        
        $meetings = meeting::where('idstudent',$id)->with('status')->get();

        $data = [
            'meetings'    =>  $meetings,
        ];
        $data['student'] = $student;

        return view('psp.meeting.search', $data);       

    }

    //Vista supervisor
    public function indexSup()
    {
        $meetings = meeting::with('student','status')->get();
        //dd($meetings);
        $data = [
            'meetings'    =>  $meetings,
        ];
        return view('psp.meeting.indexSup', $data);
    }

    //Vista supervisor
    public function createSup()
    {
        $students = Student::get();
        $supervisor = Supervisor::where('iduser',Auth::User()->IdUsuario)->get()->first();
        $data = [
            'students'    =>  $students,
        ];
        $data['lugar'] = $supervisor->direccion;
        return view('psp.meeting.createSup',$data);
    }

    //Vista supervisor
    public function storeSup(Request $request)
    {
        try {

            //Iniciacion
            $supervisor = Supervisor::where('iduser',Auth::User()->IdUsuario)->get()->first();
            //dd($supervisor);
            $pspstudent =PspStudent::where('IdAlumno',$request['alumno'])->first(); 
            $meeting = new meeting;
            $freeHour = new FreeHour;
            //Crear freehour si la reunion es con supervisor
            //Se pueden crear disponibilidades excepcionales solo en esta pantalla (sin contar el maximo posible)
            if($request['tiporeunion']==1){
                $freeHour->fecha = Carbon::createFromFormat('d/m/Y',$request['fecha']);
                $freeHour->hora_ini = $request['hora_inicio'];
                $freeHour->cantidad = 1;            
                $freeHour->idsupervisor = $supervisor->id;
                $freeHour->idpspprocess = $supervisor->idpspprocess;
                $freeHour->save();
                $meeting->idfreehour = $freeHour->id;
            }
            $meeting->tiporeunion = $request['tiporeunion'];
            $meeting->idtipoestado = 12;
            $meeting->hora_inicio = Carbon::createFromFormat('H',$request['hora_inicio']);
            $meeting->hora_fin = Carbon::createFromFormat('H',$request['hora_inicio'] + 1);
            /*
            $timestamp = mktime($request['hora_inicio'],0,0, 0,0,0);
            $time = date('H:i:s', $timestamp);
            $meeting->hora_inicio=$time;            
            $timestamp = strtotime($request['hora_inicio']) + 60*60;
            $time = date('H:i:s', $timestamp);
            $meeting->hora_fin=$time;
            */
            $meeting->fecha=Carbon::createFromFormat('d/m/Y',$request['fecha']);
            $meeting->idstudent=$request['alumno'];
            $meeting->idsupervisor=$supervisor->id;
            $meeting->asistencia='o';
            $meeting->lugar=$request['lugar'];
            //dd($meeting);
            $meeting->save();

            $pspstudent->idsupervisor=$freeHour->idsupervisor;
            $pspstudent->save();            
            return redirect()->route('meeting.indexSup')->with('success','La cita se ha registrado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning','Ocurrio un error al realizar la accion');
        }
    }
}
