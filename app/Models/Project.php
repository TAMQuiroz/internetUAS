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
    	return $this->belongsToMany('Intranet\Models\Investigator','investigatorxprojects','id_proyecto','id_investigador')->withPivot('id');	
    }

    public function deliverables(){
        return $this->hasMany('Intranet\Models\Deliverable', 'id_proyecto');
    }
}
