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
        return $this->hasMany('Intranet\Models\Criterion','IdAspecto');
    }
}
