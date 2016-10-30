<?php

namespace Intranet\Http\Controllers\Evaluations\Evaluator;

use Illuminate\Http\Request;
use Intranet\Http\Requests;
use Illuminate\Support\Facades\DB;
use Intranet\Http\Controllers\Controller;
use Intranet\Models\Teacher;
use Intranet\Models\Competence;
use Illuminate\Support\Facades\Session;//<---------------------------------necesario para usar session

class EvaluatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       $faculty = Session::get('faculty-code');
       $evaluators = DB::table('teacherxcompetences')->join('Docente', 'teacherxcompetences.id_docente', '=', 'Docente.IdDocente')->join('Especialidad', 'Docente.IdEspecialidad', '=', 'Especialidad.IdEspecialidad')->select('Docente.IdDocente as id','Docente.Nombre as nombre','Especialidad.Nombre as nombre_esp','Docente.ApellidoPaterno as app','Docente.ApellidoMaterno as apm','Docente.codigo as codigo','Docente.Correo as correo')->where('id_especialidad', $faculty)->distinct()->get();
       // dd($evaluators);
       $data = [            
            'evaluators'    =>  $evaluators,
       ];
       return view('evaluations.evaluator.index', $data);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialty = Session::get('faculty-code');
        $competences = Competence::where('id_especialidad',$specialty)->get();
        $data = [
            'competences'    =>  $competences,            
        ];

        return view('evaluations.evaluator.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request['idDocente']=="" || $request['arr_competencias'] == null){
            return redirect()->back()->with('warning', 'Elija una profesor y mínimo una competencia.');
        }
        try {
            $faculty = Session::get('faculty-code');            
            foreach ($request['arr_competencias'] as $key => $value) {
                DB::table('teacherxcompetences')->insert( ['id_docente' =>$request['idDocente'] , 
                    'id_competence' => $key,
                    'id_especialidad' => $faculty] );
            }
            DB::table('Docente')->where('IdDocente', $request['idDocente'])->update( ['rolEvaluaciones' => 2] ); 
            return redirect()->route('evaluador.index')->with('success', 'El evaluador se ha registrado exitosamente.');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $specialty = Session::get('faculty-code');
        $competences = Competence::where('id_especialidad',$specialty)->get();
        $relations = DB::table('teacherxcompetences')->where('id_docente',$id)->where('id_especialidad', $specialty)->get();
        $arrayRelations = array();
        foreach ($relations as $relation) {
            array_push($arrayRelations, $relation->id_competence);
        }

        $teacher = Teacher::find($id) ;
        $data = [
            'competences'    =>  $competences,//las competencias en general
            'teacher'        => $teacher,
            'arrayRelations'      => $arrayRelations,//las competencias que evalue
        ];
        // dd($arrayRelations);
        return view('evaluations.evaluator.edit', $data);
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
        if($request['nombre']=="" || $request['arr_competencias'] == null){
            return redirect()->back()->with('warning', 'Elija mínimo una competencia.');
        }
        $faculty = Session::get('faculty-code');
        try {
            //primero borrar las relaciones con todas competencias
            $evaluators = DB::table('teacherxcompetences')->where('id_docente',$id)->where('id_especialidad', $faculty)->delete();
              
            //crear las nuevas relaciones          
            foreach ($request['arr_competencias'] as $key => $value) {
                DB::table('teacherxcompetences')->insert( ['id_docente' =>$id , 
                    'id_competence' => $key,
                    'id_especialidad' => $faculty] );
            }             
            return redirect()->route('evaluador.index')->with('success', 'El evaluador se ha actualizado exitosamente.');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
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
            $faculty = Session::get('faculty-code');

            //borrar las relaciones con las competencias
            $evaluators = DB::table('teacherxcompetences')->where('id_docente',$id)->where('id_especialidad', $faculty)->delete();
            //dd($evaluators);
            DB::table('Docente')->where('IdDocente',$id)->update( ['rolEvaluaciones' => null] );
            
            return redirect()->route('evaluador.index')->with('success', 'El evaluador ha sido eliminado exitosamente'); 
        } catch (Exception $e) {
            return redirect()->route('evaluador.index')->with('warning', 'No se puede eliminar al Profesor');     
        }
        
    }
}
