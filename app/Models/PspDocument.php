<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PspDocument extends Model
{
    use SoftDeletes;
    protected $table = 'pspdocuments';

    public function status(){
        return $this->belongsTo('Intranet\Models\Status', 'idtipoestado');
    }

    public function template(){
        return $this->belongsTo('Intranet\Models\Template', 'idtemplate');
    }

    public function student(){
        return $this->belongsTo('Intranet\Models\Student', 'idstudent');
    }

}
