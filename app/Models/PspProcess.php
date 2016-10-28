<?php 

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PspProcess extends Model{
	    
	use SoftDeletes;
	        
    protected $table = 'pspprocesses';
    protected $primaryKey = 'id';

    public function teachers()
    {

        return $this->belongsToMany(Teachers::class, 'Docente', 'IdDocente', 'Nombre');
    }
}