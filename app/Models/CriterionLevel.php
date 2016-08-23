<?php namespace Intranet\Models;

use Intranet\Models\Criterion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CriterionLevel extends Model
{
    use SoftDeletes;

    protected $table = 'NivelCriterio';
    protected $primaryKey = 'IdNivelCriterio';
    protected $fillable = ['IdCriterio','IdPeriodo','Valor','Descripcion'];

    public function criterion()
    {
        return $this->belongsTo(Criterion::class, 'IdCriterio');
    }

    public function period()
    {
        return $this->belongsTo(Period::class, 'IdPeriodo');
    }
}
