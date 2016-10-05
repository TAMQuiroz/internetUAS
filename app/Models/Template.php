<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    //
    
	
    public function teacher(){
        return $this->belongsTo('Intranet\Models\Teacher', 'idProfesor');
    }
    public function user(){
        return $this->belongsTo('Intranet\Models\User', 'idAdmin');
    }
}
