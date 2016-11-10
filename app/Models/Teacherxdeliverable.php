<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;

class Teacherxdeliverable extends Model
{
    public function teacher(){
    	return $this->belongsTo('Intranet\Models\Teacher', 'id_docente','IdDocente');	
    }

    public function deliverable(){
    	return $this->belongsTo('Intranet\Models\Deliverable', 'id_entregable');	
    }
}
