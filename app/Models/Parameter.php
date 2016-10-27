<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parameter extends Model{
	use SoftDeletes;
	
    protected $fillable = ['is_especialidad',
    					'duracionCita'];

}
