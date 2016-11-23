<?php

namespace Intranet\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Reason extends Model{
    
    protected $table = 'reasons';
    protected $primaryKey = 'id';
    protected $fillable = ['tipo', 
                            'nombre'];
    
    public function tutmeetings(){
        return $this->hasMany('Intranet\Models\TutMeeting','id_reason');//bien
    }
}
