<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inscription extends Model
{
	use SoftDeletes;
	protected $table = 'inscriptionfiles';
	
    public function faculty(){
        return $this->belongsTo('Intranet\Models\Faculty', 'idFaculty');
    }

    public function user(){
        return $this->belongsTo('Intranet\Models\User', 'idUser');
    }

}
