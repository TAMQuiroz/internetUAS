<?php 

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class PspProcessxSupervisor extends Model{
	
	use SoftDeletes;
	use LastUpdatedTrait;
	        
    protected $table = 'pspprocessesxsupervisors';
   
}