<?php

namespace Intranet\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//<-------------------------------necesario para softdeletes

class CoursexCyclexCriterion extends Model
{
    use SoftDeletes;//delete logico
    protected $table = 'CursoxCicloxCriterio';
    protected $primaryKey = 'IdCursoxCicloxCriterio';
    protected $fillable = ['IdCursoxCiclo',
                            'IdCriterio',
                            'TotalAlumnos',
                            'TotalCumplen',
                            'Porcentaje',
                            'Promedio'];
    
}
