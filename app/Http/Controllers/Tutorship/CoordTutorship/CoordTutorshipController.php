<?php

namespace Intranet\Http\Controllers\Tutorship\CoordTutorship;

use Illuminate\Http\Request;
use Intranet\Http\Requests;
use Illuminate\Support\Facades\DB;
use Intranet\Http\Controllers\Controller;
use Intranet\Models\Teacher;
use Illuminate\Support\Facades\Session;//<---------------------------------necesario para usar session

class CoordTutorshipController extends Controller
{
    
    public function index()
    {
        $idEspecialidad = Session::get('faculty-code');
        $tutors = Teacher::where('rolTutoria', 2)->where('IdEspecialidad', $idEspecialidad)->get();
        $data = [
            'tutors'    =>  $tutors,
        ];
        return view('tutorship.coordtutor.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idEspecialidad = Session::get('faculty-code');
        $teachers = Teacher::where('rolTutoria', null)->where('IdEspecialidad', $idEspecialidad)->get();      
        $data = [
            'teachers'    =>  $teachers,            
        ];        
        return view('tutorship.coordtutor.create', $data);
    }

    

    public function store(Request $request){

        if($request['check']!=null){
            foreach($request['check'] as $idTeacher => $value){
                try {
                //se cambia el rol del profesor a COORDINADOR DE TUTORIA
                    DB::table('docente')->where('IdDocente', $idTeacher)->update(['rolTutoria' => 2]);
                } catch (Exception $e) {
                    return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
                }
            }
        //VUELVE A la lista de coordinadores
            return redirect()->route('coordinadorTutoria.index')->with('success', 'Se guardaron los coordinadores exitosamente');
        }
        else{
            return redirect()->route('coordinadorTutoria.index');
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
            DB::table('docente')->where('IdDocente', $id)->update(['rolTutoria' => null]);
            return redirect()->route('coordinadorTutoria.index')->with('success', 'Se desactivó al coordinador exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }        
        
    }
}
