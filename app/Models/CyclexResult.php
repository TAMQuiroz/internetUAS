<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\EducationalObjetive;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class CyclexResult extends Model
{
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'CicloxResultado';
    protected $primaryKey = 'IdCicloxResultado';
    protected $fillable = ['IdCicloAcademico','IdResultadoEstudiantil','TotalAlumnos','TotalCumplen','Promedio','Porcentaje'];

    public function studentsResult(){
        return $this->belongsTo('Intranet\Models\StudentsResult', 'IdResultadoEstudiantil');
    }

    public function cycle(){
        return $this->belongsTo('Intranet\Models\Cicle', 'IdCicloAcademico');
    }

}
