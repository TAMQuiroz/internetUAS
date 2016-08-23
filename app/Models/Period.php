<?php namespace Intranet\Models;

use Intranet\Models\ConfFaculty;
use Intranet\Models\MeasurementSource;
use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Period extends Model
{
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'Periodo';
    protected $primaryKey = 'IdPeriodo';
    protected $fillable = ['IdEspecialidad','Vigente'];

    public function faculty()
    {
		return $this->belongsTo('Intranet\Models\Faculty', 'IdEspecialidad');
	}

    public function configuration()
    {
        return $this->hasOne(ConfFaculty::class, 'IdPeriodo');
    }

    public function measures()
    {
        return $this->belongsToMany(MeasurementSource::class, 'PeriodoxFuente', 'IdPeriodo', 'IdFuenteMedicion');
    }

	public function periodxResult()
    {
		return $this->hasMany('Intranet\Models\PeriodxResult', 'IdPeriodoxResultado');
	}

    public function educationalObjetives()
    {
        return $this->belongsToMany(EducationalObjetive::class, 'PeriodoxObjetivo', 'IdPeriodo', 'IdObjetivoEducacional')
            ->withTimestamps();
    }
    
    public function studentsResults()
    {
        return $this->belongsToMany(StudentsResult::class, 'PeriodoxResultado', 'IdPeriodo', 'IdResultadoEstudiantil')
            ->withTimestamps();
    }

    public function aspects()
    {
        return $this->belongsToMany(Aspect::class, 'PeriodoxAspecto', 'IdPeriodo', 'IdAspecto')
            ->withTimestamps();
    }

    public function criterions()
    {
        return $this->belongsToMany(Criterion::class, 'PeriodoxCriterio', 'IdPeriodo', 'IdCriterio')
            ->withTimestamps();
    }

    public function levels()
    {
        return $this->hasMany(CriterionLevel::class, 'IdPeriodo');
    }
}
