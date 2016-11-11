<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investigator extends Model
{
    use SoftDeletes;

    public function faculty(){
        return $this->belongsTo('Intranet\Models\Faculty', 'id_especialidad');
    }

    public function area(){
        return $this->belongsTo('Intranet\Models\Area', 'id_area');
    }

    public function user(){
        return $this->belongsTo('Intranet\Models\User', 'id_usuario');
    }

    public function groups(){
    	return $this->belongsToMany('Intranet\Models\Group','investigatorxgroups','id_investigador','id_grupo')->withPivot('id');	
    }

    public function projects(){
        return $this->belongsToMany('Intranet\Models\Project','investigatorxprojects','id_investigador','id_proyecto')->withPivot('id');   
    }

    static public function getFiltered($filters){
        $query = Investigator::orderBy('nombre', 'asc');

        if(array_key_exists("nombre", $filters) && $filters["nombre"] != "") {
            $query = $query->where('nombre', 'like', '%'.$filters['nombre'].'%');
        }

        if(array_key_exists("ape_materno", $filters) && $filters["ape_materno"] != "") {
            $query = $query->where('ape_materno', 'like', '%'.$filters['ape_materno'].'%');
        }

        if(array_key_exists("ape_paterno", $filters) && $filters["ape_paterno"] != "") {
            $query = $query->where('ape_paterno', 'like', '%'.$filters['ape_paterno'].'%');
        }

        return $query->paginate(10);
    }
}
