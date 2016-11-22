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
        $student    = Tutstudent::find($id);

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

            
            foreach ($tutstudentxevaluations as $tutstudentxevaluation) {
                array_push($id_tutstudentxevaluations, $tutstudentxevaluation->id);
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
                    )C
                    LEFT JOIN (

                    SELECT id_evaluation, id_competence, puntaje, puntaje_maximo
                    FROM  `competencextutstudentxevaluations` A
                    LEFT JOIN  `tutstudentxevaluations` B ON A.id_tutev = B.id
                    WHERE id_tutstudent =' . $id .'
                    AND id_evaluation =' . $tutstudentxevaluations[0]->id_evaluation .'
                    )D ON C.id_competence = D.id_competence
                    LEFT JOIN (

                    SELECT id_evaluation, id_competence, puntaje, puntaje_maximo
                    FROM  `competencextutstudentxevaluations` A
                    LEFT JOIN  `tutstudentxevaluations` B ON A.id_tutev = B.id
                    WHERE id_tutstudent =' . $id .'
                    AND id_evaluation =' . $tutstudentxevaluations[1]->id_evaluation .'
                    )E ON C.id_competence = E.id_competence
                    LEFT JOIN (

                    SELECT id_evaluation, id_competence, puntaje, puntaje_maximo
                    FROM  `competencextutstudentxevaluations` A
                    LEFT JOIN  `tutstudentxevaluations` B ON A.id_tutev = B.id
                    WHERE id_tutstudent =' . $id .'
                    AND id_evaluation =' . $tutstudentxevaluations[2]->id_evaluation .'
                    )F ON C.id_competence = F.id_competence
                    LEFT JOIN (

                    SELECT id_evaluation, id_competence, puntaje, puntaje_maximo
                    FROM  `competencextutstudentxevaluations` A
                    LEFT JOIN  `tutstudentxevaluations` B ON A.id_tutev = B.id
                    WHERE id_tutstudent =' . $id .'
                    AND id_evaluation =' . $tutstudentxevaluations[3]->id_evaluation .'
                    )G ON C.id_competence = G.id_competence
                    LEFT JOIN (

                    SELECT id_evaluation, id_competence, puntaje, puntaje_maximo
                    FROM  `competencextutstudentxevaluations` A
                    LEFT JOIN  `tutstudentxevaluations` B ON A.id_tutev = B.id
                    WHERE id_tutstudent =' . $id .'
                    AND id_evaluation =' . $tutstudentxevaluations[4]->id_evaluation .'
                    )H ON C.id_competence = H.id_competence
                    LEFT JOIN (

                    SELECT id_evaluation, id_competence, puntaje, puntaje_maximo
                    FROM  `competencextutstudentxevaluations` A
                    LEFT JOIN  `tutstudentxevaluations` B ON A.id_tutev = B.id
                    WHERE id_tutstudent =' . $id .'
                    AND id_evaluation =' . $tutstudentxevaluations[5]->id_evaluation .' 
                    )I ON C.id_competence = I.id_competence) Aux'), function($join)
                {
                    $join->on('competences.id', '=', 'Aux.id_competence');
                })->get();  
        } else{
            $competenceResults = array();            
        }         
        
        //end the beast            
        $data       = [
            'student'                => $student, 
            'competenceResults'      => $competenceResults, 
            'tutstudentxevaluations' => $tutstudentxevaluations,            
        ];


        return view('tutorship.tutormystudents.show', $data);
    }

    public function indexMyDates(Request $request)
    {
        $mayorId    = Session::get('faculty-code');

        $user       = Session::get('user');
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
            "code"           => $request->input('code'),
            "name"           => $request->input('name'),
            "lastName"       => $request->input('lastName'),
            "secondLastName" => $request->input('secondLastName'),
            "beginDate"      => $beginDate,
            "endDate"        => $endDate,
            "state"          => $request->input('state'),
            "id_docente"     => $id_docente,
        ];

        $tutMeetings = TutMeeting::getFilteredTutMeetings($filters);
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
        

        return view('tutorship.tutormydates.index', $data);
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
                        "estado"        => 1,
                        "id_topic"      => $topic,
                        "id_docente"    => $iddocente,
                        "id_tutstudent" => $idStudent
                    ]);
                }else{
                    $newMeeting     = TutMeeting::create([
                        "inicio"        => $completedDate,
                        "duracion"      => $parameters->duracionCita,
                        "estado"        => 1,
                        "id_topic"      => $topic,
                        "id_docente"    => $user->IdDocente,
                        "id_tutstudent" => $idStudent
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

                return redirect()->route('cita_alumno.index')->with('success', 'La cita se ha registrado exitosamente');
            }
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
