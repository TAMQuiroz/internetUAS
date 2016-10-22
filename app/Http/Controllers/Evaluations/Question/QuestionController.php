<?php

namespace Intranet\Http\Controllers\Evaluations\Question;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Http\Requests;
use Intranet\Models\Question;
use Intranet\Models\Competence;
use Intranet\Models\Alternative;
use Illuminate\Support\Facades\Session;//<---------------------------------necesario para usar session
// use Illuminate\Routing\Controller as BaseController;

class QuestionController extends Controller
{
    public function index()
    {
        
        $specialty = Session::get('faculty-code');        
        $questions = Question::where('id_especialidad',$specialty)->get();
        $data = [
        'questions'    =>  $questions,
        ];
        return view('evaluations.question.index', $data);
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
        return view('evaluations.question.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        try {
            $pregunta = new Question;            
            $pregunta->descripcion  = $request['descripcion'];
            $pregunta->id_especialidad= Session::get('faculty-code');
            $pregunta->tipo  = $request['tipo'];
            $pregunta->tiempo  = $request['tiempo'];
            $pregunta->puntaje  = $request['puntaje'];
            $pregunta->dificultad  = $request['dificultad'];
            $pregunta->requisito  = $request['requisitos'];
            $pregunta->id_docente  = Session::get('user')->IdDocente;
            $pregunta->id_competence  = $request['competencia'];

            if($request['tipo'] == 1){//si es pregunta cerrada, necesitamos las claves y respuesta
                $pregunta->rpta  = $request['rpta'];
            }
            else if ($request['tipo'] == 3){
                $pregunta->tamano_arch  = $request['tamanomax'];
                $pregunta->extension_arch  = $request['extension'];                
            }

            $pregunta->save();            

            if($request['tipo'] == 1){//si es pregunta cerrada, necesitamos las claves y respuesta
                //crear las claves
                foreach ($request['clave'] as $letra => $descripcion) {
                    $alternativa = new Alternative; 
                    $alternativa->letra = $letra;
                    $alternativa->descripcion = $descripcion;
                    $alternativa->id_question = $pregunta->id;
                    $alternativa->save();
                }                
            }
            
            return redirect()->route('pregunta.index')->with('success', 'La pregunta se ha registrado exitosamente');
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
        $question       = Question::find($id);
        $specialty = Session::get('faculty-code');
        $competences = Competence::where('id_especialidad',$specialty)->get();
        $data = [
        'question'      =>  $question,
        'competences'   =>  $competences,
        ];
        return view('evaluations.question.edit', $data);
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
       // dd($request);

       try {
        $pregunta = Question::find($id);                        
        $pregunta->descripcion  = $request['descripcion'];            
        $pregunta->tipo  = $request['tipo'];
        $pregunta->tiempo  = $request['tiempo'];
        $pregunta->puntaje  = $request['puntaje'];
        $pregunta->dificultad  = $request['dificultad'];
        $pregunta->requisito  = $request['requisitos'];
            // $pregunta->id_docente  = Session::get('user')->IdDocente; nadie cambiara la pregunta deotro
        $pregunta->id_competence  = $request['competencia'];

            if($request['tipo'] == 1){//si es pregunta cerrada, necesitamos las claves y respuesta
                $pregunta->rpta  = $request['rpta'];
            }
            else if ($request['tipo'] == 3){
                $pregunta->tamano_arch  = $request['tamanomax'];
                $pregunta->extension_arch  = $request['extension'];                
            }

            $pregunta->save();            

            if($request['tipo'] == 1){//si es pregunta cerrada, necesitamos las claves y respuesta
                if($pregunta->alternativas->isEmpty()){//si la pregunta no tenia alternativas
                    foreach ($request['clave'] as $letra => $descripcion) {

                        $alternativa = new Alternative; 
                        $alternativa->letra = $letra;
                        $alternativa->descripcion = $descripcion;
                        $alternativa->id_question = $pregunta->id;
                        $alternativa->save();

                    } 
                }else{//si habian alternativas, se actualizan las que habian y se agregan las nuevas
                    $ultimaClave = $pregunta->alternativas->last()->letra;
                    foreach ($request['clave'] as $letra => $descripcion) {
                            if(strcmp($letra, $ultimaClave) <= 0 ){ //si es menor o igual
                                $alterAntigua = Alternative::find($letra);
                                $alterAntigua->descripcion = $descripcion;//actualico el contenido de la clave
                                $alterAntigua->save();
                            }
                            else{
                                $alternativa = new Alternative; 
                                $alternativa->letra = $letra;
                                $alternativa->descripcion = $descripcion;
                                $alternativa->id_question = $pregunta->id;
                                $alternativa->save();
                            }                    
                    }   
                }

        }

        return redirect()->route('pregunta.index')->with('success', 'La pregunta se ha actualizado exitosamente');
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
            $question   = Question::find($id);            
            $question->delete();
            return redirect()->route('pregunta.index')->with('success', 'La pregunta se ha eliminado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }


    public function searchModalEv(Request $request)
    {
        $specialty = Session::get('faculty-code');
        $questions = collect(); //creo una coleccion vacia    
        
        try {
            $questions_query = Question::where('id_especialidad',$specialty);
            if($request['competencia'] != "") {
                $questions_query = $questions_query->where('id_competence',$request['competencia']);            
            }
            if($request['tipo'] != "") {
                $questions_query = $questions_query->where('tipo',$request['tipo']);
            }
            if($request['dificultad'] != "") {
                $questions_query = $questions_query->where('dificultad',$request['dificultad']);
            }  
            // dd($questions_query->get()); 
            $questions = $questions_query->get();  
            //le paso todo a la vista donde esta la tabla
            return response()->view('evaluations.evaluation.search-questions-table', compact('questions'));        
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
        
    }

    public function editModalEv(Request $request)
    {    
        
     try {
         $evaluators = DB::table('teacherxcompetences')->join('Docente', 'teacherxcompetences.id_docente', '=', 'Docente.IdDocente')->select('IdDocente','Nombre','ApellidoPaterno','ApellidoMaterno')->where('id_competence', $request['competencia'])->get();
       // dd($evaluators);

         return response()->view('evaluations.evaluation.modal-editar-pregunta', compact('evaluators'));
     } catch (Exception $e) {
         return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
     }

        
    }
}
