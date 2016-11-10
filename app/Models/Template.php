<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    //
    use SoftDeletes;
	
    public function teacher(){
        return $this->belongsTo('Intranet\Models\Teacher', 'idprofesor');
    }
    public function supervisor(){
        return $this->belongsTo('Intranet\Models\Supervisor', 'idsupervisor');
    }
    public function status(){
        return $this->belongsTo('Intranet\Models\Status', 'idtipoestado');
    }
    public function user(){
        return $this->belongsTo('Intranet\Models\User', 'idadmin');
    }
    public function phase(){
        return $this->belongsTo('Intranet\Models\Phase', 'idphase');
    }

}
