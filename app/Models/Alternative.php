<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//<-------------------------------necesario para softdeletes

class Alternative extends Model
{
	use softDeletes;
    protected $fillable = ['letra','descripcion'];
}
