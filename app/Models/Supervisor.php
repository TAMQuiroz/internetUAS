<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supervisor extends Model
{
	use SoftDeletes;

	protected $table = 'supervisors';
    protected $primaryKey = 'id';
	
    public function faculty(){
        return $this->belongsTo('Intranet\Models\Faculty', 'idfaculty');
    }

    public function user(){
        return $this->belongsTo('Intranet\Models\User', 'iduser');
    }

}
