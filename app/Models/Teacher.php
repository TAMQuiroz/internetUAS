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

    public function tutorships(){
        return $this->hasMany('Intranet\Models\Tutorship','id_tutor');
    }

    
    public function projects(){
        return $this->belongsToMany('Intranet\Models\Project','teacherxprojects','id_profesor','id_proyecto')->withPivot('id');   
    }

    static public function getTutorsFiltered($filters, $specialty) {

        $query = Teacher::where('IdEspecialidad', $specialty);

        if(!array_key_exists("estado", $filters)){
            $query = $query->where('rolTutoria', 1);
        }
        elseif ( $filters["estado"] != "") {
            $query = $query->where('rolTutoria', $filters["estado"]);
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

    static public function getCoordsFiltered($filters, $specialty) {

        $query = Teacher::where('rolTutoria',null)->where('IdEspecialidad',$specialty);
     
        
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

    static public function getCoordsEvFiltered($filters, $specialty) {
        
        $query = Teacher::where('rolEvaluaciones',null)->where('IdEspecialidad',$specialty);
        
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

    public function evaluaciones(){
        return $this->belongsToMany('Intranet\Models\Tutstudentxevaluation','teacherxtutstudentxevaluations','id_tutstudentxevaluation','id_docente');
    }
    
    public function pspProcesses(){
        return $this->hasMany('Intranet\Models\PspProcessxTeacher', 'IdDocente');
    }

    public function groups(){
        return $this->hasMany('Intranet\Models\Group','id_lider');
    }

}