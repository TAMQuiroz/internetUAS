<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResultxObjective extends Model
{
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'ResultadoxObjetivo';
    protected $primaryKey = 'IdResultadoxObjetivo';
    protected $fillable = ['IdResultadoEstudiantil','IdObjetivoEducacional','IdPeriodo'];

	public function studentsResult(){
		return $this->belongsTo('Intranet\Models\StudentsResult', 'IdResultadoEstudiantil');
	}

	public function educationalObjetive(){
		return $this->belongsTo('Intranet\Models\EducationalObjetive', 'IdObjetivoEducacional');
	}

	public function period(){
		return $this->belongsTo('Intranet\Models\Period', 'IdPeriodo');
	}

}
