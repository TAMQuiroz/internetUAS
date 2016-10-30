<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;

class Tutstudentxevaluation extends Model
{
    public function evaluation(){
  	  return $this->belongsTo('Intranet\Models\Evaluation','id_evaluation');//bien
    }
}
