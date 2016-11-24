<?php 

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pspstudentsxcriterios extends Model{

	use SoftDeletes;

    protected $table = 'pspstudentsxcriterios';
    protected $primaryKey = "id";
    protected $fillable = ['idpspstudent', 'idcriterio', 'nota'];

    public function pspcriterio(){
        return $this->belongsTo('Intranet\Models\Pspcriterio', 'idcriterio');
    }

    public function pspStudent(){
        return $this->belongsTo('Intranet\Models\PspStudent', 'idpspstudent');
    }

}