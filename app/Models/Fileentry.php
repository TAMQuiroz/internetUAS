<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fileentry extends Model
{
	use SoftDeletes;
    protected $table = "ArchivoEntrada";
    protected $primaryKey = "IdArchivoEntrada";

    protected $dates = ['deleted_at'];

	public function courseEvidences() {
	    return $this->hasMany('Intranet\Models\CourseEvidence');
	} 



}