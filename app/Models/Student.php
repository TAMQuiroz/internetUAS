<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model {
    use SoftDeletes;

    protected $table = 'Alumno';
    protected $primaryKey = 'IdAlumno';
    protected $fillable = ['IdHorario', 'Codigo','Nombre', 'ApellidoPaterno', 'ApellidoMaterno'];


}