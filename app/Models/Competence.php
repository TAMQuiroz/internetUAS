<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//<-------------------------------necesario para softdeletes

class Competence extends Model
{
	use SoftDeletes;
    protected $fillable = ['nombre','descripcion'];

    public function questions(){
        return $this->hasMany('Intranet\Models\Question', 'id_competence');
    }
}
