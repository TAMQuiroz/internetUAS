<?php

namespace Intranet\Http\Controllers\Tutorship\TutMeeting;

use Auth;
use Mail;
use Config;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Intranet\Http\Controllers\Controller;
use Intranet\Http\Requests;
use Intranet\Http\Requests\DateTutorRequest;
use Intranet\Http\Requests\AttentionRequest;
use Intranet\Http\Requests\DeleteMeetingRequest;
use Intranet\Models\Files\ICS;
use Intranet\Models\Parameter;
use Intranet\Models\Tutorship;
use Intranet\Models\Tutstudent;
use Intranet\Models\Teacher;
use Intranet\Models\Topic;
use Intranet\Models\TutMeeting;
use Intranet\Models\Reason;
use Intranet\Models\TutSchedule;
use Illuminate\Support\Facades\Session;
use Intranet\Http\Services\User\PasswordService;


use Illuminate\Support\Facades\DB;
use Intranet\Models\Evaluation;
use Intranet\Models\Competence;
use Intranet\Models\Evquestion;
use Intranet\Models\Tutstudentxevaluation; 
use Intranet\Models\Evquestionxstudentxdocente;
use Intranet\Models\Competencextutstudentxevaluation;

class TutMeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMyStudents(Request $request)
    {
        $mayorId    = Session::get('faculty-code');

        $user       = Session::get('user');

        $filters    = [
            "code"              => $request->input('code'),
            "name"              => $request->input('name'),
            "lastName"          => $request->input('lastName'),
            "secondLastName"    => $request->input('secondLastName'),
        ];

        $myStudents = Tutstudent::getFilteredStudents($filters, $user->IdDocente, $mayorId);

        $data       = [
            'students'    =>  $myStudents,
        ];

        return view('tutorship.tutormystudents.index', $data);
    
    }

    public function showMyStudent($id)
    {
        $specialty = Session::get('faculty-code');
        $student = Tutstudent::find($id);
        $competenceResults = DB::table('competences');
        //Obtengo todas las evaluaciones corregidas para un alumno
        $tutstudentxevaluations = Tutstudentxevaluation::where('corregida','<>',null)
                                    ->where('id_tutstudent',$id)->orderBy('inicio', 'desc')->take(6)->get();
        
        $tutstudentxevaluations = $tutstudentxevaluations->sortBy('inicio');
        
        if( !$tutstudentxevaluations->isEmpty() ){
            $tutstudentxevaluationsAux = Tutstudentxevaluation::where('corregida','<>',null)
                                        ->where('id_tutstudent',$id)->orderBy('inicio', 'desc')
                                        ->leftJoin('competencextutstudentxevaluations', 'tutstudentxevaluations.id', '=', 'id_tutev');
                                        //->get();        
            $id_tutstudentxevaluations = array();        
            $id_competences = array();                
            $auxCompetences = DB::table('competences')
                                ->leftJoin('competencextutstudentxevaluations', 'competencextutstudentxevaluations.id_competence', '=', 'competences.id')
                                ->leftJoin( 'tutstudentxevaluations', 'tutstudentxevaluations.id', '=', 'competencextutstudentxevaluations.id_tutev')
                                ->where('corregida','<>',null)           
                                ->where('id_tutstudent',$id)->orderBy('inicio', 'desc')                            
                                ->groupBy('id_competence')->get();
            
            foreach ($auxCompetences as $auxCompetence) {
                array_push($id_competences, $auxCompetence->id_competence);
            }

            $i = 1;
            foreach ($tutstudentxevaluations as $tutstudentxevaluation) {
                array_push($id_tutstudentxevaluations, $tutstudentxevaluation->id_evaluation);
                $i++;
            }            
            $j = $i;
            while( $j < 7) {
                array_push($id_tutstudentxevaluations, 0); 
                $j++;
            }
            
            //the beast
            $competenceResults = DB::table('competences')
                ->select('nombre','Aux.*')
                ->join(DB::raw('(SELECT C.id_competence,
                    D.puntaje AS puntajeEva1, D.puntaje_maximo AS puntajeMaxEva1,
                    E.puntaje AS puntajeEva2, E.puntaje_maximo AS puntajeMaxEva2,
                    F.puntaje as puntajeEva3, F.puntaje_maximo AS puntajeMaxEva3,
                    G.puntaje as puntajeEva4, G.puntaje_maximo AS puntajeMaxEva4,
                    H.puntaje as puntajeEva5, H.puntaje_maximo AS puntajeMaxEva5,
                    I.puntaje as puntajeEva6, I.puntaje_maximo AS puntajeMaxEva6
                    FROM (

                    SELECT DISTINCT A.id_competence
                    FROM  `competencextutstudentxevaluations` A
                    LEFT JOIN  `tutstudentxevaluations` B ON A.id_tutev = B.id
                    WHERE id_tutstudent =' . $id .'
                    AND corregida = 1
                    )C
                    LEFT JOIN (

                    SELECT id_evaluation, id_competence, puntaje, puntaje_maximo
                    FROM  `competencextutstudentxevaluations` A
                    LEFT JOIN  `tutstudentxevaluations` B ON A.id_tutev = B.id
                    WHERE id_tutstudent =' . $id .'
                    AND id_evaluation =' . $id_tutstudentxevaluations[0] .'
                    )D ON C.id_competence = D.id_competence
                    LEFT JOIN (

                    SELECT id_evaluation, id_competence, puntaje, puntaje_maximo
                    FROM  `competencextutstudentxevaluations` A
                    LEFT JOIN  `tutstudentxevaluations` B ON A.id_tutev = B.id
                    WHERE id_tutstudent =' . $id .'
                    AND id_evaluation =' . $id_tutstudentxevaluations[1] .'
                    )E ON C.id_competence = E.id_competence
                    LEFT JOIN (

                    SELECT id_evaluation, id_competence, puntaje, puntaje_maximo
                    FROM  `competencextutstudentxevaluations` A
                    LEFT JOIN  `tutstudentxevaluations` B ON A.id_tutev = B.id
                    WHERE id_tutstudent =' . $id .'
                    AND id_evaluation =' . $id_tutstudentxevaluations[2] .'
                    )F ON C.id_competence = F.id_competence
                    LEFT JOIN (

                    SELECT id_evaluation, id_competence, puntaje, puntaje_maximo
                    FROM  `competencextutstudentxevaluations` A
                    LEFT JOIN  `tutstudentxevaluations` B ON A.id_tutev = B.id
                    WHERE id_tutstudent =' . $id .'
                    AND id_evaluation =' . $id_tutstudentxevaluations[3] .'
                    )G ON C.id_competence = G.id_competence
                    LEFT JOIN (

                    SELECT id_evaluation, id_competence, puntaje, puntaje_maximo
                    FROM  `competencextutstudentxevaluations` A
                    LEFT JOIN  `tutstudentxevaluations` B ON A.id_tutev = B.id
                    WHERE id_tutstudent =' . $id .'
                    AND id_evaluation =' . $id_tutstudentxevaluations[4] .'
                    )H ON C.id_competence = H.id_competence
                    LEFT JOIN (

                    SELECT id_evaluation, id_competence, puntaje, puntaje_maximo
                    FROM  `competencextutstudentxevaluations` A
                    LEFT JOIN  `tutstudentxevaluations` B ON A.id_tutev = B.id
                    WHERE id_tutstudent =' . $id .'
                    AND id_evaluation =' . $id_tutstudentxevaluations[5] .' 
                    )I ON C.id_competence = I.id_competence) Aux'), function($join)
                {
                    $join->on('competences.id', '=', 'Aux.id_competence');
                })->get();  
        } else{
            $competenceResults = array();            
        }         
        //dd($competenceResults);
        //end the beast            
        $data       = [
            'student'                => $student, 
            'competenceResults'      => $competenceResults, 
            'tutstudentxevaluations' => $tutstudentxevaluations,            
        ];


        return view('tutorship.tutormystudents.show', $data);
    }

    public function indexMyDatesStudent(Request $request)
    {
        $mayorId    = Session::get('faculty-code');
        $user       = Session::get('user');        
        $student    = Tutstudent::where('id_usuario',$user->id_usuario)->first();        
        $id_tutstudent = $student->id;
        $id_docente = Session::get('user')->IdDocente;
        $dateOriginalFormat = $request['beginDate'];            
        if ( $dateOriginalFormat )
            $beginDate = date("Y-m-d", strtotime($dateOriginalFormat));
        else
            $beginDate = "";        
        $dateOriginalFormat = $request['endDate'];            
        if ( $dateOriginalFormat )
            $endDate = date("Y-m-d", strtotime($dateOriginalFormat. '+1 day'));        
        else
            $endDate = "";
        $filters    = [
            "id_tutstudent"  => $id_tutstudent,            
            "beginDate"      => $beginDate,
            "endDate"        => $endDate,
            "state"          => $request->input('state'),            
        ];
        $tutMeetings = TutMeeting::getFilteredTutMeetingsByStudent($filters);
        $fecha = array();
        $hora_inicio = array();        
        $hora = array();        
        $hora_fin = array();        
        foreach ($tutMeetings as $tutMeeting) {
            if ($tutMeeting) {
                $string    = explode(' ', $tutMeeting->inicio);
                $dia       = explode('-', $string[0]);
                $horaI     = explode(':', $string[1]);        
                $today     = date('Y-m-d H:i:s', strtotime($tutMeeting->inicio)); 
                $fecha_fin = date('Y-m-d H:i:s', strtotime($today . '+' . $tutMeeting->duracion . ' minutes'));                                
                $stringF   = explode(' ', $fecha_fin);                
                $horaF     = explode(':', $stringF[1]);        
                $dateDay   = date('w', strtotime($tutMeeting->inicio));

                $tutMeeting->estado = $tutMeeting->estado == 4 && 
                                        $tutMeeting->creador == 0 ? 
                                        1: $tutMeeting->estado;

                array_push($hora, intval( $horaI[0]) );
                array_push($fecha, intval($dateDay) );                
                array_push($hora_inicio, $horaI[0] . ':' . $horaI[1]);
                array_push($hora_fin, $horaF[0] . ':' . $horaF[1]);
            }
        } 
        
        $motivos = Reason::where('tipo',1)->get();
        $data       = [
            'tutMeetings' =>  $tutMeetings,
            'fecha'       =>  $fecha,
            'hora'        =>  $hora,
            'hora_inicio' =>  $hora_inicio,
            'hora_fin'    =>  $hora_fin,
            'motivos'     =>  $motivos,
        ];
        
        return view('tutorship.tutormydates.indexStudent', $data);
    }


    public function indexMyDates(Request $request)
    {
        $mayorId    = Session::get('faculty-code');

        $user       = Session::get('user');
        $id_docente = Session::get('user')->IdDocente;

        $dateOriginalFormat = $request['beginDate'];            
        if ( $dateOriginalFormat ) {
            $beginDate = date("Y-m-d", strtotime($dateOriginalFormat));
        }
        else {
            $beginDate = "";        
        }
        
        $dateOriginalFormat = $request['endDate'];            
        if ( $dateOriginalFormat ) {
            $endDate = date("Y-m-d", strtotime($dateOriginalFormat. '+1 day'));        
        }
        else {
            $endDate = "";
        }

        if ($beginDate == '') {
            $beginDate = date("Y-m-d");   
        }

        $day = date('w', strtotime($beginDate));
        $endDate = date('Y-m-d', strtotime($beginDate .'+'.(6-$day).' days'));

        $filters    = [
            "code"           => $request->input('code'),
            "name"           => $request->input('name'),
            "lastName"       => $request->input('lastName'),
            "secondLastName" => $request->input('secondLastName'),
            "beginDate"      => $beginDate,
            "endDate"        => $endDate,
            "state"          => $request->input('state'),
            "id_docente"     => $id_docente,
        ];

        $tutMeetings    = TutMeeting::getFilteredTutMeetings($filters);
        $fecha          = array();
        $hora_inicio    = array();        
        $hora           = array();        
        $hora_fin       = array();
        $students       = array();     

        foreach ($tutMeetings as $tutMeeting) {
            if ($tutMeeting) {
                $string    = explode(' ', $tutMeeting->inicio);
                $dia       = explode('-', $string[0]);
                $horaI     = explode(':', $string[1]);        
                $today     = date('Y-m-d H:i:s', strtotime($tutMeeting->inicio)); 
                $fecha_fin = date('Y-m-d H:i:s', strtotime($today . '+' . $tutMeeting->duracion . ' minutes'));                                
                $stringF   = explode(' ', $fecha_fin);                
                $horaF     = explode(':', $stringF[1]);        
                $dateDay   = date('w', strtotime($tutMeeting->inicio));

                $student   = Tutstudent::where('id', $tutMeeting->id_tutstudent)->first();

                $tutMeeting->estado = $tutMeeting->estado == 4 && 
                                        $tutMeeting->creador == 1 ? 
                                        1: $tutMeeting->estado;

                array_push($hora, intval( $horaI[0]) );
                array_push($fecha, intval($dateDay) );                
                array_push($hora_inicio, $horaI[0] . ':' . $horaI[1]);
                array_push($hora_fin, $horaF[0] . ':' . $horaF[1]);
                array_push($students, $student->ape_paterno . ' ' . 
                                        $student->ape_materno . ', ' . 
                                        $student->nombre);
            }
        } 

        $schedule = TutSchedule::getMatrixSchedule($id_docente);

        $parameters = Parameter::where('id_especialidad', $mayorId)->first();
        $today      = date('d-m-Y'); 
        $startDay   = date('d-m-Y', strtotime($parameters->start_date));
        $endDay     = date('d-m-Y', strtotime($today . '+' . $parameters->number_days . ' day'));

        $currentDay = date("d-m-Y", strtotime($beginDate));

        $data       = [
            'tutMeetings' =>  $tutMeetings,
            'fecha'       =>  $fecha,
            'hora'        =>  $hora,
            'hora_inicio' =>  $hora_inicio,
            'hora_fin'    =>  $hora_fin,
            'students'    =>  $students,
            'schedule'    =>  $schedule,
            'startDay'    =>  $startDay,
            'currentDay'  =>  $currentDay,
            'endDay'      =>  $endDay,
        ];
        
        return view('tutorship.tutormydates.index', $data);
    }

    public function indexMyDatesTable(Request $request)
    {
        $mayorId    = Session::get('faculty-code');

        $user       = Session::get('user');
        $id_docente = Session::get('user')->IdDocente;

        $dateOriginalFormat = $request['beginDate'];            
        if ( $dateOriginalFormat ) {
            $beginDate = date("Y-m-d", strtotime($dateOriginalFormat));
        }
        else {
            $beginDate = "";        
        }
        
        $dateOriginalFormat = $request['endDate'];            
        if ( $dateOriginalFormat ) {
            $endDate = date("Y-m-d", strtotime($dateOriginalFormat. '+1 day'));        
        }
        else {
            $endDate = "";
        }

        $filters    = [
            "code"           => $request->input('code'),
            "name"           => $request->input('name'),
            "lastName"       => $request->input('lastName'),
            "secondLastName" => $request->input('secondLastName'),
            "beginDate"      => $beginDate,
            "endDate"        => $endDate,
            "state"          => $request->input('state'),
            "id_docente"     => $id_docente,
        ];

        $tutMeetings    = TutMeeting::getFilteredTutMeetingsTable($filters);
        $fecha          = array();
        $hora_inicio    = array();      
        $hora_fin       = array();

        foreach ($tutMeetings as $tutMeeting) {
            if ($tutMeeting) {
                $string    = explode(' ', $tutMeeting->inicio);
                $dia       = explode('-', $string[0]);
                $horaI     = explode(':', $string[1]);        
                $today     = date('Y-m-d H:i:s', strtotime($tutMeeting->inicio)); 
                $fecha_fin = date('Y-m-d H:i:s', strtotime($today . '+' . $tutMeeting->duracion . ' minutes'));                                
                $stringF   = explode(' ', $fecha_fin);                
                $horaF     = explode(':', $stringF[1]);        
                $dateDay   = date('d-m-Y', strtotime($tutMeeting->inicio));

                $tutMeeting->estado = $tutMeeting->estado == 4 && 
                                        $tutMeeting->creador == 1 ? 
                                        1: $tutMeeting->estado;

                array_push($fecha, $dateDay);                
                array_push($hora_inicio, $horaI[0] . ':' . $horaI[1]);
                array_push($hora_fin, $horaF[0] . ':' . $horaF[1]);
            }
        }

        $status = array();

        array_push($status, '');
        array_push($status, 'Pendiente');
        array_push($status, 'Confirmada');
        array_push($status, 'Cancelada');
        array_push($status, 'Sugerida');
        array_push($status, 'Rechazada');
        array_push($status, 'Asistida');
        array_push($status, 'No asistida');

        $reasons = Reason::all();

        $data       = [
            'tutMeetings' =>  $tutMeetings,
            'fecha'       =>  $fecha,
            'hora_inicio' =>  $hora_inicio,
            'hora_fin'    =>  $hora_fin,
            'status'      =>  $status,
            'reasons'     =>  $reasons,
        ];
        return view('tutorship.tutormydates.indextable', $data);
    }

    public function createDate($id)
    {
        $mayorId    = Session::get('faculty-code');

        $user       = Session::get('user');

        $student    = Tutstudent::find($id);

        $topics     =Topic::get();

        $parameters = Parameter::where('id_especialidad', $mayorId)->first();

        if($parameters){

            $today      = date('d-m-Y'); 
            $endDate    = date('d-m-Y', strtotime($today . '+' . $parameters->number_days . ' day'));

            if(Auth::user()->IdPerfil == 0){
                $iddocente  = $user->tutorship->id_tutor;
                $queryDays  = Tutschedule::getDays($iddocente);    
            }else{
                $queryDays  = Tutschedule::getDays($user->IdDocente);    
            }
            
            $stringDisabledDays 
                        = TutMeeting::getStringDisableDays($queryDays);

            $data = [
                'student'       => $student,
                'topics'        => $topics,
                'endDate'       => $endDate,
                'disabledDays'  => $stringDisabledDays,
            ];

            return view('tutorship.tutormydates.create', $data);
        }else{
            return redirect()->back()->with('warning', 'No hay ningun parametro definido');
        }
    }

    public function showSchedule(Request $request)
    {
        $mayorId        = Session::get('faculty-code');

        $user           = Session::get('user');

        $parameters     = Parameter::where('id_especialidad', $mayorId)->first();

        $date           = $request['date'];

        if(Auth::user()->IdPerfil == 0){
            $iddocente  = $user->tutorship->id_tutor;
            $schedule       = Tutschedule::getSchedule($iddocente, $date, $parameters);
        }else{
            $schedule       = Tutschedule::getSchedule($user->IdDocente, $date, $parameters);
        }

        $htmlOptions    = Tutschedule::getHtmlSchedule($schedule);

        return response()->json(['html' => $htmlOptions]);
    }

    public function storeDate(DateTutorRequest $request)
    {
        try {

            $mayorId            = Session::get('faculty-code');
            
            $parameters         = Parameter::where('id_especialidad', $mayorId)->first();

            $user               = Session::get('user');

            $idStudent          = $request['id'];

            $student            = Tutstudent::where('id', $idStudent)->first();

            $topic              = $request['topicId'];

            $startHourSec       = intval($request['hourId']);

            $startHourString    = gmdate("H:i:s", $startHourSec);

            $dateOriginalFormat = $request['dayDate'];
            
            $newDate            = date("Y-m-d", strtotime($dateOriginalFormat));

            $completedDate      = $newDate . ' ' . $startHourString;

            $meeting            = TutMeeting::where('inicio', $completedDate)->first();

            if (!$meeting) {

                if(Auth::user()->IdPerfil == 0){
                    $iddocente  = $user->tutorship->id_tutor;
                    $newMeeting     = TutMeeting::create([
                        "inicio"        => $completedDate,
                        "duracion"      => $parameters->duracionCita,
                        "no_programada" => 0,
                        "estado"        => 4,
                        "id_topic"      => $topic,
                        "id_docente"    => $iddocente,
                        "id_tutstudent" => $idStudent,
                        "creador"       => 0,
                    ]);
                }else{
                    $teacher = Teacher::where('IdDocente', $user->IdDocente)->first();
                    $newMeeting     = TutMeeting::create([
                        "inicio"        => $completedDate,
                        "duracion"      => $parameters->duracionCita,
                        "no_programada" => 0,
                        "lugar"         => $teacher->oficina,
                        "creador"       => 1,
                        "estado"        => 4,
                        "id_topic"      => $topic,
                        "id_tutstudent" => $idStudent,
                        "id_docente"    => $user->IdDocente,
                    ]);
                }

                try {
                    $nombre     = $student->nombre . ' ' . $student->ape_paterno . ' ' . $student->ape_materno;
                    
                    $hour       = gmdate("H:i", $startHourSec);
                    
                    $date       = $dateOriginalFormat;
                    
                    $duration   = $parameters->duracionCita;
                    
                    $mail       = $student->correo;

                    $data       = [
                        'nombre'    => $nombre,
                        'hour'      => $hour,
                        'date'      => $date,
                        'duration'  => $duration,
                    ];
                    
                    Mail::send('emails.newDateTutor', $data, function($m) use($mail) {
                        $m->subject('[TUTORÍA] Invitación a cita');
                        $m->to($mail);
                    });
                } catch (Exception $e) {
                    return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
                }
                if(Auth::user()->IdPerfil == 0)
                {
                    return redirect()->route('miscitas.index')->with('success', 'La cita se ha registrado exitosamente');
                } else {
                    return redirect()->route('cita_alumno.index')->with('success', 'La cita se ha registrado exitosamente');
                }
            }
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }

    }

    public function attendMeeting($id)
    {
        $meeting = TutMeeting::find($id);
        $data = [
            'meeting' => $meeting,
        ];
        return view('tutorship.tutormydates.attend-meeting', $data);
    }

    public function storeMeeting(Request $request)
    {
        try {
            $meeting = TutMeeting::find($request['code']);

            $startHour = $request['startHour'];

            $nowFormat = date('Y-m-d H:i:s');
            $nowSec = strtotime($nowFormat);
            $startSec = strtotime($startHour);
            $seconds = $nowSec - $startSec;
            $startFormat = date('Y-m-d H:i:s', $startSec);
           
            $duration = number_format($seconds/60, 0);

            $meeting->inicio = $startFormat;
            $meeting->fin = $nowFormat;
            $meeting->duracion = $duration;
            $meeting->observacion = $request['observations'];
            $meeting->estado = 6;

            $meeting->save();

            return redirect()->route('cita_alumno.index_table')->with('success', 'La reunión se ha registrado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    public function createAttention()
    {
        $topics     = Topic::get();
        $data = [
            'topics' => $topics,
        ];
        return view('tutorship.tutormydates.attend-date', $data);
    }

    public function storeAttention(AttentionRequest $request)
    {
        try {
            $user = Session::get('user');

            $tutor = Teacher::where('IdDocente', $user->IdDocente)->first();

            $startHour = $request['startHour'];
            $topicId = $request['tema'];

            $nowFormat = date('Y-m-d H:i:s');
            $nowSec = strtotime($nowFormat);
            $startSec = strtotime($startHour);
            $seconds = $nowSec - $startSec;
            $startFormat = date('Y-m-d H:i:s', $startSec);
           
            $duration = number_format($seconds/60, 0);

            $newMeeting = TutMeeting::create([
                    "inicio"        => $startFormat,
                    "fin"           => $nowFormat,
                    "duracion"      => $duration,
                    "no_programada" => 1,
                    "observacion"   => $request['observations'],
                    "lugar"         => $tutor->oficina,
                    "creador"       => 0,
                    "estado"        => 6,
                    "id_topic"      => $request['tema'],
                    "id_tutstudent" => $request['alumno'],
                    "id_docente"    => $tutor->IdDocente,
                ]);

            return redirect()->route('cita_alumno.index_table')->with('success', 'La reunión se ha registrado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    public function acceptDateTutor(Request $request)
    {
        try {
            $meeting = TutMeeting::find($request['id']);
            $meeting->estado = Config::get('constants.confirmada');
            $meeting->save();

            $student = Tutstudent::where('id', $meeting->id_tutstudent)->first();

            $nombre     = $student->nombre . ' ' . $student->ape_paterno . ' ' . $student->ape_materno;
                        
            $hour       = date("H:i", strtotime($meeting->inicio));
            
            $date       = date("d-m-Y", strtotime($meeting->inicio));
            
            $duration   = $meeting->duracion;
            
            $mail       = $student->correo;

            $data   = [
                'nombre'    => $nombre,
                'hour'      => $hour,
                'date'      => $date,
                'duration'  => $duration,
            ];

            try {            
                Mail::send('emails.acceptDateTutor', $data, function($m) use($mail) {
                    $m->subject('[TUTORÍA] Cita aceptada');
                    $m->to($mail);
                });
            } catch (Exception $e) {
                return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
            }

            return redirect()->back()->with('success', 'Se confirmó esta cita');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    public function deleteDateTutor(DeleteMeetingRequest $request)
    {
        try {
            $meeting = TutMeeting::find($request['id']);

            if ($request['estado'] == Config::get('constants.sugerida') &&
                $meeting->creador == 0) {
                $meeting->estado = Config::get('constants.rechazada');
                $message = 'Se rechazó cita';
                $sentence = 'Se le informa que su tutor ha rechazado su solicitud de cita:';
            } else {
                $meeting->estado = Config::get('constants.cancelada');
                $message = 'Se canceló cita';
                $sentence = 'Se le informa que su tutor ha cancelado su cita programada:';
            }

            $meeting->id_reason = $request['motivo'];
            $meeting->adicional = $request['observations'];
            $meeting->save();

            $student    = Tutstudent::where('id', $meeting->id_tutstudent)->first();
            $nombre     = $student->nombre . ' ' . $student->ape_paterno . ' ' . $student->ape_materno;
                        
            $hour       = date("H:i", strtotime($meeting->inicio));
            
            $date       = date("d-m-Y", strtotime($meeting->inicio));
                        
            $mail       = $student->correo;

            $data   = [
                'nombre'    => $nombre,
                'hour'      => $hour,
                'date'      => $date,
                'meeting'   => $meeting,
                'sentence'  => $sentence,
            ];

            try {            
                Mail::send('emails.deleteDateTutor', $data, function($m) use($mail) {
                    $m->subject('[TUTORÍA] Cita cancelada/rechazada');
                    $m->to($mail);
                });
            } catch (Exception $e) {
                return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
            }

            return redirect()->back()->with('success', $message);
            
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    public function acceptDate($id)
    {
        $meeting = TutMeeting::find($id);
        $meeting->estado = Config::get('constants.confirmada');
        $meeting->save();

        //Enviar correo a alumno

        return redirect()->back()->with('success', 'Se confirmo esta cita');
    }

    public function refuseDate($id)
    {
        $meeting = TutMeeting::find($id);
        $meeting->estado = Config::get('constants.rechazada');
        $meeting->save();

        //Enviar correo a alumno

        return redirect()->back()->with('success', 'Se rechazó esta cita');
    }

    public function deleteDate($id)
    {
        $meeting = TutMeeting::find($id);
        $meeting->estado = Config::get('constants.cancelada');
        $meeting->save();

        //Enviar correo a alumno

        return redirect()->back()->with('success', 'Se canceló esta cita');
    }

}
