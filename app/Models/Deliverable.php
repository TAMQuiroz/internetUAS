<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deliverable extends Model
{
    use SoftDeletes;

    public function investigators(){
    	return $this->belongsToMany('Intranet\Models\Investigator','investigatorxdeliverables','id_entregable','id_investigador')->orderBy('nombre', 'asc')->withPivot('id');	
    }

    public function students(){
        return $this->belongsToMany('Intranet\Models\Tutstudent','studentxdeliverables','id_entregable','id_estudiante')->orderBy('nombre', 'asc')->withPivot('id');   
    }

    public function teachers(){
        return $this->belongsToMany('Intranet\Models\Teacher','teacherxdeliverables','id_entregable','id_profesor')->orderBy('Nombre', 'asc')->withPivot('id');    
    }

    public function versions(){
        return $this->hasMany('Intranet\Models\Invdocument', 'id_entregable')->orderBy('version','desc');
    }

    public function project(){
        return $this->belongsTo('Intranet\Models\Project', 'id_proyecto');
    }

    public function lastversion(){
        return $this->hasMany('Intranet\Models\Invdocument', 'id_entregable')->orderBy('version','desc');
    }

    public function dependencies(){
        return $this->hasMany('Intranet\Models\Deliverable', 'id_padre');
    }

    public function father(){
        return $this->belongsTo('Intranet\Models\Deliverable', 'id_padre');
    }
}
