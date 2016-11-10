<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;

class Investigatorxdeliverable extends Model
{
    public function investigator(){
    	return $this->belongsTo('Intranet\Models\Investigator', 'id_investigador');	
    }

    public function deliverable(){
    	return $this->belongsTo('Intranet\Models\Deliverable', 'id_entregable');	
    }
}
