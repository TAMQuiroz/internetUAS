<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Intranet\Models\StudentsResult;

class EducationalObjetive extends Model
{
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'ObjetivoEducacional';
    protected $primaryKey = 'IdObjetivoEducacional';
    protected $fillable = ['Descripcion','Numero','CicloRegistro','IdEspecialidad','Estado'];

    public function resultxObjective(){
        return $this->hasMany('Intranet\Models\ResultxObjective', 'IdObjetivoEducacional');
    }

    public function studentsResults()
    {
        return $this->belongsToMany(StudentsResult::class, 'ResultadoxObjetivo', 'IdObjetivoEducacional', 'IdResultadoEstudiantil');
    }

    public function faculty(){
        return $this->belongsTo('Intranet\Models\Faculty', 'IdEspecialidad');
    }

}
