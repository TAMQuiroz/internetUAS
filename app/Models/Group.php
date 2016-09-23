<?php namespace Intranet\Models;


use DB;
use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{

	use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'groups';
    protected $primaryKey = "id";
    protected $fillable = ['nombre', 'id_especialidad', 'descripcion', 'id_lider'];


}
