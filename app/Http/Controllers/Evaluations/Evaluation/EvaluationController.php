<?php

namespace Intranet\Http\Controllers\Evaluations\Evaluation;

use Auth;
use Mail;
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
use Intranet\Models\Evquestionxstudentxdocente;
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
    public function index(Request $request)
    {
        $filters = $request->all();
        $specialty = Session::get('faculty-code');
        $evaluations = Evaluation::where('id_especialidad',$specialty)->get();
        //cambiar de estado a las expiradas
        $date = date("Y-m-d", time()+86400);        
        foreach ($evaluations as $evaluation) {            
            if(($evaluation->fecha_fin <  $date) && ($evaluation->estado!=3) ){                
                $evaluation->estado=3;
                $evaluation->save();
            }
        }

        $evals = Evaluation::getEvaluationsFiltered($filters, $specialty);
        $data = [
        'evaluations'    =>  $evals->appends($filters),
        ];
        return view('evaluations.evaluation.index', $data);
    }

    public function indexal(Request $request)
    {        
        $id = Session::get('user')->id;
       $tutstudentxevaluations = Tutstudent::find($id)->evaluations;//saco las evaluaciones del alumno
       $evaluations = array();
       foreach ($tutstudentxevaluations as $tutstudentxevaluation) {
           array_push($evaluations,$tutstudentxevaluation->evaluation);
       }

       // dd($evaluations);
       $data = [
       'evaluations'               =>  $evaluations,
       'tutstudentxevaluations'    =>  $tutstudentxevaluations,
       ];
       return view('evaluations.evaluation.indexal', $data);
   }

   public function indexev(Request $request)
   {
    $id = Session::get('user')->IdDocente;    
    $evquestionxstudentxdocentes = DB::table('evquestionxstudentxdocentes')->join('evaluations', 'id_evaluation', '=', 'evaluations.id')->join('Especialidad', 'id_especialidad', '=', 'IdEspecialidad')->select('Especialidad.Nombre','evaluations.id','evaluations.nombre')->distinct()->where('evquestionxstudentxdocentes.id_docente',$id)->get();

    $data = [
    'evaluations'               =>  $evquestionxstudentxdocentes,     
    ];
    return view('evaluations.evaluation.indexev', $data);

}

public function indexeval(Request $request,$id)
 {//muestra las evaluaciones pendietes por corregir de un evaluador

    $id_docente = Session::get('user')->IdDocente;
    $evaluation = Evaluation::find($id);
    $tutstudentxevaluations = Tutstudentxevaluation::where('fecha_hora','<>',null)->where('id_evaluation',$id)->get();
    $no_include = DB::table('teacherxtutstudentxevaluations')->where('id_docente',$id_docente)->get();        
    $arr_no_include = array();
    foreach ($no_include as $value) {
        array_push($arr_no_include, $value->id_tutstudentxevaluation);
    }

    $data = [
    'evaluation'               =>  $evaluation, 
    'tutstudentxevaluations'   =>  $tutstudentxevaluations, 
    'arr_no_include'           =>  $arr_no_include, 
    ];
    return view('evaluations.evaluation.evaluaciones_alumnos', $data);

}

public function indexevalcoord(Request $request,$id)
 {//muestra las evaluaciones rendidas

    $id_docente = Session::get('user')->IdDocente;
    $evaluation = Evaluation::find($id);
    $tutstudentxevaluations = Tutstudentxevaluation::where('inicio','<>',null)->where('id_evaluation',$id)->get();


    $data = [
    'evaluation'               =>  $evaluation, 
    'tutstudentxevaluations'   =>  $tutstudentxevaluations, 
    ];
    return view('evaluations.evaluation.evaluaciones_alumnos_coord', $data);

}

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
                                $pregunta->tamano_arch  = $preg->tamano_arch;
                                $pregunta->extension_arch  = $preg->extension_arch; 
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
                            $tutstudentxevaluation->intentos = 1 ;
                            $tutstudentxevaluation->save() ;
                        }

                    }
                    else{
                    //va dirigido a algunos alumnos de la especialidad
                        foreach($request['arrStudents'] as $idStudent=> $value){
                            $tutstudentxevaluation = new Tutstudentxevaluation;
                            $tutstudentxevaluation->id_tutstudent = $idStudent;
                            $tutstudentxevaluation->id_evaluation = $evaluacion->id;
                            $tutstudentxevaluation->intentos = 1 ;
                            $tutstudentxevaluation->save() ;
                        }
                    }          
                }
                else{
                    return redirect()->route('evaluacion.create')->with('warning', 'Tiene que tener preguntas.');
                }                
            }
            else{
                return redirect()->route('evaluacion.create')->with('warning', 'No existen alumnos para evaluar.');
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

    
    public function vercorregida($id)
    {//muestra las preguntas de la evaluacion del alumno corregidas o no
        $tutstudentxevaluation = Tutstudentxevaluation::find($id);
         $evquestionxstudentxdocentes = Evquestionxstudentxdocente::where('id_tutstudent',$tutstudentxevaluation->alumno->id)->where('id_evaluation',$tutstudentxevaluation->evaluation->id)->get();

        $data = [        
        'evaluation'                 =>  $tutstudentxevaluation->evaluation,                
        'tutstudent'                 =>  $tutstudentxevaluation->alumno,                
        'evs'                        =>  $evquestionxstudentxdocentes,        
        ];

        return view('evaluations.evaluation.corregida', $data);
    }
    public function corregir($id,$ev)
    {//muestra las preguntas de la evaluacion para ser corregidas
        $id_docente = Session::get('user')->IdDocente;    
        $tutstudent = Tutstudent::find($id);
        $evaluation   = Evaluation::find($ev);//saco la evaluacion        
        $evquestionxstudentxdocentes = Evquestionxstudentxdocente::where('id_tutstudent',$id)->where('id_docente',$id_docente)->where('id_evaluation',$ev)->get();

        $data = [        
        'evaluation'                 =>  $evaluation,                
        'tutstudent'                 =>  $tutstudent,                
        'evs' =>  $evquestionxstudentxdocentes,        
        ];
        return view('evaluations.evaluation.corregir', $data);
    }

    public function storeEvCorregida(Request $request, $id,$ev)
    {//guarda las correcciones
        $id_docente = Session::get('user')->IdDocente;
        
        // dd($request);
        foreach ($request['arr_comentario'] as $key => $value) {
            $evaluation = Evquestionxstudentxdocente::find($key);
            $evaluation->comentario = $value;
            $evaluation->puntaje = (float)($request['arr_puntaje1'][$key]) + (float)($request['arr_puntaje2'][$key]);            
            $evaluation->save();
        }
        //guardo la relacion de evaluador con la evaluacion
        $tutstudentxevaluation = Tutstudentxevaluation::where('id_tutstudent',$id)->where('id_evaluation',$ev)->first();

        DB::table('teacherxtutstudentxevaluations')->insert(['id_tutstudentxevaluation' =>$tutstudentxevaluation->id , 'id_docente' => $id_docente]);
        return redirect()->route('evaluacion.ver_evaluaciones_alumnos',$ev)->with('success', 'La evaluación se ha corregido exitosamente');
    }

    public function rendir($id)
    {//muestra las datos de la evaluacion antes de ser rendida por el alumno
        $evaluation   = Evaluation::find($id);//saco la evaluacion

        $data = [        
        'evaluation'   =>  $evaluation,        
        ];
        return view('evaluations.evaluation.rendir', $data);
    }
    public function download_evquestion($id)
    {//descarga el archivo de la pregunta subida por el alumno
        $evquestion   = Evquestionxstudentxdocente::find($id);//saco la pregunta
        
        $path = $evquestion->path_archivo;
        if($path!=null){
            return response()->download(public_path() . "/". $path );
        }
    }    

    public function rendirEv($id)
    {//se rinde la evaluacion 
        $tutstudentxevaluation   = Tutstudentxevaluation::where('id_tutstudent',Session::get('user')->id)->where('id_evaluation',$id)->first();//saco la evaluacion del alumno 
        if($tutstudentxevaluation->intentos>0){
            $tutstudentxevaluation->intentos-=1;
            $tutstudentxevaluation->inicio = date('Y-m-d H:i:s ', time());
            $tutstudentxevaluation->save(); //disminuyo la cantidad de intentos del alumno

            $evaluation   = Evaluation::find($id);//saco la evaluacion        
            // dd($evaluation);
            $data = [        
            'evaluation'   =>  $evaluation,        
            ];
            return view('evaluations.evaluation.rendirev', $data);
        }      
        else{
            return redirect()->route('evaluacion_alumno.index')->with('warning', 'Ya no le quedan más intentos para dar esta evaluación.');
        }
    }   

    public function darPermisoExtra($student,$ev)
    {
        $tutstudentxevaluation   = Tutstudentxevaluation::where('id_tutstudent',$student)->where('id_evaluation',$ev)->first();//saco la evaluacion del alumno 
        if( $tutstudentxevaluation != null ){
            $tutstudentxevaluation->intentos+=1;            
            $tutstudentxevaluation->save(); //aumento la cantidad de intentos del alumno
            return redirect()->route('evaluacion.ver_evaluaciones_alumnos_coord',$ev)->with('success', 'Se le ha otorgado al alumno un nuevo intento exitosamente.');        
        }
        else{
         return redirect()->route('evaluacion.ver_evaluaciones_alumnos_coord',$ev)->with('warning', 'Ha ocurrido un error.');           
        }
        
            
    }   

    public function storeEv(Request $request)
    {//guarda las respuestas de la evaluacion
        $id=$request['id_evaluation'];

        //se borran las respuestas anteriores, si hubiesen
        DB::table('evquestionxstudentxdocentes')->where('id_tutstudent',Session::get('user')->id)->where('id_evaluation',$id)->delete();        
        
        foreach ($request['arrQuestion'] as $idEvquestion => $answer) {
            $evquestion = EvQuestion::find($idEvquestion);            
            $ev = new Evquestionxstudentxdocente;
            $ev->id_tutstudent = Session::get('user')->id;
            $ev->id_evquestion = $idEvquestion;
            $ev->id_evaluation = $evquestion->id_evaluation;
            $ev->id_docente    = $evquestion->id_docente;
            if($evquestion->tipo == 2){//si es abierta
                $ev->respuesta    = $answer;
            }
            else if ($evquestion->tipo == 1){//si es cerrada
                $ev->clave_elegida    = $answer;
                //se corrige
                $respuesta_correcta = $evquestion->rpta;
                if( ($answer=="0") || ($answer != $respuesta_correcta)  ){//no se marco ninguna alternativa o es incorrecta
                    $ev->puntaje = 0;
                }
                else {
                    $ev->puntaje = $evquestion->puntaje; //se le asigna el puntaje completo
                }
            }
            $ev->save();
            if ($evquestion->tipo == 3){//si es archivo
                if($request->hasFile($idEvquestion)){
                    $destinationPath = 'uploads/respuestas/'; // upload path
                    $extension = $request->file($idEvquestion)->getClientOriginalExtension();
                    $filename = 'Eval_'.$evquestion->evaluacion->id.'_Preg_'.$evquestion->id.'_'.$ev->id.'.'.$extension; 
                    $request->file($idEvquestion)->move($destinationPath, $filename);

                    $ev->path_archivo = $destinationPath.$filename;                    
                    $ev->save();                    
                }
            }
            
        }  
        //guardo la hora de la evaluacion
        $tutstudentxevaluation   = Tutstudentxevaluation::where('id_tutstudent',Session::get('user')->id)->where('id_evaluation',$id)->first();//
        $tutstudentxevaluation->fecha_hora = date('Y-m-d H:i:s ', time());
        $tutstudentxevaluation->save(); 
        
        return redirect()->route('evaluacion_alumno.index')->with('success', 'La evaluación ha sido rendida exitosamente');
    }

    public function activate($id)
    {
        $evaluation   = Evaluation::find($id);//saco la evaluacion
        $evaluation->estado = 2;//vigente

        //avisar a todos los alumnos
        $students = DB::table('tutstudentxevaluations')->join('tutstudents', 'tutstudents.id', '=', 'id_tutstudent')->select('nombre','correo')->where('id_evaluation',$id)->get();
        // dd($students);

        $evaluacion = $evaluation->nombre;
        $fecha_inicio = $evaluation->fecha_inicio;
        $fecha_fin = $evaluation->fecha_fin;
        foreach ($students as $student) {
            try{
                $nombre = $student->nombre;
                $mail = $student->correo;                
                Mail::send('emails.newEvaluation',compact('nombre','mail','evaluacion','fecha_inicio','fecha_fin'),  function($m) use($mail) {
                    $m->subject('UAS Evaluaciones - Nueva evaluación');
                    $m->to($mail);
                });
            }
            catch (Exception $e)          {
                return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
            }  
        }

        $evaluation->save();
        return redirect()->route('evaluacion.index')->with('success', 'La evaluación se ha activado exitosamente');
        
    }

    
    public function edit($id)
    {
        try {
            $evaluation   = Evaluation::find($id);//saco la evaluacion
            $specialty = Session::get('faculty-code');  
            $students = Tutstudent::where('id_especialidad',$specialty)->get();//envio los alumnos de la esp
            $competences = Competence::where('id_especialidad',$specialty)->get();
            $questions = EvQuestion::where('id_evaluation',$evaluation->id)->get();

            //calculo los acumulados
            $sum_puntaje=0;
            $sum_tiempo=0;
            foreach ($questions as $question) {
                $sum_puntaje += $question->puntaje;
                $sum_tiempo += $question->tiempo;
            }

            //saco los estudiantes a quienes iba dirigida la evaluacion 
            $evstudents = Tutstudentxevaluation::where('id_evaluation',$evaluation->id)->get();
            $arrStudents = array();
            foreach ($evstudents as $evstudent) {
                array_push($arrStudents,$evstudent->id_tutstudent);
            }


            $data = [
            'evaluation'      =>  $evaluation,            
            'specialty'      =>  $specialty,
            'students'       =>  $students,
            'arrStudents'       =>  $arrStudents,
            'competences'    =>  $competences,
            'questions'    =>  $questions,
            'sum_puntaje'    =>  $sum_puntaje,
            'sum_tiempo'    =>  $sum_tiempo,
            ];
            return view('evaluations.evaluation.edit', $data);

        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EvaluationRequest $request, $id)
    {
        // dd($request);

        $specialty = Session::get('faculty-code');  

        try {

            if($request['arrStudents'] != null){//si existen alumnos
                if(($request['arrIds']!=null) || ($request['arrEvIds']!=null)){

                    //busco los datos de la evaluacion
                    $evaluacion = Evaluation::find($id);
                    $evaluacion->fecha_inicio         = $request['fecha_inicio'];            
                    $evaluacion->fecha_fin            = $request['fecha_fin'];            
                    $evaluacion->nombre               = $request['nombre'];            
                    $evaluacion->descripcion          = $request['descripcion'];            
                    $evaluacion->tiempo               = $request['tiempo'];            
                    $evaluacion->id_especialidad      = $specialty; 
                    // $evaluacion->estado               = 1;  //creada
                    $evaluacion->save();

                    $evquestions = $evaluacion->preguntas;

                    //actualizar las preguntas existentes >  tabla EvQuestion
                    if($request['arrEvIds']!=null){//si al menos llega una pregunta antigua
                        foreach ($evquestions as $evquestion) {
                            if(in_array($evquestion->id, $request['arrEvIds'])){
                                //actualizar esa pregunta
                                //busco la pregunta antigua
                                $preg = Evquestion::find($evquestion->id);

                                //actualizo el puntaje
                                $preg->puntaje  = $request['arrEvPuntajes'][$evquestion->id] ; //el puntaje de la preg

                                //actualizo el evaluador
                                $preg->id_docente  = $request['arrEvEvaluadores'][$evquestion->id] ; //el evaluador de la preg
                                $preg->save();

                            }
                            else{//eliminar la pregunta antigua
                                $evquestion->delete();
                            }
                        }
                    }
                    else{//se borraron todas preguntas antiguas que habian
                        Evquestion::where('id_evaluation',$id)->delete();

                    }


                    //creo los datos de las nuevas preguntas      
                    if($request['arrIds']!=null){//si se agregaron preguntas nuevas del banco
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
                            $pregunta->id_evaluation  = $id; //el codigo de la evaluacion recien creada en bd

                            if($preg->tipo == 1){//si es pregunta cerrada, necesitamos las claves y respuesta
                                $pregunta->rpta  = $preg->rpta;
                            }
                            else if ($preg->tipo == 3){
                                $pregunta->tamano_arch  = $preg->tamano_arch;
                                $pregunta->extension_arch  = $preg->extension_arch; 
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
                }      


                    //ahora los alumnos
                    //borro todas las relaciones anteriores
                Tutstudentxevaluation::where('id_evaluation',$id)->delete();

                if($request['alumnos'] == "todos"){
                    //va dirigido a todos los alumnos de la especialidad
                    $students = Tutstudent::where('id_especialidad',$specialty)->get();
                    foreach ($students as $student) {
                        $tutstudentxevaluation = new Tutstudentxevaluation;
                        $tutstudentxevaluation->id_tutstudent = $student->id;
                        $tutstudentxevaluation->id_evaluation = $id;
                        $tutstudentxevaluation->intentos = 1 ;
                        $tutstudentxevaluation->save() ;
                    }

                }
                else{
                    //va dirigido a algunos alumnos de la especialidad
                    foreach($request['arrStudents'] as $idStudent=> $value){
                        $tutstudentxevaluation = new Tutstudentxevaluation;
                        $tutstudentxevaluation->id_tutstudent = $idStudent;
                        $tutstudentxevaluation->id_evaluation = $id;
                        $tutstudentxevaluation->intentos = 1 ;
                        $tutstudentxevaluation->save() ;
                    }
                }          
            }
            else{
                return redirect()->back()->with('warning', 'Tiene que tener preguntas.');
            }                
        }
        else{
            return redirect()->back()->with('warning', 'No existen alumnos para evaluar.');
        }

        return redirect()->route('evaluacion.index')->with('success', 'La evaluación se ha actualizado exitosamente');
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
            $evaluation   = Evaluation::find($id);            
            $evaluation->delete();//softdelete
            return redirect()->route('evaluacion.index')->with('success', 'La evaluacion  se ha eliminado exitosamente.');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    public function cancel($id)
    {
        try {
            $specialty = Session::get('faculty-code');
            $evaluation   = Evaluation::find($id);//saco la evaluacion
            $evaluation->estado = 0;//cancelada
            $evaluation->save();            

            return redirect()->route('evaluacion.index')->with('success', 'La evaluación se ha cancelado exitosamente');


        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    
}
