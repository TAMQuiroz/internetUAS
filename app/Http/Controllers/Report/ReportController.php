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
    	$data = ['comboEspecialidades' => $comboEspecialidades,
                 'proyectos' => $proyectos,
                 'investigadores' => $investigadores,
                 'profesores' => $profesores,
                 'idEsp' => $idEsp];
    	return view('reports.invByProject.index', $data);
    }

    public function generateISP(Request $request){
        $idEsp = $request['especialidad'];
        $esp = Faculty::where('IdEspecialidad', $idEsp)->get();
        $especialidades = Faculty::orderBy('Nombre', 'asc')->lists('Nombre', 'IdEspecialidad')->toArray();
        $comboEspecialidades = array(0 => "Seleccione ... ") + $especialidades;
        $proyectos = Project::get();
        if($idEsp == 0){
            $investigadores = Investigator::orderBy('nombre', 'asc')->get();
            $profesores = Teacher::orderBy('nombre', 'asc')->get();
        }
        else{
            $investigadores = Investigator::where('id_especialidad', $idEsp)->orderBy('nombre', 'asc')->get();
            $profesores = Teacher::where('IdEspecialidad', $idEsp)->orderBy('nombre', 'asc')->get();
        }
        
        $data = ['comboEspecialidades' => $comboEspecialidades,
                 'proyectos' => $proyectos,
                 'investigadores' => $investigadores,
                 'profesores' => $profesores,
                 'idEsp' => $idEsp];
        return view('reports.invByProject.index', $data);
    }
}
