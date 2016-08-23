<?php namespace Intranet\Models;

use Intranet\Models\Aspect;
use Intranet\Models\StudentsResult;
use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rubric extends Model {
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'Rubrica';
    protected $primaryKey = 'IdRubrica';
    protected $fillable = ['IdCicloAcademico', 'IdResultadoEstudiantil', 'Vigente', 'Nombre'];

    public function aspects(){
        return $this->hasMany(Aspect::class, 'IdAspecto');
    }

    public function studentResult(){
        return $this->belongsTo(StudentsResult::class, 'IdResultadoEstudiantil');
    }

}