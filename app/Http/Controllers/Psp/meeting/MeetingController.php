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
use Auth;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meeting = meeting::get();

        $data = [
            'meeting'    =>  $meeting,
        ];
        return view('psp.meeting.index', $data);
        //return view('template.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meeting = meeting::find($id);

        $data = [
            'meeting' => $meeting,
        ];

        $data['supervisor'] = supervisor::find($meeting->idSupervisor);
        return view('psp.meeting.show',$data);
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
        $meeting = meeting::with('supervisor','student')->find($id)->get()->first();
        $data['meeting'] = $meeting;
        //dd($meeting);
        return view('psp.meeting.edit',$data);
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
}
