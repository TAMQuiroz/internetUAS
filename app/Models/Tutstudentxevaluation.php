<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;

class Tutstudentxevaluation extends Model
{
    public function evaluation(){
  	  return $this->belongsTo('Intranet\Models\Evaluation','id_evaluation');//bien
    }

    public function evaluadores(){
        return $this->belongsToMany('Intranet\Models\Teacher','teacherxtutstudentxevaluations','id_tutstudentxevaluation','id_docente');
    }
}
