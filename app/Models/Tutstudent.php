<?php

namespace Intranet\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//<-------------------------------necesario para softdeletes
use Intranet\Exceptions\InvalidTutStudentException;

class Tutstudent extends Model
{
    use SoftDeletes;//delete logico

    protected $fillable = ['codigo','nombre','ape_paterno','ape_materno','correo', 'id_especialidad'];

    public function faculty(){
  	  return $this->belongsTo('Intranet\Models\Faculty', 'id_especialidad');
    }

    public function user(){
  	  return $this->belongsTo('Intranet\Models\User', 'id_usuario');
    }

    public function tutorship(){
  	  return $this->hasOne('Intranet\Models\Tutorship');
    }

    static public function loadStudents($csv_path, $mayor) {

        if (($csv_file = fopen($csv_path, "r")) !== FALSE ) {
            $headers = fgetcsv($csv_file);

            while (($row = fgetcsv($csv_file)) !== FALSE) {
                $student = Tutstudent::withTrashed()->where("codigo", $row[0])->first();
                
                if($student) {
                    $student->restore();
                } else {
                    Tutstudent::create([
                        "codigo" => $row[0],
                        "nombre" => $row[1],
                        "ape_paterno" => $row[2],
                        "ape_materno" => $row[3],
                        "correo" => $row[4],
                        "id_especialidad" => $mayor
                    ]);
                }
            }

        }else {
            throw new InvalidTutStudentException;
        }
    }
}
