<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model {
    use SoftDeletes;

    protected $table = 'alumno';
    protected $primaryKey = 'IdAlumno';
    protected $fillable = ['IdHorario', 'Codigo','Nombre', 'ApellidoPaterno', 'ApellidoMaterno','IdPspGroup'];

    public function pspGroup()
    {
    	return $this->belongsTo('Intranet\Models\PspGroup','IdPspGroup');
    }

}