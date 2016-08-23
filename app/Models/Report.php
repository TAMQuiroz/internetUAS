<?php
namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model {
    use SoftDeletes;

    protected $table = 'Informe';
    protected $primaryKey = 'IdInforme';
    protected $fillable = ['IdHorario', 'Titulo','Descripcion'];

    public function timeTable()
    {
        return $this->hasOne(TimeTable::class, 'IdInforme');
    }
}