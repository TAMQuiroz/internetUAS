<?php

namespace Intranet\Http\Controllers\Report;

use Illuminate\Http\Request;
use View;
use Session;
use Auth;
use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;
use Intranet\Models\Area;
use Intranet\Models\Investigator;
use Intranet\Models\Project;
use Intranet\Models\Teacher;
use Intranet\Models\Faculty;
use Intranet\Models\Status;
use Illuminate\Database\Eloquent\Collection;

class ReportController extends Controller
{
    //

    public function indexISA(){

    	$areas = Area::orderBy('nombre', 'asc')->lists('nombre', 'id')->toArray();
        $comboAreas = array(0 => "Seleccione ... ") + $areas;
    	$investigadores = null;
        $idArea = 0;
    	$data = ['comboAreas' => $comboAreas,
    			 'investigadores' => $investigadores,
                 'idArea' => $idArea];
    	//$investigadores = Investigator::orderBy('nombre', 'asc')->get();

    	return view('reports.invByArea.index', $data);
    }

    public function generateISA(Request $request){
    	$idArea = $request['area'];
        if($idArea == 0){
            $investigadores = Investigator::orderBy('nombre', 'asc')->get();
        }
        else{
            $investigadores = Investigator::where('id_area',$idArea)->orderBy('nombre', 'asc')->get();    
        }
		$areas = Area::orderBy('nombre', 'asc')->lists('nombre', 'id')->toArray();
        $comboAreas = array(0 => "Seleccione ... ") + $areas;
    	$data = ['comboAreas' => $comboAreas,
    			 'investigadores' => $investigadores,
                 'idArea' => $idArea];
		//indexISA($investigadores);    	
		//return redirect()->route('reporteISA.index')->with($data);
    	return view('reports.invByArea.index', $data);
    }

    public function show($id)
    {
        $investigador     = Investigator::find($id);

        $data = [
            'investigador'    =>  $investigador,
        ];

        return view('reports.invByArea.show', $data);
    }

    public function indexISP(){

    	$especialidades = Faculty::orderBy('Nombre', 'asc')->lists('Nombre', 'IdEspecialidad')->toArray();
        $comboEspecialidades = array(0 => "Seleccione ... ") + $especialidades;
        $proyectos = Project::get();
        //$investigadores = Investigator::orderBy('nombre', 'asc')->get();
        //$profesores = Teacher::orderBy('nombre', 'asc')->get();
        $investigadores = null;
        $profesores = null;
        $idEsp = 0;
        $minProj = $this->minProyectos();
        $maxProj = $this->maxProyectos();
        $estadosP = Status::orderBy('nombre', 'asc')->where('tipo_estado', 0)->lists('nombre', 'id')->toArray();
        $comboEstadosP = array(0 => "Seleccione ... ") + $estadosP;
        $estadoP = 0;    
    	$data = ['comboEspecialidades' => $comboEspecialidades,
                 'proyectos' => $proyectos,
                 'investigadores' => $investigadores,
                 'profesores' => $profesores,
                 'idEsp' => $idEsp,
                 'minP' => $minProj,
                 'maxP' => $maxProj,
                 'comboEstadosP' => $comboEstadosP,
                 'estadoP' => $estadoP];
    	return view('reports.invByProject.index', $data);
    }

    public function generateISP(Request $request){
        $idEsp = $request['especialidad'];
        $esp = Faculty::where('IdEspecialidad', $idEsp)->get();
        $especialidades = Faculty::orderBy('Nombre', 'asc')->lists('Nombre', 'IdEspecialidad')->toArray();
        $comboEspecialidades = array(0 => "Seleccione ... ") + $especialidades;
        $proyectos = Project::get();
        $estadosP = Status::orderBy('nombre', 'asc')->where('tipo_estado', 0)->lists('nombre', 'id')->toArray();
        $comboEstadosP = array(0 => "Seleccione ... ") + $estadosP;
        $estadoP = $request['proyectoEstado'];
        if($idEsp == 0){
            $investigadores = Investigator::orderBy('nombre', 'asc')->get();
            $profesores = Teacher::orderBy('nombre', 'asc')->get();
        }
        else{
            $minP = $request['minProyectos'];
            $maxP = $request['maxProyectos'];
            $investigadorList = Investigator::where('id_especialidad', $idEsp)->get();
            $profesorList = Teacher::where('IdEspecialidad', $idEsp)->get();
            $investigadores = new Collection;
            $profesores = new Collection;
            foreach($investigadorList as $investigador){
                if (count($investigador->projects)>= $minP && count($investigador->projects) <= $maxP){
                    $investigadores->add($investigador);
                }
            }
            foreach($profesorList as $profesor){
                if (count($profesor->projects)>= $minP && count($profesor->projects) <= $maxP){
                    $profesores->add($profesor);
                }
            }
            
        }

        $minProj = $this->minProyectos();
        $maxProj = $this->maxProyectos();
        
        $data = ['comboEspecialidades' => $comboEspecialidades,
                 'proyectos' => $proyectos,
                 'investigadores' => $investigadores,
                 'profesores' => $profesores,
                 'idEsp' => $idEsp,
                 'minP' => $minProj,
                 'maxP' => $maxProj,
                 'estadoP' => $estadoP,
                 'comboEstadosP' => $comboEstadosP];
        return view('reports.invByProject.index', $data);
    }
    protected function minProyectos(){
        $min = PHP_INT_MAX;
        $investigadores = Investigator::get();
        $profesores = Teacher::get();
        foreach($investigadores as $investigador){
            if (count($investigador->projects) < $min){
                $min = count($investigador->projects);
            }
        }
        foreach($profesores as $profesor){
            if (count($profesor->projects) < $min){
                $min = count($profesor->projects);
            }
        }

        for ($i = 0; $i <= $min; ++$i) {
            $combiMinP[] = $i;
        }
        return $combiMinP;
    }

    protected function maxProyectos(){
        $max = 0;
        $investigadores = Investigator::get();
        $profesores = Teacher::get();
        foreach($investigadores as $investigador){
            if (count($investigador->projects) > $max){
                $max = count($investigador->projects);
            }
        }
        foreach($profesores as $profesor){
            if (count($profesor->projects) > $max){
                $max = count($profesor->projects);
            }
        }
        
        for ($i = 0; $i <= $max; ++$i) {
            $combiMaxP[] = $i;
        }
        return $combiMaxP;
    }
}
