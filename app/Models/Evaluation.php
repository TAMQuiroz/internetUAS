<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['fecha_inicio','fecha_fin','nombre','descripcion','tiempo'];

    public function especialidad(){
  	  return $this->belongsTo('Intranet\Models\Teacher','id_especialidad');
    }

    public function preguntas(){
  	  return $this->hasMany('Intranet\Models\Evquestion','id_evaluation');
    }

}
