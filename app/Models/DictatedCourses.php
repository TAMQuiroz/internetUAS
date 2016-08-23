<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DictatedCourses extends Model
{
    use SoftDeletes;

    protected $table = 'CursoxCiclo';
    protected $primaryKey = 'IdCursoxCiclo';
    protected $fillable = ['IdCurso','IdCicloAcademico', 'TotalAlumnos', 'Evaluado'];

    public function course(){
        return $this->belongsTo('Intranet\Models\Course', 'IdCurso');
    }

    public function cicle(){
        return $this->belongsTo('Intranet\Models\Cicle', 'IdCicloAcademico');
    }

    public function timeTables(){
        return $this->hasMany('Intranet\Models\TimeTable', 'IdCursoxCiclo');
    }

}