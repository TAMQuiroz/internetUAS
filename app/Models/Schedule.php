<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model {
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = "Horario";
    protected $primaryKey = "IdHorario";
    protected $fillable = ['IdCursoxCiclo', 'Codigo', 'TotalAlumnos'];

    public function professors()
    {
        return $this->belongsToMany(Teacher::class, 'HorarioxDocente', 'IdHorario', 'IdDocente');
    }

    public function courseEvidences()
    {
        return $this->hasMany(CourseEvidence::class, 'IdHorario');
    }

    public function coursexcycle()
    {
        return $this->belongsTo('Intranet\Models\CoursexCycle', 'IdCursoxCiclo');
    }
}