<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;

class Invdocument extends Model
{
    public function user(){
        return $this->belongsTo('Intranet\Models\User', 'id_investigador', 'IdUsuario');
    }
}
