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
                            'id_tutstudent0',
                            'id_docente'];
    
    
}
