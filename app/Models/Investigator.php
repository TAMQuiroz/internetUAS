<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;

class Investigator extends Model
{
    public function faculty(){
        return $this->belongsTo('Intranet\Models\Faculty', 'id_especialidad');
    }

    public function area(){
        return $this->belongsTo('Intranet\Models\Area', 'id_area');
    }

    public function user(){
        return $this->belongsTo('Intranet\Models\User', 'id_usuario');
    }

    public function investigatorXgroups(){
    	return $this->hasMany('Intranet\Models\InvestigatorXgroup', 'id_investigador');	
    }
}
