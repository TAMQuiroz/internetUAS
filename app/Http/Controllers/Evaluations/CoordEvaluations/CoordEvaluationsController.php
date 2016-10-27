<?php

namespace Intranet\Http\Controllers\Evaluations\CoordEvaluations;

use Illuminate\Http\Request;
use Intranet\Http\Requests;
use Illuminate\Support\Facades\DB;
use Intranet\Http\Controllers\Controller;
use Intranet\Models\Teacher;
use Illuminate\Support\Facades\Session;//<---------------------------------necesario para usar session

class CoordEvaluationsController extends Controller
{
    
    public function index(Request $request)
    {
        
        $specialty = Session::get('faculty-code');
        $teachers = Teacher::where('rolEvaluaciones',1)->where('IdEspecialidad',$specialty)->get();

        $data = [            
            'teachers'    =>  $teachers,
        ];
        return view('evaluations.coordevaluations.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $filters = $request->all();
        $specialty = Session::get('faculty-code');        
        $teachers = Teacher::getCoordsEvFiltered($filters, $specialty);        
        $data = [
            'teachers'    =>  $teachers->appends($filters),            
        ];        
        return view('evaluations.coordevaluations.create', $data);
    }

    

    public function store(Request $request){

        if($request['check']!=null){
            foreach($request['check'] as $idTeacher => $value){
                try {
                //se cambia el rol del profesor a ADMINISTRADOR DE EVALUACIONES
                    DB::table('Docente')->where('IdDocente', $idTeacher)->update(['rolEvaluaciones' => 1]);
                } catch (Exception $e) {
                    return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
                }
            }
        //VUELVE A la lista de coordinadores
            return redirect()->route('coordinadorEvaluaciones.index')->with('success', 'Se guardaron los administradores exitosamente');
        }
        else{
            return redirect()->route('coordinadorEvaluaciones.index');
        }

    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        try {
            DB::table('Docente')->where('IdDocente', $id)->update(['rolEvaluaciones' => null]);
            return redirect()->route('coordinadorEvaluaciones.index')->with('success', 'Se desactivó al administrador exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
        
    }
}
