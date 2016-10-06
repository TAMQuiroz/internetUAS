<?php

namespace Intranet\Http\Controllers\Tutorship\Tutor;

use Illuminate\Http\Request;
use Intranet\Http\Requests;
use Illuminate\Support\Facades\DB;
use Intranet\Http\Controllers\Controller;
use Intranet\Models\Teacher;
use Illuminate\Support\Facades\Session;//<---------------------------------necesario para usar session

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        // dd(Session::get('faculty-code'));
        // dd(Session::all());
        // dd(Session::get('user'));
        


        $idEspecialidad = Session::get('faculty-code');
        $tutors = Teacher::get()->where('rolTutoria', 1)->where('IdEspecialidad', $idEspecialidad);
        $data = [
            'tutors'    =>  $tutors,
        ];
        return view('tutorship.tutor.index', $data);
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idEspecialidad = Session::get('faculty-code');
        $teachers = Teacher::get()->where('rolTutoria', null)->where('IdEspecialidad', $idEspecialidad); //falta acotar por la especialidad      
        $checks = array($teachers->count());

        $data = [
            'teachers'    =>  $teachers,            
        ];        
        return view('tutorship.tutor.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if($request['check']!=null){
            foreach($request['check'] as $idTeacher => $value){
                try {
                //se cambia el rol del profesor a TUTOR
                    DB::table('Docente')->where('IdDocente', $idTeacher)->update(['rolTutoria' => 1]);

                } catch (Exception $e) {
                    return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
                }
            }
            return redirect()->route('tutor.index')->with('success', 'Se guardaron los tutores exitosamentee');
        }
        else{
            return redirect()->route('tutor.index');
        }        
        //VUELVE A la lista de tutores
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tutor = Teacher::find($id);
        $data = [
            'tutor'    =>  $tutor,
        ];
        return view('tutorship.tutor.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::table('docente')->where('IdDocente', $id)->update(['rolTutoria' => null]);
            return redirect()->route('tutor.index')->with('success', 'Se desactivó al tutor exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }        
        
    }
}
