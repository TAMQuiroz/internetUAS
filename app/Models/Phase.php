<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phase extends Model
{
	use SoftDeletes;
	
    public function faculty(){
        return $this->belongsTo('Intranet\Models\Faculty', 'idFaculty');
    }

    public function user(){
        return $this->belongsTo('Intranet\Models\User', 'idUser');
    }

}
