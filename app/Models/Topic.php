<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;


class Topic extends Model{
    
    protected $table = 'topics';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre'];
}
