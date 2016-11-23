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
use Intranet\Models\Reason;
use Intranet\Models\Topic;
use Intranet\Http\Requests;

class ReportController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function meetingReport(Request $request) {
        $teacher = null;
        $data = [
            'teacher' => $teacher,
        ];
        return view('tutorship.report.meeting', $data);
    }

    public function reassignReport(Request $request) {
        $data = [
            'null' => null,            
        ];
        return view('tutorship.report.reassign', $data);
    }

    public function tutorReport(Request $request) {
        
        $data = [
            'null' => null,            
        ];
        return view('tutorship.report.tutor', $data);
    }
    
    public function topicReport(Request $request) {
        $dateOriginalFormat = $request['beginDate'];
        if ($dateOriginalFormat) {
            $beginDate = date("Y-m-d", strtotime($dateOriginalFormat));
        } else {
            $beginDate = "";
        }

        $dateOriginalFormat = $request['endDate'];
        if ($dateOriginalFormat) {
            $endDate = date("Y-m-d", strtotime($dateOriginalFormat . '+1 day'));
        } else {
            $endDate = "";
        }

        $filters = [
            "beginDate" => $beginDate,
            "endDate" => $endDate,
        ];

        $tutMeetings = TutMeeting::getTutMeetingsByDates($filters)->get();
        $topicTutMeetings = TutMeeting::getTutMeetingsByTopicAttended($filters)->get();
        $topics = Topic::get();

        $topics_amount_list = array();
        $topics_name_list = array();
        $topics_percentage_list = array();
        $topicTotalAsistidas = 0;
        foreach ($topics as $t) {
            if ($t) {
                $tAux = $tutMeetings->where('id_topic', $t->id)->where('estado',6)->count();
                if ($tAux > 0) {
                    $topicTotalAsistidas += $tAux;
                    array_push($topics_name_list, $t->nombre);
                    array_push($topics_amount_list, $tAux);
                    array_push($topics_percentage_list, $tAux / $tutMeetings->count() * 100);
                }
            }
        }

        $data = [
            'topicTutMeetings' => $topicTutMeetings,
            'topicTotalAsistidas' => $topicTotalAsistidas,
            'totalCitas' => $tutMeetings->count(),
            'topics_amount_list' => $topics_amount_list,
            'topics_name_list' => $topics_name_list,
            'topics_percentage_list' => $topics_percentage_list,
        ];
        return view('tutorship.report.topic', $data);
    }

    public function tutstudentDateReport(Request $request) {

        $mayorId = Session::get('faculty-code');
        $user = Session::get('user');

        $dateOriginalFormat = $request['beginDate'];
        if ($dateOriginalFormat)
            $beginDate = date("Y-m-d", strtotime($dateOriginalFormat));
        else
            $beginDate = "";
        $dateOriginalFormat = $request['endDate'];
        if ($dateOriginalFormat)
            $endDate = date("Y-m-d", strtotime($dateOriginalFormat . '+1 day'));
        else
            $endDate = "";

        $filters = [
            "beginDate" => $beginDate,
            "endDate" => $endDate,
        ];

        $tutMeetings = TutMeeting::getTutMeetingsByDates($filters)->get();
        $tutMeetingsByTutstudents = TutMeeting::getTutMeetingsByDates($filters)->groupBy('id_tutstudent')->get();

        $pendientes_list = array();
        $confirmadas_list = array();
        $canceladas_list = array();
        $sugeridas_list = array();
        $rechazadas_list = array();
        $asistidas_list = array();
        $no_asistidas_list = array();
        $total_list = array();

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
        foreach ($tutMeetingsByTutstudents as $tutMeetingsByTutstudent) {
            $pendientes = $tutMeetings->where('estado', 1)->where('id_tutstudent', $tutMeetingsByTutstudent->tutstudent->id)->count();
            $confirmadas = $tutMeetings->where('estado', 2)->where('id_tutstudent', $tutMeetingsByTutstudent->tutstudent->id)->count();
            $canceladas = $tutMeetings->where('estado', 3)->where('id_tutstudent', $tutMeetingsByTutstudent->tutstudent->id)->count();
            $sugeridas = $tutMeetings->where('estado', 4)->where('id_tutstudent', $tutMeetingsByTutstudent->tutstudent->id)->count();
            $rechazadas = $tutMeetings->where('estado', 5)->where('id_tutstudent', $tutMeetingsByTutstudent->tutstudent->id)->count();
            $asistidas = $tutMeetings->where('estado', 6)->where('id_tutstudent', $tutMeetingsByTutstudent->tutstudent->id)->count();
            $no_asistidas = $tutMeetings->where('estado', 7)->where('id_tutstudent', $tutMeetingsByTutstudent->tutstudent->id)->count();
            $total = $pendientes + $confirmadas + $canceladas + $sugeridas + $rechazadas + $asistidas + $no_asistidas;
            if ($total > 0) {
                array_push($pendientes_list, $pendientes);
                array_push($confirmadas_list, $confirmadas);
                array_push($canceladas_list, $canceladas);
                array_push($sugeridas_list, $sugeridas);
                array_push($rechazadas_list, $rechazadas);
                array_push($asistidas_list, $asistidas);
                array_push($no_asistidas_list, $no_asistidas);
                array_push($total_list, $total);
            }
        }

        $pendientes = $tutMeetings->where('estado', 1)->count();
        $confirmadas = $tutMeetings->where('estado', 2)->count();
        $canceladas = $tutMeetings->where('estado', 3)->count();
        $sugeridas = $tutMeetings->where('estado', 4)->count();
        $rechazadas = $tutMeetings->where('estado', 5)->count();
        $asistidas = $tutMeetings->where('estado', 6)->count();
        $no_asistidas = $tutMeetings->where('estado', 7)->count();
        $citas = $pendientes + $confirmadas + $canceladas + $sugeridas + $rechazadas + $asistidas + $no_asistidas;

        $data = [
            'tutMeetingsByTutstudents' => $tutMeetingsByTutstudents,
            'tutstudentPendientes' => $pendientes_list,
            'tutstudentConfirmadas' => $confirmadas_list,
            'tutstudentCanceladas' => $canceladas_list,
            'tutstudentSugeridas' => $sugeridas_list,
            'tutstudentRechazadas' => $rechazadas_list,
            'tutstudentAsistidas' => $asistidas_list,
            'tutstudentNoAsistidas' => $no_asistidas_list,
            'tutstudentTotal' => $total_list,
            'pendientes' => $pendientes,
            'confirmadas' => $confirmadas,
            'canceladas' => $canceladas,
            'sugeridas' => $sugeridas,
            'rechazadas' => $rechazadas,
            'asistidas' => $asistidas,
            'no_asistidas' => $no_asistidas,
            'citas' => $citas,
        ];

        return view('tutorship.report.tutstudentDate', $data);
    }

    public function cancelledMeetingReport(Request $request) {

        $mayorId = Session::get('faculty-code');
        $user = Session::get('user');

        $dateOriginalFormat = $request['beginDate'];
        if ($dateOriginalFormat)
            $beginDate = date("Y-m-d", strtotime($dateOriginalFormat));
        else
            $beginDate = "";
        $dateOriginalFormat = $request['endDate'];
        if ($dateOriginalFormat)
            $endDate = date("Y-m-d", strtotime($dateOriginalFormat . '+1 day'));
        else
            $endDate = "";

        $filters = [
            "beginDate" => $beginDate,
            "endDate" => $endDate,
        ];

        $tutMeetings = TutMeeting::getTutMeetingsByDates($filters)->get();
        $cancelledtutMeetings = TutMeeting::getCancelledTutMeetings($filters);
        $reasons = Reason::get();
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
        $pendientes = $tutMeetings->where('estado', 1)->count();
        $confirmadas = $tutMeetings->where('estado', 2)->count();
        $canceladas = $tutMeetings->where('estado', 3)->count();
        $sugeridas = $tutMeetings->where('estado', 4)->count();
        $rechazadas = $tutMeetings->where('estado', 5)->count();
        $asistidas = $tutMeetings->where('estado', 6)->count();
        $no_asistidas = $tutMeetings->where('estado', 7)->count();
        $citas = $pendientes + $confirmadas + $canceladas + $sugeridas + $rechazadas + $asistidas + $no_asistidas;

        $reasons_amount_list = array();
        $reasons_name_list = array();
        $reasons_percentage_list = array();
        $cancelledTotal = 0;
        foreach ($reasons as $reason) {
            if ($reason) {
                $reasonAux = $tutMeetings->where('estado', 3)
                        ->where('id_reason', $reason->id)
                        ->count();
                if ($reasonAux > 0) {
                    $cancelledTotal += $reasonAux;
                    array_push($reasons_name_list, $reason->nombre);
                    array_push($reasons_amount_list, $reasonAux);
                    array_push($reasons_percentage_list, $reasonAux / $citas * 100);
                }
            }
        }

        $data = [
            'cancelledtutMeetings' => $cancelledtutMeetings,
            'pendientes' => $pendientes,
            'confirmadas' => $confirmadas,
            'canceladas' => $canceladas,
            'sugeridas' => $sugeridas,
            'rechazadas' => $rechazadas,
            'asistidas' => $asistidas,
            'no_asistidas' => $no_asistidas,
            'citas' => $citas,
            'reasons_amount_list' => $reasons_amount_list,
            'reasons_name_list' => $reasons_name_list,
            'reasons_percentage_list' => $reasons_percentage_list,
            'cancelledTotal' => $cancelledTotal,
        ];

        return view('tutorship.report.cancelledMeeting', $data);
    }

}
