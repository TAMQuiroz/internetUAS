<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Intranet\Models\Traits\LastUpdatedTrait;

class PspStudent extends Model
{
    //
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'pspstudents';

    public function student(){
        return $this->belongsTo('Intranet\Models\Student', 'idalumno');
    }

    public function pspGroup()
    {
    	return $this->belongsTo('Intranet\Models\PspGroup','IdPspGroup');
    }

    public function pspprocess(){
        return $this->belongsTo('Intranet\Models\PspProcess', 'idpspprocess');
    }

    
}
