<?php

namespace Intranet;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;


class freeHour extends Model
{
    use SoftDeletes;
    use LastUpdatedTrait;
    protected $table = 'freehours';


}
