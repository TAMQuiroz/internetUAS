<?php

namespace Intranet\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class TutMeeting extends Model
{    
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


    static public function getNumberDay($dateString) 
    {
        $timestamp  = strtotime($dateString);
        $day        = date('w', $timestamp);
        return $day;
    }

    static public function getStringDisableDays($daysCollection)
    {    
        $listDays           = [];   
        
        foreach($daysCollection as $day) {

            array_push($listDays, $day->dia);

        }

        $diffDays           = array_diff(array(1,2,3,4,5,6), $listDays);

        $stringDiffDays     = '0';

        foreach ($diffDays as $value) {

            $stringDiffDays = $stringDiffDays . ',' . $value;

        }

        return $stringDiffDays;
    }
}
