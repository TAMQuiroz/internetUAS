<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;

class PspGroup extends Model{
	
    protected $table = 'pspgroups';
    protected $primaryKey = 'id';
    protected $fillable = ['numero','descripcion'];
}