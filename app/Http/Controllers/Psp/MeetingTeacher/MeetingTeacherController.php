<?php namespace Intranet\Http\Controllers\Psp\MeetingTeacher;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Models\MeetingTeacher;
use Intranet\Models\Student;
use Intranet\Models\meeting;
use Intranet\Http\Requests;
use Intranet\Http\Requests\MeetingRequest;
use Intranet\Models\freeHour;
use Intranet\Models\PspStudent;
use Intranet\Models\Supervisor;
use Intranet\Models\Tutstudent;
use Auth;
use Carbon\Carbon;
use Mail;
use DateTime;

class MeetingTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $MeetingTeacher = MeetingTeacher::get();
        $students = PspStudent::get();

        $data = [
            'MeetingTeacher'    =>  $MeetingTeacher,
        ];

        $data = [
            'students'    =>  $students,
        ];

        return view('psp.MeetingTeacher.index', $data);
        //return view('template.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $arr = [];
        $horas = freeHour::get();
        $student = Student::find($id);
        $data['freeHours'] = $horas;

        $data['MeetingTeacher'] = MeetingTeacher::get();
        $data['student'] = $student;
        return view('psp.MeetingTeacher.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeetingRequest $request, $id)
    {
         try {
            $meeting = new meeting;   
            $pspstudent =PspStudent::where('IdAlumno',$id)->first(); 
            $meeting->idtipoestado = 1;
            $freeHour = FreeHour::find($request['disponibilidad']);
            $meeting->fecha=$freeHour->fecha;
            $meeting->idsupervisor=$freeHour->idsupervisor;
            $meeting->idstudent=$id;

            $timestamp = mktime($freeHour->hora_ini,0,0, 0,0,0);
            $time = date('H:i:s', $timestamp);
            $meeting->hora_inicio=$time;
            $meeting->asistencia='o';
            $meeting->idfreeHour=$freeHour->id;
            $meeting->tiporeunion=1;

            $meeting->save();

            $pspstudent->idsupervisor=$freeHour->idsupervisor;
            $pspstudent->save();            

            return redirect()->route('MeetingTeacher.index')->with('success','La cita se ha registrado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning','Ocurrio un error al realizar la accion');
        }       
        

    }

    public function mail($id)
    {        
        try {
            $stud = Student::find($id);
            $student = Tutstudent::where('id_usuario',$stud->IdUsuario)->first();

            
                $mail = $student->correo;
                Mail::send('emails.notifyEndFase',['user' => $mail], function($m) use($mail){
                    $m->subject('Notificacion de fin de Fase de Reuniones');
                    $m->to($mail);
                });
            
             return redirect()->back()->with('success', 'Notificacon Enviada');
        } catch (Exception $e){
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
    
    }

    public function search($id)
    {
           

    }
}
