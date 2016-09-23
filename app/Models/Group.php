<?php namespace Intranet\Models;


use DB;
use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{

	use SoftDeletes;
    use LastUpdatedTrait;

    protected $fillable = ['nombre', 'id_especialidad', 'descripcion', 'id_lider'];

    public function faculty(){
  	  return $this->belongsTo('Intranet\Models\Faculty', 'id_especialidad');
    }

    public function leader(){
  	  return $this->belongsTo('Intranet\Models\Teacher', 'id_lider');
    }

}
