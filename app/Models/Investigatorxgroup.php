<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;

class Investigatorxgroup extends Model
{
    public function investigator(){
    	return $this->belongsTo('Intranet\Models\Investigator', 'id_investigador');	
    }

    public function group(){
    	return $this->belongsTo('Intranet\Models\Group', 'id_grupo');	
    }
}
