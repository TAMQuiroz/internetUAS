<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActionPlan extends Model {
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'PlanAccion';
    protected $primaryKey = 'IdPlanAccion';
    protected $fillable = ['IdPlanMejora', 'IdCicloAcademico', 'IdDocente', 'Descripcion', 'IdEspecialidad', 'Comentario', 'Porcentaje'];

    public function faculty(){
        return $this->belongsTo('Intranet\Models\Faculty', 'IdEspecialidad');
    }

    public function improvementPlan(){
        return $this->belongsTo('Intranet\Models\ImprovementPlan', 'IdPlanMejora');
    }

    public function teacher(){
        return $this->belongsTo('Intranet\Models\Teacher', 'IdDocente');
    }

    public function cicle(){
        return $this->belongsTo('Intranet\Models\AcademicCycle', 'IdCicloAcademico');
    }
}