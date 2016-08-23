<?php

namespace Intranet\Models;


use Illuminate\Database\Eloquent\SoftDeletes;
use Intranet\Models\Traits\LastUpdatedTrait;

class SchedulexAspect
{
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = "HorarioxAspecto";
    protected $primaryKey = "IdHorarioxAspecto";
    protected $fillable = ['IdHorario', 'IdAspecto', 'TotalAlumnos', 'TotalCumplen'
        , 'Porcentaje', 'Promedio'];
}