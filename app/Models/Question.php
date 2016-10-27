<?php

namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//<-------------------------------necesario para softdeletes

class Question extends Model
{
	use softDeletes;
    // protected $fillable = ['nombre','descripcion'];

    public function responsable(){
  	  return $this->belongsTo('Intranet\Models\Teacher', 'id_docente');
    }

    public function alternativas(){
  	  return $this->hasMany('Intranet\Models\Alternative','id_question');
    }

    public function competencia(){
  	  return $this->belongsTo('Intranet\Models\Competence','id_competence');
    }

    public function especialidad(){
  	  return $this->belongsTo('Intranet\Models\Teacher','id_especialidad');
    }

    static public function getQuestionsFiltered($filters, $specialty) {        
        
        $query = Question::where('id_especialidad',$specialty);

        if (array_key_exists("tipo", $filters) && $filters["tipo"] != "") {
            $query = $query->where("tipo", $filters["tipo"]);
        }

        if (array_key_exists("dificultad", $filters) && $filters["dificultad"] != "") {
            $query = $query->where("dificultad", $filters["dificultad"]);
        }

        if (array_key_exists("competencia", $filters) && $filters["competencia"] != "") {
            $query = $query->where("id_competence",$filters["competencia"]);
        }

        return $query->paginate(10);

    }
}
