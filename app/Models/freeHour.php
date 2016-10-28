<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;


class FreeHour extends Model
{
    use SoftDeletes;
    use LastUpdatedTrait;
    protected $table = 'freehours';

	public function supervisor()    {
		return $this->belongsTo('Intranet\Models\Supervisor','idSupervisor');
	}
}
