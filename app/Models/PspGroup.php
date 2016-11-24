<?php namespace Intranet\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PspGroup extends Model{
	    
	use SoftDeletes;    
	protected $table = 'pspgroups';
    protected $primaryKey = 'id';
    protected $fillable = ['numero','descripcion'];


       
    
}