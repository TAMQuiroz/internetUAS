<?php

namespace Intranet\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//<-------------------------------necesario para softdeletes

class TutSchedule extends Model
{
    use SoftDeletes;//delete logico
    protected $table = 'tutschedules';
    protected $primaryKey = 'id';
    protected $fillable = ['dia',
                            'hora_inicio',
                            'hora_fin',
                            'id_docente'];
    
    public function teacher(){
        return $this->belongsTo('Intranet\Models\Teacher', 'IdDocente');
    }
    
    static public function getDays($idDocente)
    {
        $query  = TutSchedule::
                        select(array('dia'))
                        ->where('id_docente', $idDocente)
                        ->groupBy('dia')
                        ->get();
        return $query;
    }

    static public function getSchedule($idDocente, 
                                        $date, 
                                        $parameters)
    {
        $durationMinutes    = $parameters->duracionCita;

        $durationSeconds    = $durationMinutes * 60;

        $day            = TutMeeting::getNumberDay($date);

        $hours          = TutSchedule::
                                select(array('hora_inicio', 'hora_fin'))
                                ->where('id_docente', $idDocente)
                                ->where('dia', $day)
                                ->get();

        $schedule       = [];

        $allHours       = [];

        foreach ($hours as $hour) {

            $startSec   = strtotime($hour->hora_inicio) - strtotime('TODAY');
            $endSec     = strtotime($hour->hora_fin)    - strtotime('TODAY');

            for ($i = $startSec; $i < $endSec; $i += $durationSeconds) {
                array_push($allHours, $i);
            }
        }

        $formatDate     = date("Y-m-d", strtotime($date)) ;
        $ih             = $formatDate . ' ' . '00:00:00';
        $fh             = $formatDate . ' ' . '23:00:00';

        $queryBusyHours = TutMeeting::where('inicio', '>', $ih)
                                    ->where('inicio', '<', $fh)
                                    ->where('id_docente', $idDocente)
                                    ->get();

        $busyHours      = [];

        foreach ($queryBusyHours as $queryBusyHour) {

            $iniHour    = date('H:i:s', strtotime($queryBusyHour->inicio));
            $iniSec     = strtotime($iniHour) - strtotime('TODAY');

            array_push($busyHours, $iniSec);
        }
        
        $freeHours      = array_diff($allHours, $busyHours);

        foreach ($freeHours as $freeHour) {

            $startHour  = gmdate("H:i", $freeHour);
            $endHour    = gmdate("H:i", $freeHour + $durationSeconds);
            $element    = [
                'id'    => $freeHour,
                'value' => $startHour . ' - ' . $endHour
            ];

            array_push($schedule, $element);
        }

        return $schedule;

    }

    static public function getHtmlSchedule($schedule)
    {
        $html       = '<option value>Seleccione Horario</option>';

        $options    = '';

        foreach ($schedule as $hour) {
            $options = $options . '<option value=' . $hour['id'] . '>' . $hour['value'] . '</option>';
        }

        $html       = $html . $options;

        return $html;
    }

    static public function getMatrixSchedule($idDocente)
    {
        $scheduleQuery  = TutSchedule::
                        where('id_docente', $idDocente)
                        ->get();
        
        $schedule = array();

        for ($i=0; $i < 22; $i++) { 
            array_push($schedule, array(0,0,0,0,0,0,0));
        }

        foreach ($scheduleQuery as $sched) {
            $h  = intval(date("H", strtotime($sched->hora_inicio)));
            $d  = $sched->dia;
            $schedule[$h][$d] = 1;
        }

        return $schedule;

    }
}
