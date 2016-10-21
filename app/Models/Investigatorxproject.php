<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investigatorxproject extends Model
{
    public function investigator(){
    	return $this->belongsTo('Intranet\Models\Investigator', 'id_investigador');	
    }

    public function project(){
    	return $this->belongsTo('Intranet\Models\Project', 'id_proyecto');	
    }
}
