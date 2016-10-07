<?php 
namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model {
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'Docente';
    protected $primaryKey = 'IdDocente';
    protected $fillable = ['IdEspecialidad', 
                            'IdUsuario',
                            'Codigo',
                            'Nombre', 
                            'ApellidoPaterno', 
                            'ApellidoMaterno', 
                            'Correo', 
                            'Vigente', 
                            'rolTutoria',
                            'rolEvaluaciones',
                            'oficina',
                            'telefono',
                            'anexo',
                            'Descripcion', 
                            'Cargo'];

    public function faculty(){
        return $this->belongsTo('Intranet\Models\Faculty', 'IdEspecialidad');
    }

    public function user(){
        return $this->belongsTo('Intranet\Models\User', 'IdUsuario');
    }

    public function cicle(){
        return $this->hasMany('Intranet\Models\Cicle', 'IdDocente');
    }

    public function schedules(){
        return $this->hasMany('Intranet\Models\TimeTablexTeacher','IdDocente');
    }

    public function tutorship(){
        return $this->hasMany('Intranet\Models\Tutorship','IdDocente');
    }

    static public function getTutorsFiltered($is_tutor, $filters, $specialty = null) {

        $is_tutor_value = $is_tutor ? 1 : null;

        $query = Teacher::where('rolTutoria', $is_tutor_value);
        
        if ($specialty) {
            $query = $query->where('IdEspecialidad', $specialty);
        }

        if (array_key_exists("name", $filters) && $filters["name"] != "") {
            $query = $query->where("Nombre", "like", "%" . $filters["name"] . "%");
        }

        if (array_key_exists("lastName", $filters) && $filters["lastName"] != "") {
            $query = $query->where("ApellidoPaterno", "like", "%" . $filters["lastName"] . "%");
        }

        if (array_key_exists("secondLastName", $filters) && $filters["secondLastName"] != "") {
            $query = $query->where("ApellidoMaterno", "like", "%" . $filters["secondLastName"] . "%");
        }

        return $query->paginate(10);

    }


}