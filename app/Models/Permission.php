<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
	use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'Accion';
    protected $primaryKey = "IdAccion";
    protected $fillable = ['Nombre'];

    public function profilexPermission(){
        return $this->hasMany('Intranet\Models\ProfilexPermission', 'IdPerfilxAccion');
    }
}