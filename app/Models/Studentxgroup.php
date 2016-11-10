<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;

class Studentxgroup extends Model
{
    public function student(){
    	return $this->belongsTo('Intranet\Models\Tutstudent', 'id_estudiante');	
    }

    public function group(){
    	return $this->belongsTo('Intranet\Models\Group', 'id_grupo');	
    }
}
