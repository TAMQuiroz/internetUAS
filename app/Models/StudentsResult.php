<?php namespace Intranet\Models;

use Intranet\Models\Aspect;
use Intranet\Models\Criterion;
use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentsResult extends Model
{
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'ResultadoEstudiantil';
    protected $primaryKey = 'IdResultadoEstudiantil';
    protected $fillable = ['IdEspecialidad','Identificador','Descripcion','Estado'];

    public function resultxObjective(){
        return $this->hasMany('Intranet\Models\ResultxObjective', 'IdResultadoEstudiantil');
    }

    public function educationalObjectives()
    {
        return $this->belongsToMany(EducationalObjetive::class, 'ResultadoxObjetivo', 'IdResultadoEstudiantil', 'IdObjetivoEducacional');
    }

    public function periodxResult(){
        return $this->hasMany('Intranet\Models\PeriodxResult', 'IdResultadoEstudiantil');
    }

    public function cyclexResult(){
        return $this->hasMany('Intranet\Models\CyclexResult', 'IdResultadoEstudiantil');
    }

    public function aspect()
    {
        return $this->hasMany('Intranet\Models\Aspect', 'IdResultadoEstudiantil')->orderBy("Nombre","ASC");
    }

    public function aspects()
    {
        return $this->hasMany('Intranet\Models\Aspect', 'IdResultadoEstudiantil')->orderBy("Nombre","ASC");
    }

    public function contributions(){
        return $this->hasMany('Intranet\Models\Contribution', 'IdResultadoEstudiantil');
    }

	public function faculty(){
		return $this->belongsTo('Intranet\Models\Faculty', 'IdEspecialidad');
	}

    public function criterions()
    {
        return $this->hasManyThrough(Criterion::class, Aspect::class, 'IdResultadoEstudiantil', 'IdAspecto');
    }
}