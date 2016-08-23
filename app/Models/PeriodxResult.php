<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeriodxResult extends Model
{
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'PeriodoxResultado';
    protected $primaryKey = 'IdPeriodoxResultado';
    protected $fillable = ['IdPeriodo','IdResultadoEstudiantil'];

    public function studentsResult(){
		return $this->belongsTo('Intranet\Models\StudentsResult', 'IdResultadoEstudiantil');
	}

	public function period(){
		return $this->belongsTo('Intranet\Models\Period', 'IdPeriodo');
	}

}