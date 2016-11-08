<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;

class Competencextutstudentxevaluation extends Model
{
    public function competencia(){
  	  return $this->belongsTo('Intranet\Models\Competence','id_competence');
    }
}
