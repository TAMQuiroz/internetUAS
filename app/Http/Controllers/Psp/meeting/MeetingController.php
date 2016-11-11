<?php namespace Intranet\Http\Controllers\Psp\meeting;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Models\meeting;
use Intranet\Models\Student;
use Intranet\Http\Requests;
use Intranet\Http\Requests\MeetingRequest;
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
        $arr = [];
        $horas = freeHour::get();
        /*foreach ($horas as $hora) {
            $cadena = $hora->fecha.' - '.$hora->hora_ini.' - '.$hora->supervisor->nombres.' '.$hora->supervisor->apellido_paterno;
            array_push($arr, $cadena);
        }*/

        //$data['freeHours'] = $arr;
        $data['freeHours'] = $horas;
        $data['meeting'] = meeting::get();
     
        return view('psp.meeting.create',$data);
    }

    //Vista supervisor
    public function store(MeetingRequest $request)
    {
        
        try {

            $meeting = new meeting;
            $freeHour = FreeHour::find($request['disponibilidad']);
            $student = Student::where('IdUsuario',Auth::User()->IdUsuario)->first(); 
            $pspstudent =PspStudent::where('IdAlumno',$student->IdAlumno)->first(); 

            $meeting->idtipoestado = 1;
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

            $meeting->save();

            $pspstudent->idsupervisor=$freeHour->idsupervisor;
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
        $meeting = meeting::with('supervisor','student')->find($id)->get()->first();
        $data['meeting'] = $meeting;
        //dd($meeting);
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
        
        $meetings = meeting::where('idstudent',$id)->get();

        $data = [
            'meetings'    =>  $meetings,
        ];
        $data['student'] = $student;

        return view('psp.meeting.search', $data);       

    }

    //Vista supervisor
    public function indexSup()
    {
        $meetings = meeting::with('student')->get();

        $data = [
            'meetings'    =>  $meetings,
        ];
        return view('psp.meeting.indexSup', $data);
    }

    //Vista supervisor
    public function createSup()
    {
        $students = Student::get();
        $data = [
            'students'    =>  $students,
        ];
        return view('psp.meeting.createSup',$data);
    }

    //Vista supervisor
    public function storeSup(Request $request)
    {
        try {

            //Iniciacion
            $supervisor = Supervisor::where('iduser',Auth::User()->IdUsuario)->get()->first();                        
            $pspstudent =PspStudent::where('IdAlumno',$request['alumno'])->first(); 
            $meeting = new meeting;
            $freeHour = new FreeHour;
            //Crear freehour si la reunion es con supervisor
            //Se pueden crear disponibilidades excepcionales solo en esta pantalla (sin contar el maximo posible)
            if($request['tiporeunion']==1){
                $freeHour->fecha = $request['fecha'];
                $freeHour->hora_ini = $request['hora_inicio'];
                $freeHour->cantidad = 1;            
                $freeHour->idsupervisor = $supervisor->id;
                $freeHour->save();
                $meeting->idfreehour = $freeHour->id;
            }

            $meeting->idtipoestado = 1;
            $meeting->hora_inicio = $request['hora_inicio'];
            $timestamp = strtotime($request['hora_inicio']) + 60*60;
            $time = date('H:i:s', $timestamp);
            $meeting->hora_fin=$time;
            $meeting->fecha=$request['fecha'];
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
