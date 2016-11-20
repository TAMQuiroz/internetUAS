<?php

namespace Intranet\Models;

use Intranet\Models\Cicle;
use Intranet\Models\AcademicUnit;
use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model {
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'Especialidad';
    protected $fillable = ['Codigo','Descripcion','Nombre', 'IdDocente'];
    protected $primaryKey = "IdEspecialidad";

    public function configurations(){
        return $this->hasMany('Intranet\Models\ConfFaculty', 'IdConfEspecialidad');
    }

    public function coordinator()
    {
        return $this->hasOne('Intranet\Models\Teacher', 'IdDocente');
    }

    public function teacher(){
        return $this->belongsTo('Intranet\Models\Teacher', 'IdDocente');
    }

    public function cycle(){
        return $this->belongsTo('Intranet\Models\FacultyxCycle', 'IdEspecialidad');
    }

    public function teachers(){
        return $this->hasMany('Intranet\Models\Teacher', 'IdEspecialidad')->orderBy("ApellidoPaterno","ASC");
    }

    public function specialty(){
        return Faculty::where('IdEspecialidad',$this->IdEspecialidad)->first();
    }    


    public function objectives(){
        return $this->hasMany('Intranet\Models\EducationalObjetive', 'IdEspecialidad')->where('deleted_at',null)->where('Estado',0);
    }

    public function studentsResults(){
        return $this->hasMany('Intranet\Models\StudentsResult', 'IdEspecialidad')->where('deleted_at',null)->where('Estado',0);
    }

    public function instruments(){
        return $this->hasMany('Intranet\Models\MeasurementSource', 'IdEspecialidad');
    }

}