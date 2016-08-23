<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;
    use LastUpdatedTrait;
    
    protected $table = 'Perfil';
    protected $primaryKey = "IdPerfil";
    protected $fillable = ['Nombre', 'Descripcion'];

    public function profilexPermission(){
        return $this->hasMany('Intranet\Models\ProfilexPermission', 'IdPerfilxAccion');
    }

    public function user(){
        return $this->hasMany('Intranet\Models\User', 'IdUsuario');
    }
}