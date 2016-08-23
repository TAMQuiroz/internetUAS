<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suggestion extends Model {
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'Sugerencia';
    protected $primaryKey = 'IdSugerencia';
    protected $fillable = ['Titulo', 'Descripcion', 'IdDocente', 'IdPlanMejora', 'IdEspecialidad'];

    public function teacher(){
        return $this->belongsTo('Intranet\Models\Teacher', 'IdDocente');
    }

    public function improvementPlan(){
        return $this->belongsTo('Intranet\Models\ImprovementPlan', 'IdPlanMejora');
    }

    public function faculty(){
        return $this->belongsTo('Intranet\Models\Faculty', 'IdEspecialidad');
    }
}