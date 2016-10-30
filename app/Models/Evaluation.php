<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluation extends Model
{
	use softDeletes;
    protected $fillable = ['fecha_inicio','fecha_fin','nombre','descripcion','tiempo'];

    public function especialidad(){
  	  return $this->belongsTo('Intranet\Models\Teacher','id_especialidad');
    }

    public function preguntas(){
  	  return $this->hasMany('Intranet\Models\Evquestion','id_evaluation');
    }

}
