<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model {
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'Docente';
    protected $primaryKey = 'IdDocente';
    protected $fillable = ['IdEspecialidad', 'IdUsuario','Codigo','Nombre', 'ApellidoPaterno', 'ApellidoMaterno', 'Correo', 'Vigente', 'rolTutoria','rolEvaluaciones','oficina','telefono','anexo','Descripcion', 'Cargo'];

    public function faculty(){
        return $this->belongsTo('Intranet\Models\Faculty', 'IdEspecialidad');
    }

    public function user(){
        return $this->belongsTo('Intranet\Models\User', 'IdUsuario');
    }

    public function cicle(){
        return $this->hasMany('Intranet\Models\Cicle', 'IdDocente');
    }

    public function schedules(){
        return $this->hasMany('Intranet\Models\TimeTablexTeacher','IdDocente');
    }

}