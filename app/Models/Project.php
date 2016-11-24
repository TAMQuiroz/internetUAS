<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    
    public function area(){
        return $this->belongsTo('Intranet\Models\Area', 'id_area');
    }

    public function group(){
        return $this->belongsTo('Intranet\Models\Group', 'id_grupo');
    }

    public function status(){
        return $this->belongsTo('Intranet\Models\Status', 'id_status');
    }

    public function investigators(){
    	return $this->belongsToMany('Intranet\Models\Investigator','investigatorxprojects','id_proyecto','id_investigador')->orderBy('nombre', 'asc')->withPivot('id');	
    }

    public function students(){
        return $this->belongsToMany('Intranet\Models\Tutstudent','studentxprojects','id_proyecto','id_estudiante')->orderBy('nombre', 'asc')->withPivot('id'); 
    }

    public function teachers(){
        return $this->belongsToMany('Intranet\Models\Teacher','teacherxprojects','id_proyecto','id_profesor')->orderBy('Nombre', 'asc')->withPivot('id');    
    }

    public function deliverables(){
        return $this->hasMany('Intranet\Models\Deliverable', 'id_proyecto');
    }

    public function lastdeliverable(){
        return $this->hasMany('Intranet\Models\Deliverable', 'id_proyecto')->orderBy('fecha_limite','asc');
    }

    static public function getFiltered($filters){
        $query = Project::orderBy('nombre', 'asc');

        if(array_key_exists("nombre", $filters) && $filters["nombre"] != "") {
            $query = $query->where('nombre', 'like', '%'.$filters['nombre'].'%');
        }

        return $query->paginate(10);
    }
}
