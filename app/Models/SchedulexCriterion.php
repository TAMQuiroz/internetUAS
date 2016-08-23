<?php

namespace Intranet\Models;


use Illuminate\Database\Eloquent\SoftDeletes;
use Intranet\Models\Traits\LastUpdatedTrait;

class SchedulexCriterion
{
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = "HorarioxCriterio";
    protected $primaryKey = "IdHorarioxCriterio";
    protected $fillable = ['IdHorario', 'IdCriterio', 'TotalAlumnos', 'TotalCumplen'
        , 'Porcentaje', 'Promedio'];
}