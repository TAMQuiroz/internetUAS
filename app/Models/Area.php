<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use SoftDeletes;

    public function projects()
    {
		return $this->hasMany('Intranet\Models\Project', 'id_area');
    }

    public function investigators()
    {
		return $this->hasMany('Intranet\Models\Investigator', 'id_area');
    }
}
