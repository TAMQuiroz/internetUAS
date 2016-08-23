<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvaluatedCourse extends Model
{
    use SoftDeletes;

    protected $table = 'CursoxCiclo';
    protected $primaryKey = 'IdCursoxCiclo';
    protected $fillable = ['IdCurso','IdCicloAcademico'];
}
