<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aspect extends Model
{
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'Aspecto';
    protected $primaryKey = 'IdAspecto';
    protected $fillable = ['IdResultadoEstudiantil','Nombre','Estado'];


	public function studentsResult(){
		return $this->belongsTo('Intranet\Models\StudentsResult', 'IdResultadoEstudiantil');
	}

    public function criterion(){
        return $this->hasMany('Intranet\Models\Criterion','IdAspecto')->where('deleted_at',null)->where('Estado',0)->orderBy("Nombre","ASC");
    }

    public function relatedCriterion(){
        return $this->hasMany('Intranet\Models\Criterion','IdAspecto')->where('deleted_at',null)->where('Estado',1)->orderBy("Nombre","ASC");
    }

    public function criterions(){
        return $this->hasMany('Intranet\Models\Criterion','IdAspecto')->where('deleted_at',null)->where('Estado',0)->orderBy("Nombre","ASC");
    }
}
