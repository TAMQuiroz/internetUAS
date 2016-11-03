<?php 

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PspProcessxTeacher extends Model{

	use SoftDeletes;

    protected $table = 'pspprocessesxdocente';

}