<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeTablexTeacher extends Model
{
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'HorarioxDocente';
    protected $primaryKey = 'IdHorarioxDocente';
    protected $fillable = ['IdHorario','IdDocente'];

    public function timetable(){
        return $this->belongsTo('Intranet\Models\TimeTable', 'IdHorario');
    }

    public function teacher(){
        return $this->belongsTo('Intranet\Models\Teacher', 'IdDocente');
    }


}
