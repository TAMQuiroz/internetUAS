<?php

namespace Intranet\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//<-------------------------------necesario para softdeletes
use Intranet\Http\Services\User\PasswordService;
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
  	  return $this->hasOne('Intranet\Models\Tutorship','id_alumno');//bien
    }

    public function evaluations(){
      return $this->hasMany('Intranet\Models\Tutstudentxevaluation','id_tutstudent');//bien
    }

    static public function loadStudents($csv_path, $mayor) {

        if (($csv_file = fopen($csv_path, "r")) !== FALSE ) {
            $headers = fgetcsv($csv_file);

            while (($row = fgetcsv($csv_file)) !== FALSE) {
                $student = Tutstudent::withTrashed()->where("codigo", $row[0])->first();
                
                if($student) {
                    $student->restore();
                } else {
                    $id_user = Tutstudent::createStudentUser($studentCode = $row[0], $email = $row[4]);

                    Tutstudent::create([
                        "codigo" => $row[0],
                        "nombre" => $row[1],
                        "ape_paterno" => $row[2],
                        "ape_materno" => $row[3],
                        "correo" => $row[4],
                        "id_especialidad" => $mayor,
                        "id_usuario" => $id_user,
                    ]);
                }
            }

        }else {
            throw new InvalidTutStudentException;
        }
    }

    static public function getFilteredStudents($filters, $tutor = null, $mayor = null) {
        $query = Tutstudent::query();

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

        if($tutor) {
            $query = $query->whereHas('tutorship', function($q) use($tutor) {
                $q = $q->where('id_tutor', $tutor);
            });
        }

        return $query->withTrashed()->paginate(10);
    }

    static function createStudentUser($studentCode, $email) {

        $passwordService = new PasswordService;

        $user = User::create([
                "Usuario" => $studentCode,
                "Contrasena" => bcrypt(123),
                "IdPerfil" => 0
            ]);

        if ($user) {
            $passwordService->sendSetPasswordLink($user, $email);
        }

        return $user->IdUsuario;
    }
}
