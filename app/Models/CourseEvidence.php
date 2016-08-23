<?php namespace Intranet\Models;

use Intranet\Models\Fileentry;
use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseEvidence extends Model {
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'EvidenciaCurso';
    protected $primaryKey = 'IdEvidenciaCurso';
    protected $fillable = ['IdArchivoEntrada', 'IdHorario','Nombre','Descripcion'];

    protected $appends = ['file_url', 'file_name'];

    protected $dates = ['deleted_at'];

    public function measurementSource(){
        return $this->belongsTo('Intranet\Models\MeasurementSource','IdFuenteMedicion');
    }

    public function course(){
        return $this->belongsTo('Intranet\Models\Course', 'IdCurso');
    }

    public function criterion()
    {
        return $this->belongsTo('Intranet\Models\Criterion', 'IdCriterio');
    }

    public function cycle(){
        return $this->belongsTo('Intranet\Models\Cicle', 'IdCicloAcademico');
    }

    public function getFileUrlAttribute()
    {
        $file = Fileentry::where('IdArchivoEntrada', $this->IdArchivoEntrada)->first();
        if ($file)
            return route('getDownload.evidences', $file->filename);

        return null;
    }
    public function getFileNameAttribute()
    {
        $file = Fileentry::where('IdArchivoEntrada', $this->IdArchivoEntrada)->first();
        if ($file)
            return $file->original_filename;

        return '';
    }

}