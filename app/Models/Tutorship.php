<?php

namespace Intranet\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//<-------------------------------necesario para softdeletes

class Tutorship extends Model
{
    use SoftDeletes;//delete logico

    // protected $fillable = ['id_suplente','id_profesor'];

    // public function student(){
  	 //  return $this->belongsTo('Intranet\Models\Tutstudent','id_tutoria');
    // }

    public function tutor(){
  	  return $this->belongsTo('Intranet\Models\Teacher', 'id_tutor');
    }

    public function student() {
        return $this->belongsTo(Tutstudent::class, 'id_alumno');
    }

    static function getAssignedStudents($filters, $mayor, $tutor = null) {
        $query = Tutorship::query();

        if($tutor) {
            $query = $query->where("id_tutor", $tutor);
        }

        $students = $query->with(['student' => function($query) use($filters, $mayor) {
                if($mayor) {
                   $query = $query->where("id_especialidad", $mayor);
                }

                if($filters["code"] != "") {
                    $query  = $query->where("codigo", $filters["code"]);
                }

                if($filters["name"] != "") {
                    $query = $query->where("nombre", "like", "%" . $filters["name"] . "%");
                } 

                if($filters["lastName"] != "") {
                    $query = $query->where("ape_paterno", "like", "%" . $filters["lastName"] . "%");
                }

                if($filters["secondLastName"] != "") {
                    $query = $query->where("ape_materno", "like", "%" . $filters["secondLastName"] . "%");
                }
            }]);

        return $query->paginate(10);
    }
}
