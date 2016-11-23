<?php

namespace Intranet\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class TutMeeting extends Model {

    protected $table = 'tutmeetings';
    protected $primaryKey = 'id';
    protected $fillable = ['inicio',
        'fin',
        'duracion',
        'no_programada',
        'observacion',
        'lugar',
        'adicional',
        'creador',
        'estado',
        'id_topic',
        'id_reason',
        'id_tutstudent',
        'id_docente'];

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

    static public function getNumberDay($dateString) {
        $timestamp = strtotime($dateString);
        $day = date('w', $timestamp);
        return $day;
    }

    static public function getStringDisableDays($daysCollection) {
        $listDays = [];

        foreach ($daysCollection as $day) {
            array_push($listDays, $day->dia);
        }
        $diffDays = array_diff(array(1, 2, 3, 4, 5, 6), $listDays);
        $stringDiffDays = '0';
        foreach ($diffDays as $value) {
            $stringDiffDays = $stringDiffDays . ',' . $value;
        }
        return $stringDiffDays;
    }

    static public function getFilteredTutMeetings($filters) {
        $query = Tutstudent::query();
        $queryTutMeeting = TutMeeting::query();
        $stateFalse = 100;
        if ($filters["code"] != "") {
            $query = $query->where("codigo", $filters["code"]);
        }
        if ($filters["name"] != "") {
            $query = $query->where("nombre", "like", "%" . $filters["name"] . "%");
        }
        if ($filters["lastName"] != "") {
            $query = $query->where("ape_paterno", "like", "%" . $filters["lastName"] . "%");
        }
        if ($filters["secondLastName"] != "") {
            $query = $query->where("ape_materno", "like", "%" . $filters["secondLastName"] . "%");
        }

        $students = $query->get();
        if ($query->first()) {
            if ($filters["state"] != "") {
                $queryTutMeeting = $queryTutMeeting->where("estado", $filters["state"]);
            }
            if ($filters["id_docente"] != "") {
                $queryTutMeeting = $queryTutMeeting->where("id_docente", $filters["id_docente"]);
            }
            if ($filters["beginDate"] != "" && $filters["endDate"] != "") {
                $queryTutMeeting = $queryTutMeeting->whereBetween("inicio", array($filters["beginDate"], $filters["endDate"]));
            }
        } else {
            //Como no encontró alumno luego de buscar, no debe regresar ninguna cita. Buscamos una cita que devuelva null
            $queryTutMeeting = $queryTutMeeting->where("estado", $stateFalse);
            return $queryTutMeeting->get();
        }

        $id_list = array();
        foreach ($students as $student) {
            if ($student) {
                array_push($id_list, $student->id);
            }
        }


        $queryTutMeeting = $queryTutMeeting->whereIn("id_tutstudent", $id_list);


        return $queryTutMeeting->orderBy("inicio", 'asc')->get();
    }

    static public function getFilteredTutMeetingsByStudent($filters) {
        $query = Tutstudent::query();
        $queryTutMeeting = TutMeeting::query();
        $stateFalse = 100;
        
        $queryTutMeeting->where('id_tutstudent', $filters["id_tutstudent"]);        

        if (!empty($queryTutMeeting)) {
            if ($filters["state"] != "") {
                $queryTutMeeting = $queryTutMeeting->where("estado", $filters["state"]);
            }            
            if ($filters["beginDate"] != "" && $filters["endDate"] != "") {
                $queryTutMeeting = $queryTutMeeting->whereBetween("inicio", array($filters["beginDate"], $filters["endDate"]));
            }
        }         
        return $queryTutMeeting->orderBy("inicio", 'asc')->get();
    }


    static public function getTutMeetingsByDates($filters) {
        $query = Tutstudent::query();
        $queryTutMeeting = TutMeeting::query();

        if ($filters["beginDate"] != "" && $filters["endDate"] != "") {
            $queryTutMeeting = $queryTutMeeting->whereBetween("inicio", array($filters["beginDate"], $filters["endDate"]));
        }
        $queryTutMeeting->where('no_programada', '=', null);
        //               ->groupBy('estado')
        //                ->groupBy('id_tutstudent');
        return $queryTutMeeting->orderBy("id_tutstudent", 'asc');
    }

    static public function getTutMeetingsByTopicAttended($filters) {
        $queryTutMeeting = TutMeeting::query();

        if ($filters["beginDate"] != "" && $filters["endDate"] != "") {
            $queryTutMeeting = $queryTutMeeting->whereBetween("inicio", array($filters["beginDate"], $filters["endDate"]));
        }

        $queryTutMeeting->where('estado', '=', 6)->groupBy('id_topic');

        return $queryTutMeeting->orderBy("id_topic", 'asc');
    }

    static public function getCancelledTutMeetings($filters) {
        $query = Tutstudent::query();
        $queryTutMeeting = TutMeeting::query();

        if ($filters["beginDate"] != "" && $filters["endDate"] != "") {
            $queryTutMeeting = $queryTutMeeting->whereBetween("inicio", array($filters["beginDate"], $filters["endDate"]));
        }
        $queryTutMeeting->where('no_programada', '=', null)
                ->where('estado', '=', 3)
                ->groupBy('id_reason');
        //                ->groupBy('id_tutstudent');
        /*
          $pendientes_raw   = DB::raw('count(estado) as pendientes');
          $confirmadas_raw  = DB::raw('count(estado) as confirmadas');
          $canceladas_raw   = DB::raw('count(estado) as canceladas');
          $sugeridas_raw    = DB::raw('count(estado) as sugeridas');
          $rechazadas_raw   = DB::raw('count(estado) as rechazadas');
          $asistidas_raw    = DB::raw('count(estado) as asistidas');
          $noasisitidas_raw = DB::raw('count(estado) as noasistidas');
          $citas_raw        = DB::raw('count(estado) as citas');
          $queryTutMeeting->select('estado', $pendientes_raw)
          ->groupBy('id_tutstudent');
         */
        return $queryTutMeeting->orderBy("id_reason", 'asc')->get();
    }

    public function tutstudent() {
        return $this->belongsTo('Intranet\Models\Tutstudent', 'id_tutstudent'); //bien
    }

    public function reason() {
        return $this->belongsTo('Intranet\Models\Reason', 'id_reason');
    }

    public function topic() {
        return $this->belongsTo('Intranet\Models\Topic', 'id_topic');
    }

    public function teacher() {
        return $this->belongsTo('Intranet\Models\Teacher', 'id_docente');
    }

}
