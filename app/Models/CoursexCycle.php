<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoursexCycle extends Model {
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = "CursoxCiclo";
    protected $primaryKey = "IdCursoxCiclo";
    protected $fillable = ['IdCurso', 'IdCicloAcademico', 'TotalAlumnos', 'Evaluado'];

    public function course()
    {
        return $this->belongsTo('Intranet\Models\Course', 'IdCurso');
    }

    public function cycle()
    {
        return $this->belongsTo('Intranet\Models\Cicle', 'IdCicloAcademico');
    }


}