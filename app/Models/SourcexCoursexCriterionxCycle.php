<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class SourcexCoursexCriterionxCycle extends Model {
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'FuentexCursoxCriterioxCiclo';
    protected $primaryKey = 'IdFuentexCursoxCriterioxCiclo';
    protected $fillable = ['IdFuenteMedicion', 'IdCurso','IdCriterio','IdCicloAcademico'];

    public function measurementSource(){
        return $this->belongsTo('Intranet\Models\MeasurementSource','IdFuenteMedicion');
    }

    public function course(){
        return $this->belongsTo('Intranet\Models\Course', 'IdCurso');
    }

    public function criterion()
    {
        return $this->belongsTo('Intranet\Models\Criterion', 'IdCriterio');
    }

    public function cycle(){
        return $this->belongsTo('Intranet\Models\Cicle', 'IdCicloAcademico');
    }

}