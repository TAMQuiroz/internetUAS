<?php

namespace Intranet\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//<-------------------------------necesario para softdeletes

class Tutorship extends Model
{
    use SoftDeletes;//delete logico

    // protected $fillable = ['id_suplente','id_profesor'];

    // public function student(){
  	 //  return $this->belongsTo('Intranet\Models\Tutstudent','id_tutoria');
    // }

    public function tutor(){
  	  return $this->belongsTo('Intranet\Models\Teacher', 'id_tutor');
    }
}
