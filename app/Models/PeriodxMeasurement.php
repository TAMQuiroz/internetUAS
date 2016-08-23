<?php

namespace Intranet\Models;

use Intranet\Models\Cicle;
use Intranet\Models\AcademicUnit;
use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;

class PeriodxMeasurement extends Model {
    use LastUpdatedTrait;

    protected $table = 'PeriodoxFuente';
    protected $fillable = ['IdPeriodo','IdFuenteMedicion'];

    public function period(){
        return $this->belongTo('Intranet\Models\Period', 'IdPeriodo');
    }

    public function measurement(){
        return $this->belongsTo('Intranet\Models\MeasurementSource', 'IdFuenteMedicion');
    }
}