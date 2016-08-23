<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoursexTeacher extends Model {
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'CursoxDocente';
    protected $primaryKey = 'IdCursoxDocente';
    protected $fillable = ['IdDocente', 'IdCurso'];

    public function teacher(){
        return $this->belongsTo('Intranet\Models\Teacher', 'IdDocente');
    }

    public function course(){
        return $this->belongsTo('Intranet\Models\Course', 'IdCurso');
    }

}