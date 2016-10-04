<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function area(){
        return $this->belongsTo('Intranet\Models\Area', 'id_area');
    }

    public function grupo(){
        return $this->belongsTo('Intranet\Models\Group', 'id_grupo');
    }

    public function status(){
        return $this->belongsTo('Intranet\Models\Status', 'id_status');
    }
}
