<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    //
    use SoftDeletes;
	
    public function teacher(){
        return $this->belongsTo('Intranet\Models\Teacher', 'idprofesor');
    }
    public function supervisor(){
        return $this->belongsTo('Intranet\Models\Supervisor', 'idsupervisor');
    }
    public function status(){
        return $this->belongsTo('Intranet\Models\Status', 'idtipoestado');
    }
    public function user(){
        return $this->belongsTo('Intranet\Models\User', 'idadmin');
    }
    public function phase(){
        return $this->belongsTo('Intranet\Models\Phase', 'idphase');
    }

    static public function getFiltered($filters){
    $query = Template::orderBy('titulo');

    if(array_key_exists("titulo", $filters) && $filters["titulo"] != "") {
        $query = $query->where('titulo', 'like', '%'.$filters['titulo'].'%');
    }

        return $query->paginate(10);
    }

    static public function getFiltered2($filters,$p){
    $query = Template::where('idphase',$p);

    if(array_key_exists("titulo", $filters) && $filters["titulo"] != "") {
        $query = $query->where('titulo', 'like', '%'.$filters['titulo'].'%');
    }

        return $query->get();
    }

}
