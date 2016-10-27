<?php

namespace Intranet\Http\Controllers\Evaluations\Evaluation;

use Illuminate\Http\Request;
use Intranet\Http\Requests;
use Intranet\Http\Requests\EvaluationRequest;
use Illuminate\Support\Facades\DB;
use Intranet\Http\Controllers\Controller;
use Intranet\Models\Teacher;
use Intranet\Models\Evaluation;
use Intranet\Models\Competence;
use Intranet\Models\Evquestion;
use Intranet\Models\Question;
use Intranet\Models\Tutstudent;
use Intranet\Models\Tutstudentxevaluation;
use Intranet\Models\Evalternative;
use Intranet\Models\Alternative;
use Illuminate\Support\Facades\Session;//<---------------------------------necesario para usar session

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialty = Session::get('faculty-code');
        $evaluations = Evaluation::where('id_especialidad',$specialty)->get();
        $data = [
        'evaluations'    =>  $evaluations,
        ];
        return view('evaluations.evaluation.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialty = Session::get('faculty-code');  
        $students = Tutstudent::where('id_especialidad',$specialty)->get();//envio los alumnos de la esp
        $competences = Competence::where('id_especialidad',$specialty)->get();
        $data = [
        'specialty'      =>  $specialty,
        'students'       =>  $students,
        'competences'    =>  $competences,
        ];
        return view('evaluations.evaluation.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EvaluationRequest $request)
    {
        // dd($request);
        $specialty = Session::get('faculty-code');  

        try {

            if($request['arrStudents'] != null){//si existen alumnos
                if($request['arrIds']!=null){
                    //creo los datos para la evaluacion

                    $evaluacion = new Evaluation;
                    $evaluacion->fecha_inicio         = $request['fecha_inicio'];            
                    $evaluacion->fecha_fin            = $request['fecha_fin'];            
                    $evaluacion->nombre               = $request['nombre'];            
                    $evaluacion->descripcion          = $request['descripcion'];            
                    $evaluacion->tiempo               = $request['tiempo'];            
                    $evaluacion->id_especialidad      = $specialty; 
                    $evaluacion->estado               = 1;  //creada
                    $evaluacion->save();


                    //creo los datos de las preguntas            
                    foreach($request['arrIds'] as $idQuestion => $value){
                        try {
                            //busco la pregunta del banco
                            $preg = Question::find($value);

                            //creo un nuevo objeto pregunta para la evaluacion
                            $pregunta = new EvQuestion;  
                            $pregunta->descripcion  = $preg->descripcion;                        
                            $pregunta->tipo  = $preg->tipo;
                            $pregunta->tiempo  = $preg->tiempo;
                            $pregunta->puntaje  = $request['arrPuntajes'][$value] ; //el puntaje de la preg
                            $pregunta->dificultad  = $preg->dificultad;
                            $pregunta->requisito  = $preg->requisito;
                            $pregunta->id_docente  = $request['arrEvaluadores'][$value] ; //el evaluador de la preg
                            $pregunta->id_competence  = $preg->id_competence;
                            $pregunta->id_evaluation  = $evaluacion->id; //el codigo de la evaluacion recien creada en bd

                            if($preg->tipo == 1){//si es pregunta cerrada, necesitamos las claves y respuesta
                                $pregunta->rpta  = $preg->rpta;
                            }
                            else if ($preg->tipo == 3){
                                $pregunta->tamano_arch  = $preg->tamanomax;
                                $pregunta->extension_arch  = $preg->extension; 
                            }
                            $pregunta->save();

                            //ahora las alternativas
                            if($preg->tipo == 1){//si es pregunta cerrada, necesitamos las claves y respuesta
                                $alternatives = $preg->alternativas;
                                //crear las claves
                                foreach ($alternatives as $alternative) {//para cada clave de la pregunta original
                                    $evalternativa = new EvAlternative; 
                                    $evalternativa->letra = $alternative->letra;
                                    $evalternativa->descripcion = $alternative->descripcion;
                                    $evalternativa->id_evquestion = $pregunta->id;
                                    $evalternativa->save();
                                }                
                            }
                        } catch (Exception $e) {
                            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
                        }
                    }      

                    //ahora los alumnos
                    if($request['alumnos'] == "todos"){
                    //va dirigido a todos los alumnos de la especialidad
                        $students = Tutstudent::where('id_especialidad',$specialty)->get();
                        foreach ($students as $student) {
                            $tutstudentxevaluation = new Tutstudentxevaluation;
                            $tutstudentxevaluation->id_tutstudent = $student->id;
                            $tutstudentxevaluation->id_evaluation = $evaluacion->id;
                            $tutstudentxevaluation->intentos = 0 ;
                            $tutstudentxevaluation->save() ;
                        }

                    }
                    else{
                    //va dirigido a algunos alumnos de la especialidad
                        foreach($request['arrStudents'] as $idStudent=> $value){
                            $tutstudentxevaluation = new Tutstudentxevaluation;
                            $tutstudentxevaluation->id_tutstudent = $idStudent;
                            $tutstudentxevaluation->id_evaluation = $evaluacion->id;
                            $tutstudentxevaluation->intentos = 0 ;
                            $tutstudentxevaluation->save() ;
                        }
                    }          
                }
                else{
                    return redirect()->route('evaluacion.create')->with('warning', 'Tiene que tener preguntas.');
                }                
            }
            else{
                return redirect()->route('evaluacion.create')->with('warning', 'No existen alumnos.');
            }

            return redirect()->route('evaluacion.index')->with('success', 'La evaluación se ha registrado exitosamente');
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
        //
    }
}
