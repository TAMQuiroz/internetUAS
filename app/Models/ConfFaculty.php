<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfFaculty extends Model {
    use SoftDeletes;

	protected $table = 'ConfEspecialidad';
	protected $primaryKey = 'IdConfEspecialidad';
	protected $fillable = ['UmbralAceptacion','NivelEsperado','CantNivelCriterio','IdEspecialidad','IdPeriodo','IdCicloInicio','IdCicloFin'];

    public function faculty()
    {
        return $this->belongsTo('Intranet\Models\Faculty', 'IdEspecialidad');
    }

    public function period()
    {
        return $this->belongsTo('Intranet\Models\Period', 'IdPeriodo');
    }

    public function professor(){
        return $this->belongsTo('Intranet\Models\Teacher', 'IdDocente');
    }

    public function cycleAcademicEnd()
    {
        return $this->belongsTo('Intranet\Models\AcademicCycle', 'IdCicloFin');
    }

    public function cycleAcademicStart()
    {
        return $this->belongsTo('Intranet\Models\AcademicCycle', 'IdCicloInicio');
    }
}


