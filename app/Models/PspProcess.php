<?php 

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PspProcess extends Model{
	    
	use SoftDeletes;
	        
    protected $table = 'pspprocesses';
    protected $primaryKey = 'id';

    public function teachers()
    {

        return $this->belongsToMany(Teachers::class, 'Docente', 'IdDocente', 'Nombre');
    }

     public function course()
    {

        return $this->belongsTo('Intranet\Models\Course', 'idcurso');
    }
    
    public function faculty()
    {

        return $this->belongsTo('Intranet\Models\Faculty', 'idespecialidad');
    }

    public function cicle()
    {

        return $this->belongsTo('Intranet\Models\AcademicCycle', 'idCiclo');
    }

    public function criterios()
    {
        return $this->hasMany('Intranet\Models\Pspcriterio', 'id_pspprocess');
    }
}