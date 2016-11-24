<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supervisor extends Model
{
	use SoftDeletes;

	protected $table = 'supervisors';
    protected $primaryKey = 'id';
	
    public function faculty(){
        return $this->belongsTo('Intranet\Models\Faculty', 'idfaculty');
    }

    public function user(){
        return $this->belongsTo('Intranet\Models\User', 'iduser');
    }

    static public function getFiltered($filters){
    $query = Supervisor::orderBy('nombres');

    if(array_key_exists("nombres", $filters) && $filters["nombres"] != "") {
        $query = $query->where('nombres', 'like', '%'.$filters['nombres'].'%');
    }

        return $query->paginate(10);
    }

}
