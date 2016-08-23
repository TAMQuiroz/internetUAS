<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cicle extends Model
{
    use SoftDeletes;

    protected $table = 'CicloxEspecialidad';
    protected $primaryKey = 'IdCicloAcademico';
    protected $fillable = ['IdEspecialidad','IdDocente','IdPeriodo','Numero','Descripcion','Vigente','FechaInicio','FechaFin','IdCiclo'];

    public function faculty(){
        return $this->belongsTo('Intranet\Models\Faculty', 'IdEspecialidad');
    }

    public function teacher(){
        return $this->belongsTo('Intranet\Models\Teacher', 'IdDocente');
    }

    public function period(){
        return $this->belongsTo('Intranet\Models\Period', 'IdPeriodo');
    }

    public function academicCycle(){
        return $this->belongsTo('Intranet\Models\AcademicCycle', 'IdCiclo');
    }
}
