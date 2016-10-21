<?php

namespace Intranet\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//<-------------------------------necesario para softdeletes



class NoAvailability extends Model
{
    use SoftDeletes;//delete logico

    protected $fillable = ['fecha_inicio','fecha_fin'];
}
