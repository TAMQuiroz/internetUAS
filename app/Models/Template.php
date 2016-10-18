<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    //
    //use SoftDeletes;
	
    public function teacher(){
        return $this->belongsTo('Intranet\Models\Teacher', 'idProfesor');
    }
    public function supervisor(){
        return $this->belongsTo('Intranet\Models\Supervisor', 'idSupervisor');
    }
    public function status(){
        return $this->belongsTo('Intranet\Models\Status', 'idTipoEstado');
    }
    public function user(){
        return $this->belongsTo('Intranet\Models\User', 'idAdmin');
    }


}
