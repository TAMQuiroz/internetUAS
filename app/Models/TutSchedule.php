<?php

namespace Intranet\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//<-------------------------------necesario para softdeletes

class TutSchedule extends Model
{
    use SoftDeletes;//delete logico
    protected $fillable = ['dia','hora_inicio','hora_fin'];

    
}
