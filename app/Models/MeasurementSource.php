<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeasurementSource extends Model
{
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'FuenteMedicion';
    protected $primaryKey = 'IdFuenteMedicion';
    protected $fillable = ['IdEspecialidad', 'Nombre'];

    public function faculty(){
        return $this->belongsTo('Intranet\Models\Faculty', 'IdEspecialidad');
    }

    public function courses(){
        return $this->belongsToMany('Curso', 'FuentexCursoxCriterioxCiclo', 'IdFuenteMedicion', 'IdCurso');
    }

}
