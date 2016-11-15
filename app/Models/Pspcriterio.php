<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;

class Pspcriterio extends Model
{
    public function pspProcess(){
        return $this->belongsTo('Intranet\Models\PspProcess', 'id_pspprocess');
    }

    static public function getFiltered($filters){
        $query = Pspcriterio::orderBy('nombre', 'asc');

        if(array_key_exists("nombre", $filters) && $filters["nombre"] != "") {
            $query = $query->where('nombre', 'like', '%'.$filters['nombre'].'%');
        }

        return $query->paginate(10);
    }
}
