<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;

class PspStudent extends Model
{
    //
    protected $table = 'pspstudents';

        public function student(){
        return $this->belongsTo('Intranet\Models\Student', 'idalumno');
    }
}
