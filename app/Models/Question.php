<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//<-------------------------------necesario para softdeletes

class Question extends Model
{
	use softDeletes;
    // protected $fillable = ['nombre','descripcion'];

    public function responsable(){
  	  return $this->belongsTo('Intranet\Models\Teacher', 'id_docente');
    }

    public function alternativas(){
  	  return $this->hasMany('Intranet\Models\Alternative','question_id');
    }

    public function competencia(){
  	  return $this->belongsTo('Intranet\Models\Competence','competence_id');
    }

    public function especialidad(){
  	  return $this->belongsTo('Intranet\Models\Teacher','id_especialidad');
    }
}
