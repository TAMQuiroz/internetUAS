<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    public function faculty(){
        return $this->belongsTo('Intranet\Models\Faculty', 'idFaculty');
    }

    public function user(){
        return $this->belongsTo('Intranet\Models\User', 'idUser');
    }

}
