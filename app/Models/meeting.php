<?php namespace Intranet\Models;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Traits\LastUpdatedTrait;
use Illuminate\Database\Eloquent\SoftDeletes;


class meeting extends Model
{
    use SoftDeletes;
    use LastUpdatedTrait;
    protected $table = 'pspmeetings';

    public function supervisor(){
        return $this->belongsTo('Intranet\Models\Supervisor', 'idsupervisor');
    }

    public function student(){
    	return $this->belongsTo('Intranet\Models\Student','idstudent');
    }

    public function status(){
    	return $this->belongsTo('Intranet\Models\Status','idtipoestado');
    }

    static public function getFiltered($filters){
        $query = meeting::with('student','status')->orderBy('fecha','asc');
        //dd($filters);
        if(array_key_exists("nombre", $filters) && $filters["nombre"] != ""){                    
            $query = $query->whereHas('student',function ($q) use($filters){
                $q= $q->where('nombre','like','%'.$filters['nombre'].'%');
            });            
        }

        if(array_key_exists("apellidoPat", $filters) && $filters["apellidoPat"] != ""){                    
            $query = $query->whereHas('student',function ($q) use($filters){
                $q= $q->where('ApellidoPaterno','like','%'.$filters['apellidoPat'].'%');
            });            
        }

        if(array_key_exists("estado", $filters) && $filters["estado"] != ""){                    
            $query = $query->whereHas('status',function ($q) use($filters){
                $q= $q->where('nombre','like','%'.$filters['estado'].'%');
            });            
        }
        //dd($query);

        return $query->paginate(10);
    }
    
}
