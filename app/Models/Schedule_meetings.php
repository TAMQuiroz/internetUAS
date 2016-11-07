<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule_meetings extends Model
{
    //
	use SoftDeletes;

        public function phase(){
        return $this->belongsTo('Intranet\Models\Phase', 'idfase');
    }

        public function pspprocess(){
        return $this->belongsTo('Intranet\Models\PspProcess', 'idpspprocess');
    }
}
