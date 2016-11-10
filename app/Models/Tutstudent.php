<?php

namespace Intranet\Models;

use DB;
use Validator;
use Excel;
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

    public function tutmetings(){
      return $this->hasMany('Intranet\Models\TutMeeitng','id_tutstudent');//bien
    }    

    static public function loadStudents($csv_path, $mayor) {

        $excel_file = Excel::load($csv_path, function($reader){})->get();

        if (!empty($excel_file) && $excel_file->count()) {
            
            $count = 0;

            foreach ($excel_file as $row) {
                
                if ($count) {
                    $register = [
                        'codigo'    => $row[1],
                        'nombre'    => $row[2],
                        'app'       => $row[3],
                        'apm'       => $row[4],
                        'correo'    => $row[5],
                    ];

                    $validator = Validator::make($register, [
                        'codigo'        => 'required|digits:8',
                        'nombre'        => 'regex:/^[\pL\s\-]+$/u|required|max:50',
                        'app'           => 'regex:/^[\pL\s\-]+$/u|required|max:50',
                        'apm'           => 'regex:/^[\pL\s\-]+$/u|required|max:50',
                        'correo'        => 'required|email', 
                    ]);


                    if ($validator->fails()) {
                        $status     = [
                            'code'      => 1,
                            'message'   => 'El formato de los datos de la fila ' . $count . ' no es correcto',
                        ];

                        return $status;
                    }

                    Tutstudent::createTutStudent($register, $mayor);
                }
                
                $count += 1;
            }
            
            $status     = [
                'code'      => 2,
                'message'   => 'Los alumnos se han registrado exitosamente',
            ];
            return $status;
        
        } else {
            $status     = [
                'code'      => 3,
                'message'   => 'El archivo esta vacío',
            ];
            return $status;
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

    static public function createTutStudent($data, $mayorId) {

        $studentCode    = Tutstudent::withTrashed()->where('codigo', $data['codigo'])->first();

        $studentEmail   = Tutstudent::withTrashed()->where('correo', $data['correo'])->first();

        if ($studentCode && $studentCode->id_especialidad) {
            $studentCode->restore();
            return 1; //code already exist
        } else 
        if ($studentEmail && $studentEmail->id_especialidad) {
            $studentEmail->restore();
            return 2; //email already exist
        } else 
        if (($studentCode && !$studentCode->id_especialidad) ||
            ($studentEmail && !$studentEmail->id_especialidad)) {
            if ($studentCode) {
                $studentCode->restore();
                $studentCode->id_especialidad = $mayorId;
                $studentCode->save();
            } else {
                $studentEmail->restore();
                $studentEmail->id_especialidad = $mayorId;
                $studentEmail->save();
            }

            return 3; //id_especialidad were updated
        }

        $idUsuarioCreado = Tutstudent::createStudentUser($data['codigo'], $data['correo']);

        //ahora se crea el alumno
        $student = new Tutstudent;
        $student->codigo           = $data['codigo'];
        $student->nombre           = $data['nombre'];
        $student->ape_paterno      = $data['app'];
        $student->ape_materno      = $data['apm'];
        $student->correo           = $data['correo'];
        $student->id_especialidad  = $mayorId;
        $student->id_usuario       = $idUsuarioCreado;

        //se guarda en la tabla Alumnos
        $student->save();

        return 4;
        
    }

    static public function getQuantityPerTutor($quantityTutors, $quantityStudents) {
        
        $quantity = $quantityStudents / $quantityTutors;

        $quantity = ceil($quantity);

        $count = 0;

        $numberStudent = 0;

        $default = 0;

        $allQuantity = array();

        while ($numberStudent + $quantity <= $quantityStudents) {
            array_push($allQuantity, $quantity);

            $numberStudent += $quantity;

            $count += 1;
        }

        if ($quantityStudents - $numberStudent) {
            array_push($allQuantity, $quantityStudents - $numberStudent);

            $count += 1;
        }

        while ($count != $quantityTutors) {
            array_push($allQuantity, $default);

            $count += 1;
        }

        return $allQuantity;
    }

    static function createStudentUser($studentCode, $email) {

        $passwordService = new PasswordService;

        $user = User::create([
                "Usuario"       => $studentCode,
                "Contrasena"    => bcrypt(123),
                "IdPerfil"      => 0
            ]);

        if ($user) {
            $passwordService->sendSetPasswordLink($user, $email);
        }

        return $user->IdUsuario;
    }
}
