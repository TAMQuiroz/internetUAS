<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Score extends Model
{
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'Calificacion';
    protected $primaryKey = 'IdCalificacion';
    protected $fillable = ['IdHorario','IdCriterio','IdAlumno','Nota'];

    public function timeTable(){
        return $this->belongsTo('Intranet\Models\TimeTable', 'IdHorario');
    }

    public function criterion(){
        return $this->belongsTo('Intranet\Models\Criterion', 'IdCriterio');
    }

    public function student(){
        return $this->hasMany('Intranet\Models\Student', 'IdAlumno');
    }
    
}