<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfilexPermission extends Model
{
     use SoftDeletes;
     use LastUpdatedTrait;

    protected $table = 'PerfilxAccion';
    protected $primaryKey = 'IdPerfilxAccion';
    protected $fillable = ['IdPerfil', 'IdAccion'];

    public function permission(){
        return $this->belongsTo('Intranet\Models\Permission', 'IdAccion');
    }

    public function profile(){
        return $this->belongsTo('Intranet\Models\Profile', 'IdPerfil');
    }
}


