<?php
/**
 * Created by PhpStorm.
 * User: paolo
 * Date: 5/19/16
 * Time: 9:19 PM
 */

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contribution extends Model{

	use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'Aporte';
    protected $primaryKey = 'IdAporte';
    protected $fillable = ['IdCicloAcademico', 'IdCurso', 'IdResultadoEstudiantil', 'Valor'];
    
    public function course(){
        return $this->hasOne('Intranet\Models\Course', 'IdCurso');
    }
    
    public function studentsResult()
    {
        return $this->belongsTo('Intranet\Models\StudentsResult', 'IdResultadoEstudiantil');
    }

    public function courses()
    {
        return $this->belongsTo('Intranet\Models\Course', 'IdCurso');
    }
}