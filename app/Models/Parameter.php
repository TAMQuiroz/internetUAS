<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model{
	use SoftDeletes;
    protected $fillable = ['duracionCita'];
}