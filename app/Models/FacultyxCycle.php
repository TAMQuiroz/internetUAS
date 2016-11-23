<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class FacultyxCycle extends Model
{
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'CicloxEspecialidad';
    protected $primaryKey = "IdCicloAcademico";

}
