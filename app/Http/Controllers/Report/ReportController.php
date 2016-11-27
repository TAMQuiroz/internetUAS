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

use PDF;
use Barryvdh\Snappy;


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
        $estadosProyecto = Status::where('tipo_estado',0)->orderBy('Nombre', 'asc')->lists('nombre', 'id')->toArray();
        $comboEstados = array(0 => "Seleccione ... ") + $estadosProyecto;
        $areas = Area::orderBy('nombre', 'asc')->lists('nombre', 'id')->toArray();
        $comboAreasP = array(0 => "Seleccione ... ") + $areas;
        //$investigadores = Investigator::orderBy('nombre', 'asc')->get();
        //$profesores = Teacher::orderBy('nombre', 'asc')->get();
        $investigadores = null;
        $profesores = null;
        $idEsp = 0;
        $idEstado = 0;
        $minP = -1;
        $maxP = -1;
        $idAreaP = 0;
        //$comboMinP = $this->minProyectos();
        $comboMinP = $this->maxProyectos();
        $comboMaxP = $this->maxProyectos();
        $opcion = "No";
        $fechaI = null;
        $fechaF = null;
    	$data = ['comboEspecialidades' => $comboEspecialidades,
                 'proyectos' => $proyectos,
                 'investigadores' => $investigadores,
                 'profesores' => $profesores,
                 'idEsp' => $idEsp,
                 'comboMinP' => $comboMinP,
                 'comboMaxP' => $comboMaxP,
                 'idEstado' => $idEstado,
                 'comboEstados' => $comboEstados,
                 'minP' => $minP,
                 'maxP' => $maxP,
                 'opcion' => $opcion,
                 'idAreaP' => $idAreaP,
                 'comboAreasP' => $comboAreasP,
                 'fechaIni' => $fechaI,
                 'fechaFin' => $fechaF];

    	return view('reports.invByProject.index', $data);
    }

    public function generateISP(Request $request){
        $idEsp = $request['especialidad'];
        $esp = Faculty::where('IdEspecialidad', $idEsp)->get();
        $especialidades = Faculty::orderBy('Nombre', 'asc')->lists('Nombre', 'IdEspecialidad')->toArray();
        $comboEspecialidades = array(0 => "Seleccione ... ") + $especialidades;
        $proyectos = Project::get();
        //$comboMinP = $this->minProyectos();
        $comboMinP = $this->maxProyectos();
        $comboMaxP = $this->maxProyectos();
        $idEstado = $request['estadoP'];
        $estadosProyecto = Status::where('tipo_estado',0)->orderBy('Nombre', 'asc')->lists('nombre', 'id')->toArray();
        $comboEstados = array(0 => "Seleccione ... ") + $estadosProyecto;
        $minP = $request['minProyectos'];
        $maxP = $request['maxProyectos'];
        $opcion = $request['radio'];
        $idAreaP = $request['areaP'];
        $areas = Area::orderBy('nombre', 'asc')->lists('nombre', 'id')->toArray();
        $comboAreasP = array(0 => "Seleccione ... ") + $areas;
        $fechaI = $request['fechaI'];
        $fechaF = $request['fechaF'];

        if ($opcion == "Si"){
            $investigadores = Investigator::orderBy('nombre', 'asc')->get();
            $profesores = Teacher::orderBy('nombre', 'asc')->get();
            $idEsp = 0;
            $idEstado = 0;
            $minP = -1;
            $maxP = -1;
            $idAreaP = 0;
            //$comboMinP = $this->minProyectos();
            $opcion = "Si";
            $fechaI = null;
            $fechaF = null;
        }
            else{
                if($minP == -1 && $maxP == -1){
                    if($idEsp == 0){
                        $investigadores = Investigator::orderBy('nombre', 'asc')->get();
                        $profesores = Teacher::orderBy('nombre', 'asc')->get();
                    }else{
                        $investigadores = Investigator::where('id_especialidad', $idEsp)->orderBy('nombre', 'asc')->get();
                        $profesores = Teacher::where('IdEspecialidad', $idEsp)->orderBy('nombre', 'asc')->get();    
                    }
                    
                }
                elseif($minP != -1 && $maxP != -1){
                    if($minP<=$maxP){
                        if($idEsp == 0){
                            $investigadorList = Investigator::get();
                            $profesorList = Teacher::get();
                        }else{
                            $investigadorList = Investigator::where('id_especialidad', $idEsp)->oget();
                            $profesorList = Teacher::where('id_especialidad', $idEsp)->oget();
                        }
                        $investigadores = new Collection;
                        $profesores = new Collection;
                        foreach($investigadorList as $investigador){
                            $numP = count($investigador->projects);
                            if($numP >= $minP && $numP <= $maxP){
                                $investigadores->add($investigador);
                            }
                        }
                        foreach($profesorList as $profesor){
                            $numP = count($profesor->projects);
                            if($numP >= $minP && $numP <= $maxP){
                                $profesores->add($profesor);
                            }
                        }    
                    }
                    else{
                        return redirect()->back()->with('warning', 'Debe seleccionar un rango adecuado');    
                    }
                    
                }
                elseif (($minP==-1 && $maxP!=-1) || ($minP!=-1 && $maxP==-1)) {
                    return redirect()->back()->with('warning', 'Debe seleccionar un rango completo de numero de proyectos');
                }
                
                if (($fechaI == null && $fechaF != null) || ($fechaI !=null && $fechaF == null)){
                    return redirect()->back()->with('warning', 'Debe seleccionar un rango adecuado de fechas');   
                }

            }

        $data = ['comboEspecialidades' => $comboEspecialidades,
                 'proyectos' => $proyectos,
                 'investigadores' => $investigadores,
                 'profesores' => $profesores,
                 'idEsp' => $idEsp,
                 'comboMinP' => $comboMinP,
                 'comboMaxP' => $comboMaxP,
                 'idEstado' => $idEstado,
                 'comboEstados' => $comboEstados,
                 'minP' => $minP,
                 'maxP' => $maxP,
                 'opcion' => $opcion,
                 'idAreaP' => $idAreaP,
                 'comboAreasP' => $comboAreasP,
                 'fechaIni' => $fechaI,
                 'fechaFin' => $fechaF];

        return view('reports.invByProject.index', $data);
    }

    public function generarPDF(){
        $especialidades = Faculty::orderBy('Nombre', 'asc')->lists('Nombre', 'IdEspecialidad')->toArray();
        $comboEspecialidades = array(0 => "Seleccione ... ") + $especialidades;
        $proyectos = Project::get();
        $estadosProyecto = Status::where('tipo_estado',0)->orderBy('Nombre', 'asc')->lists('nombre', 'id')->toArray();
        $comboEstados = array(0 => "Seleccione ... ") + $estadosProyecto;
        //$investigadores = Investigator::orderBy('nombre', 'asc')->get();
        //$profesores = Teacher::orderBy('nombre', 'asc')->get();
        $investigadores = null;
        $profesores = null;
        $idEsp = 0;
        $idEstado = 0;
        $minP = -1;
        $maxP = -1;
        $comboMinP = $this->minProyectos();
        $comboMaxP = $this->maxProyectos();
        $opcion = "No";
        $areas = Area::orderBy('nombre', 'asc')->lists('nombre', 'id')->toArray();
        $comboAreasP = array(0 => "Seleccione ... ") + $areas;
        $idAreaP = 0;
        $data = ['comboEspecialidades' => $comboEspecialidades,
                 'proyectos' => $proyectos,
                 'investigadores' => $investigadores,
                 'profesores' => $profesores,
                 'idEsp' => $idEsp,
                 'comboMinP' => $comboMinP,
                 'comboMaxP' => $comboMaxP,
                 'idEstado' => $idEstado,
                 'comboEstados' => $comboEstados,
                 'minP' => $minP,
                 'maxP' => $maxP,
                 'opcion' => $opcion,
                 'idAreaP' => $idAreaP,
                 'comboAreasP' => $comboAreasP];
        $pdf = PDF::loadView('reports.invByProject.index', $data);
        return $pdf->download('pruebapdf.pdf');
    }

    protected function minProyectos(){
        $min = PHP_INT_MAX;
        $investigadores = Investigator::get();
        $profesores = Teacher::get();
        foreach($investigadores as $investigador){
            $aux = count($investigador->projects);
            if ($aux < $min){
                $min = $aux;
            }
        }

        foreach($profesores as $profesor){
            $aux = count($profesor->projects);
            if ($aux < $min){
                $min = $aux;
            }
        }

        for ($i=0; $i<=$min; $i++){
            $minProyectos[] = $i;
        }
        $comboMin = array(-1 => "") + $minProyectos;
        return $comboMin;
    }

    protected function maxProyectos(){
        $max = 0;
        $investigadores = Investigator::get();
        $profesores = Teacher::get();
        foreach($investigadores as $investigador){
            $aux = count($investigador->projects);
            if ($aux > $max){
                $max = $aux;
            }
        }

        foreach($profesores as $profesor){
            $aux = count($profesor->projects);
            if ($aux > $max){
                $max = $aux;
            }
        }

        for ($i=0; $i<=$max; $i++){
            $maxProyectos[] = $i;
        }
        $comboMax = array(-1=> "") + $maxProyectos;
        return $comboMax;
    }
}
