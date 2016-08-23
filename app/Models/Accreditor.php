<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accreditor extends Model
{
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'Acreditador';
    protected $primaryKey = 'IdAcreditador';
    protected $fillable = ['IdEspecialidad', 'IdUsuario', 'Nombre', 'ApellidoPaterno', 'ApellidoMaterno', 'Correo', 'Vigente'];

    public function faculty(){
        return $this->belongsTo('Intranet\Models\Faculty', 'IdEspecialidad');
    }

	public function user(){
		return $this->belongsTo('Intranet\Models\User', 'IdUsuario');
	}
}
