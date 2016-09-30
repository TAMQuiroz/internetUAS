<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class PspGroup extends Model{
	use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'pspgroups';
    protected $primaryKey = 'id';
    protected $fillable = ['numero','descripcion'];
}