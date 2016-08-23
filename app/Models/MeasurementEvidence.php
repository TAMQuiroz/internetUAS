<?php namespace Intranet\Models;

use Intranet\Models\Fileentry;
use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeasurementEvidence extends Model {
    use SoftDeletes;
    use LastUpdatedTrait;

    protected $table = 'EvidenciaMedicion';
    protected $primaryKey = 'IdEvidenciaMedicion';
    protected $fillable = ['IdArchivoEntrada', 'IdHorario','IdFuentexCursoxCriterioxCiclo'];

    protected $appends = ['file_url', 'file_name'];

    protected $dates = ['deleted_at'];

    public function timetable(){
        return $this->belongsTo('Intranet\Models\TimeTable','IdHorario');
    }

    public function fuentexcursoxcriterioxciclo(){
        return $this->belongsTo('Intranet\Models\SourcexCoursexCriterionxCycle', 'IdFuentexCursoxCriterioxCiclo');
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