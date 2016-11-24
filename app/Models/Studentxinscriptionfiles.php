<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Studentxinscriptionfiles extends Model
{
	use SoftDeletes;
	protected $table = 'pspstudentsxinscriptionfiles';
    //
    public function inscription(){
        return $this->belongsTo('Intranet\Models\Inscription', 'id');
    }
    public function pspStudent(){
        return $this->belongsTo('Intranet\Models\PspStudent', 'id');
    }
}
