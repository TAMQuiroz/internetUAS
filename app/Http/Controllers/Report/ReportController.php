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

class ReportController extends Controller
{
    //

    public function indexISA(){

    	$areas = Area::orderBy('nombre', 'asc')->lists('nombre', 'id');
    	$investigadores = null;
    	$data = ['areas' => $areas,
    			 'investigadores' => $investigadores];
    	//$investigadores = Investigator::orderBy('nombre', 'asc')->get();

    	return view('reports.invByArea.index', $data);
    }

    public function generateISA(Request $request){
    	$area = $request['area'];
		$investigadores = Investigator::where('id_area',$area)->orderBy('nombre', 'asc')->get();
		$areas = Area::orderBy('nombre', 'asc')->lists('nombre', 'id');
    	$data = ['areas' => $areas,
    			 'investigadores' => $investigadores];
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

    	$proyectos = Project::get();
    	$data = ['proyectos' => $proyectos];
    	return view('reports.invByProject.index', $data);
    }
}
