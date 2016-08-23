<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coordinator extends Model {
    use SoftDeletes;

	protected $table = 'Coordinador';
	protected $primaryKey = 'IdDocente';
	protected $fillable = ['Correo', 'Nombre', 'ApellidoPaterno', 'ApellidoMaterno'];
}