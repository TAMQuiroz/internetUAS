<?php namespace Intranet\Models;

use Intranet\Models\Faculty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicCycle extends Model
{
    use SoftDeletes;

    protected $table = 'CicloAcademico';
    protected $primaryKey = 'IdCicloAcademico';
    protected $fillable = ['Descripcion','Numero'];
}
