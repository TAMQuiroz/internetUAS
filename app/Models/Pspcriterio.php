<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;

class Pspcriterio extends Model
{
    public function pspProcess(){
        return $this->belongsTo('Intranet\Models\PspProcess', 'id_pspprocess');
    }
}
