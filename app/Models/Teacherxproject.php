<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;

class Teacherxproject extends Model
{
    public function teacher(){
    	return $this->belongsTo('Intranet\Models\Teacher', 'id_docente','IdDocente');	
    }

    public function project(){
    	return $this->belongsTo('Intranet\Models\Project', 'id_proyecto');	
    }
}
