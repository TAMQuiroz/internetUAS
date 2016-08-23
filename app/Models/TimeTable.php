<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;


class TimeTable extends Model{
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'Horario';
    protected $primaryKey = 'IdHorario';
    protected $fillable = ['IdCursoxCiclo','Codigo','TotalAlumnos'];

    public function courseXCicle(){
        return $this->belongsTo('Intranet\Models\DictatedCourses', 'IdCursoxCiclo');
    }
    
    public function report()
    {
        return $this->hasOne(Report::class, 'IdHorario');
    }
   

}
