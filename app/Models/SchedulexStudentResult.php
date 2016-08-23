<?php

namespace Intranet\Models;


use Illuminate\Database\Eloquent\SoftDeletes;
use Intranet\Models\Traits\LastUpdatedTrait;

class SchedulexStudentResult
{
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = "HorarioxResultado";
    protected $primaryKey = "IdHorarioxResultado";
    protected $fillable = ['IdHorario', 'IdResultadoEstudiantil', 'TotalAlumnos', 'TotalCumplen'
        , 'Porcentaje', 'Promedio'];
}