<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
	use SoftDeletes;
	
    public function faculty(){
        return $this->belongsTo('Intranet\Models\Faculty', 'id_especialidad');
    }

    public function group(){
        return $this->belongsTo('Intranet\Models\Group', 'id_grupo');
    }

    static public function getFiltered($filters){
        $query = Event::orderBy('nombre', 'asc');

        if(array_key_exists("nombre", $filters) && $filters["nombre"] != "") {
            $query = $query->where('nombre', 'like', '%'.$filters['nombre'].'%');
        }

        return $query->paginate(10);
    }
}
