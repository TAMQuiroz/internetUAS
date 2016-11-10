<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;

class Teacherxgroup extends Model
{
    public function teacher(){
    	return $this->belongsTo('Intranet\Models\Teacher', 'id_docente','IdDocente');	
    }

    public function group(){
    	return $this->belongsTo('Intranet\Models\Group', 'id_grupo');	
    }
}
