<?php

namespace Intranet\Models;

use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    use LastUpdatedTrait;

    /**The attributes that are mass assignable.
     * @var array*/

    protected $fillable = ['Usuario', 'Contrasena','IdPerfil'];

    /**The attributes that should be hidden for arrays.
     * @var array*/
    protected $hidden = ['Contrasena'];

    protected $table = 'Usuario';
    protected $primaryKey = 'IdUsuario';

    public function getRememberTokenName()
    {
     return null; // not supported
    }

    public function isAdmin()
    {
        return $this->IdPerfil == 3;
    }

    public function isAcreditor()
    {
        return $this->IdPerfil == 4;
    }

    public function isGeneralAcreditor()
    {
        return $this->IdPerfil == 5;
    }

    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute){
            parent::setAttribute($key, $value);
        }
    }

    public function professor(){
        return $this->hasOne('Intranet\Models\Teacher', 'IdUsuario');//estaba mal, decia IdDocente
    }


    /*Movil profesor*/
    public function teacher(){
        return $this->hasOne('Intranet\Models\Teacher', 'IdUsuario');
    }

    /*Movil investigador*/
    public function investigator(){
        return $this->hasOne('Intranet\Models\Investigator','id_usuario');

    }

    public function accreditor(){
        return $this->hasOne('Intranet\Models\Accreditor', 'IdUsuario');
    }

    public function profile(){
        return $this->belongsTo('Intranet\Models\Profile', 'IdPerfil');
    }

}

