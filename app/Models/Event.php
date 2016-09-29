<?php namespace Intranet\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;


class Event extends Model
{
    //

	use SoftDeletes;
    use LastUpdatedTrait;
	
    protected $fillable = ['nombre', 'ubicacion', 'fecha', 'hroa', 'duracion', 'tipo', 'id_grupo'];
}
