<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeriodxObjective extends Model
{
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'PeriodoxObjetivo';
    protected $primaryKey = 'IdPeriodoxObjetivo';
    protected $fillable = ['IdPeriodo','IdObjetivoEducacional'];

    public function educationalObjetive(){
		return $this->belongsTo('Intranet\Models\EducationalObjetive', 'IdObjetivoEducacional');
	}

	public function period(){
		return $this->belongsTo('Intranet\Models\Period', 'IdPeriodo');
	}

}