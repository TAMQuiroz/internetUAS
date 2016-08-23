<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicUnit extends Model
{
    protected $table = "UnidadAcademica";
    protected $primaryKey = "IdUnidadAcademica";
}