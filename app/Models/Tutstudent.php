<?php

namespace Intranet\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//<-------------------------------necesario para softdeletes

class Tutstudent extends Model
{
    use SoftDeletes;//delete logico

    protected $fillable = ['codigo','nombre','ape_paterno','ape_materno','correo'];

    public function faculty(){
  	  return $this->belongsTo('Intranet\Models\Faculty', 'id_especialidad');
    }

    public function user(){
  	  return $this->belongsTo('Intranet\Models\User', 'id_usuario');
    }

    public function tutorship(){
  	  return $this->hasOne('Intranet\Models\Tutorship');
    }
}
