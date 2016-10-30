<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//<-------------------------------necesario para softdeletes

class Evquestion extends Model
{
    use softDeletes;

    public function responsable(){
  	  return $this->belongsTo('Intranet\Models\Teacher', 'id_docente');
    }

    public function alternativas(){
  	  return $this->hasMany('Intranet\Models\Evalternative','id_evquestion');
    }

    public function competencia(){
  	  return $this->belongsTo('Intranet\Models\Competence','id_competence');
    }
}
