<?php namespace Intranet\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model {

    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'Curso';
    protected $primaryKey = "IdCurso";
    protected $fillable = ['Nombre', 'Codigo', 'NivelAcademico', 'IdEspecialidad', 'Especialidad_p'];
    protected $appends = ['schedules'];

    public function courses(){
        return $this->hasMany(Course::class, 'IdCurso');
    }

    public function semesters()
    {
        return $this->belongsToMany(Cicle::class, 'CursoxCiclo', 'IdCurso', 'IdCicloAcademico');
    }

    public function regularProfessors()
    {
        return $this->belongsToMany(Teacher::class, 'CursoxDocente', 'IdCurso', 'IdDocente');
    }

    public function specialty(){
        return $this->belongsTo('Intranet\Models\Faculty', 'Especialidad_p');
    }

    public function faculty(){
        return $this->belongsTo('Intranet\Models\Faculty', 'IdEspecialidad');
    }

    public function getSchedulesAttribute(){

        $academicSemester = DB::table('CicloxEspecialidad')
            ->where('Vigente', 1)
            ->first();

        $semesterCourseRow = DB::table('CursoxCiclo')
            ->where('IdCurso', $this->IdCurso)
            ->where('IdCicloAcademico', $academicSemester->IdCicloAcademico)
            ->whereNull('deleted_at')
            ->first();

        if(! $semesterCourseRow) return [];

        $schedules = Schedule::where('IdCursoxCiclo', $semesterCourseRow->IdCursoxCiclo)
            ->whereNull('deleted_at')
            ->with('professors', 'courseEvidences')
            ->get();

        return $schedules;
    }

    public function contributions(){
        return $this->hasMany('Intranet\Models\Contribution', 'IdCurso');
    }

    public function studentsResults()
    {
        return $this->belongsToMany(StudentsResult::class, 'Aporte', 'IdCurso', 'IdResultadoEstudiantil')
            ->withTimestamps()->withPivot('Valor');
    }

    public function measurementSources(){
        return $this->belongsToMany('FuenteMedicion', 'FuentexCursoxCriterioxCiclo', 'IdCurso', 'IdFuenteMedicion');
    }
}