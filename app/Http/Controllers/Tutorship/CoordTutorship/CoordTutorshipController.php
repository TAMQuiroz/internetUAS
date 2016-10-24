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
    
    public function index(Request $request)
    {
        $filters = $request->all();
        $specialty = Session::get('faculty-code');
        $coords = Teacher::getCoordsFiltered($is_coord = true, $filters, $specialty);

        $data = [            
            'tutors'    =>  $coords->appends($filters),
        ];
        return view('tutorship.coordtutor.index', $data);
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
        $teachers = Teacher::getCoordsFiltered($is_coord = false, $filters, $specialty);        
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
                    DB::table('Docente')->where('IdDocente', $idTeacher)->update(['rolTutoria' => 2]);
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
            DB::table('Docente')->where('IdDocente', $id)->update(['rolTutoria' => null]);
            return redirect()->route('coordinadorTutoria.index')->with('success', 'Se desactivó al coordinador exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
        
    }
}
