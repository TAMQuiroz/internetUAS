<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tracing extends Model {
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'Seguimiento';
    protected $primaryKey = 'IdSeguimiento';
    protected $fillable = ['Descripcion', 'IdCicloAcademico', 'IdDocente', 'IdPlanMejora'];

    public function teacher(){
        return $this->belongsTo('Intranet\Models\Teacher', 'IdDocente');
    }

    public function cicle(){
        return $this->belongsTo('Intranet\Models\Cicle', 'IdCicloAcademico');
    }

    public function planMejora(){
        return $this->belongsTo('Intranet\Models\ImprovementPlan', 'IdPlanMejora');
    }
}