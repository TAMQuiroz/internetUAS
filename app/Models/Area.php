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

    static public function getFiltered($filters){
        $query = Area::orderBy('nombre', 'asc');

        if(array_key_exists("nombre", $filters) && $filters["nombre"] != "") {
            $query = $query->where('nombre', 'like', '%'.$filters['nombre'].'%');
        }

        return $query->paginate(10);
    }
}
