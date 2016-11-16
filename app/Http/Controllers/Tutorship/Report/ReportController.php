<?php

namespace Intranet\Http\Controllers\Tutorship\Report;


use Auth;
use Mail;
use Illuminate\Support\Facades\Session;
use Intranet\Http\Services\User\PasswordService;
use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Models\Tutorship;
use Intranet\Models\Tutstudent;
use Intranet\Models\TutMeeting;
use Intranet\Http\Requests;




class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function meetingReport()
    {
        
        $teacher = null;
        $data = [
            'teacher'    =>  $teacher,
        ];
        return view('tutorship.report.meeting', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reassingReport()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    public function tutstudentDateReport(Request $request)
    {

        $mayorId    = Session::get('faculty-code');

        $user       = Session::get('user');
        

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
            "beginDate"      => $beginDate,
            "endDate"        => $endDate,            
        ];

        $tutMeetings = TutMeeting::getTutMeetingsByDates($filters);        
        $tutMeetingsByTutstudents = TutMeeting::getTutMeetingsByDatesByTutstudents($filters);        
        /*
        Para los estados de citas:
            Pendiente   => 1
            Confirmada  => 2
            Cancelada   => 3
            Sugerida    => 4
            Rechazada   => 5
            Asistida    => 6
            No asistida => 7
        */
        $pendientes   = $tutMeetings->where('estado', 1)->count();
        $confirmadas  = $tutMeetings->where('estado', 2)->count();
        $canceladas   = $tutMeetings->where('estado', 3)->count();
        $sugeridas    = $tutMeetings->where('estado', 4)->count();
        $rechazadas   = $tutMeetings->where('estado', 5)->count();
        $asistidas    = $tutMeetings->where('estado', 6)->count();
        $no_asistidas = $tutMeetings->where('estado', 7)->count();
        $citas        = $pendientes + $confirmadas + $canceladas + $sugeridas + $rechazadas + $asistidas + $no_asistidas;
        

        $data       = [
            'tutMeetings'  => $tutMeetingsByTutstudents,  
            'pendientes'   => $pendientes,
            'confirmadas'  => $confirmadas,
            'canceladas'   => $canceladas,
            'sugeridas'    => $sugeridas,
            'rechazadas'   => $rechazadas,
            'asistidas'    => $asistidas,
            'no_asistidas' => $no_asistidas,
            'citas'        => $citas,
        ];
        

        return view('tutorship.report.tutstudentDate', $data);
    }
}
