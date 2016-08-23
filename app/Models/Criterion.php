<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;



class Criterion extends Model
{
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'Criterio';
    protected $primaryKey = 'IdCriterio';
    protected $fillable = ['IdAspecto','Nombre','Estado'];

	public function aspect(){
		return $this->belongsTo('Intranet\Models\Aspect', 'IdAspecto');
	}

	public function criterionLevel(){
        return $this->hasMany('Intranet\Models\CriterionLevel', 'IdCriterio');
    }
}
