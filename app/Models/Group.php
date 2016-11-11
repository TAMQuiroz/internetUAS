<?php 
namespace Intranet\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{

	use SoftDeletes;
    use LastUpdatedTrait;

    protected $fillable = ['nombre', 'id_especialidad', 'descripcion', 'id_lider'];

    public function faculty(){
  	  return $this->belongsTo('Intranet\Models\Faculty', 'id_especialidad');
    }

    public function leader(){
  	  return $this->belongsTo('Intranet\Models\Teacher', 'id_lider', 'IdDocente');
    }

    public function investigators(){
    	return $this->belongsToMany('Intranet\Models\Investigator','investigatorxgroups','id_grupo','id_investigador')->orderBy('nombre', 'asc')->withPivot('id');	
    }

    public function students(){
        return $this->belongsToMany('Intranet\Models\Tutstudent','studentxgroups','id_grupo','id_estudiante')->orderBy('nombre', 'asc')->withPivot('id');  
    }

    public function teachers(){
        return $this->belongsToMany('Intranet\Models\Teacher','teacherxgroups','id_grupo','id_profesor')->orderBy('Nombre', 'asc')->withPivot('id');    
    }

    public function events(){
        return $this->HasMany('Intranet\Models\Event', 'id_grupo');
    }

    static public function getFiltered($filters){
        $query = Group::orderBy('nombre', 'asc');

        if(array_key_exists("nombre", $filters) && $filters["nombre"] != "") {
            $query = $query->where('nombre', 'like', '%'.$filters['nombre'].'%');
        }

        return $query->paginate(10);
    }
}
