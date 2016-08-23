<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CycleAcademic extends Model
{
    use SoftDeletes;

    protected $table = 'CicloAcademico';
    protected $primaryKey = 'IdCicloAcademico';
    protected $fillable = ['Numero','Descripcion'];

   
}
