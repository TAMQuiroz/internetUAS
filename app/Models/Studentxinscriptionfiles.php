<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;

class Studentxinscriptionfiles extends Model
{
    //
    public function inscription(){
        return $this->belongsTo('Intranet\Models\Inscription', 'id');
    }
    public function student(){
        return $this->belongsTo('Intranet\Models\Student', 'IdAlumno');
    }
}
