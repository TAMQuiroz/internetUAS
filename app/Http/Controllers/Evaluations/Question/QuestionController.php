<?php

namespace Intranet\Http\Controllers\Evaluations\Question;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Http\Requests;
use Intranet\Models\Question;
use Intranet\Models\Competence;
use Intranet\Models\Alternative;
use Illuminate\Support\Facades\Session;//<---------------------------------necesario para usar session

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
            $pregunta->competence_id  = $request['competencia'];

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
                    $alternativa->question_id = $pregunta->id;
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
            $question   = Question::find($id);            
            $question->delete();
            return redirect()->route('pregunta.index')->with('success', 'La pregunta se ha eliminado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
