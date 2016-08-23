<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeImprovementPlan extends Model {
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'TipoPlanMejora';
    protected $primaryKey = 'IdTipoPlanMejora';
    protected $fillable = ['Codigo', 'Tema', 'Descripcion', 'IdEspecialidad'];

    public function faculty(){
        return $this->belongsTo('Intranet\Models\Faculty', 'IdEspecialidad');
    }

    public function improvementPlan(){
        return $this->hasMany('Intranet\Models\ImprovementPlan', 'IdTipoPlanMejora');
    }

}