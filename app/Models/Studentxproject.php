<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;

class Studentxproject extends Model
{
    public function student(){
    	return $this->belongsTo('Intranet\Models\Tutstudent', 'id_estudiante');	
    }

    public function project(){
    	return $this->belongsTo('Intranet\Models\Project', 'id_proyecto');	
    }
}
