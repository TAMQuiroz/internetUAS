<?php namespace Intranet\Models;

use Intranet\Models\ActionPlan;
use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImprovementPlan extends Model {
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'PlanMejora';
    protected $primaryKey = 'IdPlanMejora';
    protected $fillable = ['AnalisisCausal', 'Hallazgo', 'Estado', 'FechaImplementacion', 'IdEspecialidad', 'IdTipoPlanMejora', 'IdDocente', 'IdArchivoEntrada', 'Descripcion'];
    protected $appends = ['file_url'];

    public function faculty(){
        return $this->belongsTo('Intranet\Models\Faculty', 'IdEspecialidad');
    }

    public function typeImprovementPlan(){
        return $this->belongsTo('Intranet\Models\TypeImprovementPlan', 'IdTipoPlanMejora');
    }

    public function teacher(){
        return $this->belongsTo('Intranet\Models\Teacher', 'IdDocente');
    }

    public function file(){
        return $this->belongsTo('Intranet\Models\FileCertificate', 'IdArchivoEntrada');
    }

    public function actions()
    {
        return $this->hasMany(ActionPlan::class, 'IdPlanMejora')->where('deleted_at',null);
    }

    public function getFileUrlAttribute()
    {
        if(is_null($this->file)) return '';

        return route('getentry', $this->file->filename);
    }

}