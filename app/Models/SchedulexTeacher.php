<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Intranet\Models\Traits\LastUpdatedTrait;

class SchedulexTeacher extends Model{

    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = "HorarioxDocente";
    protected $primaryKey = "IdHorarioxDocente";

}