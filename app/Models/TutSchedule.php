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
    
}
