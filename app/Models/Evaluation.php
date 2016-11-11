<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluation extends Model
{
	use softDeletes;
    protected $fillable = ['fecha_inicio','fecha_fin','nombre','descripcion','tiempo'];

    public function especialidad(){
  	  return $this->belongsTo('Intranet\Models\Teacher','id_especialidad');
    }

    public function preguntas(){
  	  return $this->hasMany('Intranet\Models\Evquestion','id_evaluation');
    }

    static public function getEvaluationsFiltered($filters, $specialty) {  

    	$query = Evaluation::where('id_especialidad',$specialty)->orderBy('updated_at', 'desc');        
        
        if (array_key_exists("nombre", $filters) && $filters["nombre"] != "") {
            $query = $query->where("nombre", "like", "%" . $filters["nombre"] . "%");
        }        

        if (array_key_exists("estado", $filters) && $filters["estado"] != "") {
            $query = $query->where("estado",$filters["estado"]);
        }

        return $query->paginate(10);

    }

    static public function getEvaluationsFilteredMobile($filters, $specialty) {  

        $query = Evaluation::where('id_especialidad',$specialty)->orderBy('updated_at', 'desc');        
        
        if (array_key_exists("nombre", $filters) && $filters["nombre"] != "") {
            $query = $query->where("nombre", "like", "%" . $filters["nombre"] . "%");
        }        

        if (array_key_exists("estado", $filters) && $filters["estado"] != "") {
            $query = $query->where("estado",$filters["estado"]);
        }

        return $query->get();

    }


}
