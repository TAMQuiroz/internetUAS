<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Studentxinscriptionfiles extends Model
{
	use SoftDeletes;
	protected $table = 'Pspstudentsxinscriptionfiles';
    //
    public function inscription(){
        return $this->belongsTo('Intranet\Models\Inscription', 'id');
    }
    public function student(){
        return $this->belongsTo('Intranet\Models\Student', 'IdAlumno');
    }
}
