<?php

namespace Intranet\Http\Controllers\Psp\PspDocument;

use Illuminate\Http\Request;
use Intranet\Models\PspDocument;
use Intranet\Http\Controllers\Controller;
use Intranet\Http\Requests\pspDocumentRevRequest;
use Intranet\Http\Requests\pspDocumentEditRequest;
use Intranet\Http\Requests\pspDocumentRequest;
use Intranet\Http\Requests;
use Intranet\Models\Template;
use Intranet\Models\PspStudent;
use Intranet\Models\Phase;
use Intranet\Models\Student;
use Intranet\Models\Tutstudent;
use Carbon\Carbon;
use Auth;
use Mail;
use DateTime;

class PspDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $students = Student::where('IdUsuario',Auth::User()->IdUsuario)->get();
        $student  =$students->first();
        $pspstudent = PspStudent::where('idalumno',$student->IdAlumno)->first(); 
        $pspdocuments = PspDocument::where('idstudent',$student->IdAlumno)->get();
        //$templates = Template::get();
        $data = [
            'pspdocuments'    =>  $pspdocuments,
        ];
        $data['student'] = $pspstudent;
        //$data['templates'] = $templates;
        //$data['groups'] = $this->groupService->retrieveAll();
        return view('psp.pspDocument.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $student = Student::find($id);
        $data = [
        'student' => $student,
        ];
        $data['phases'] = Phase::get();
        return view('psp.pspDocument.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(pspDocumentRequest $request, $id)
    {
        try {
                $PspDocument = new PspDocument;
                $PspDocument->idstudent= $id;
                $PspDocument->titulo_plantilla = $request['titulo'];
                if($request['obligatorio']==true)
                    $PspDocument->es_obligatorio='s';
                else
                    $PspDocument->es_obligatorio='n';
                $PspDocument->idtipoestado=4;
                $PspDocument->es_fisico=1;
                $PspDocument->fecha_limite=Phase::find($request['fase'])->fecha_fin;
                $PspDocument->numerofase=Phase::find($request['fase'])->numero;
                $PspDocument->save();

            return redirect()->route('pspDocument.search',$id)->with('success', 'Se ha registrado el documento exitosamente');
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
        $pspDocument    = pspDocument::find($id);
        $students = Student::where('IdUsuario',Auth::User()->IdUsuario)->get();
        $student  =$students->first();
        $pspstudent = PspStudent::where('idalumno',$student->IdAlumno)->first(); 
        $data = [
            'pspDocument'    =>  $pspDocument,
        ];
        $data['student'] = $pspstudent;
        $data['date'] = Carbon::now();
        return view('psp.pspDocument.edit', $data);
    }

    public function get($filename){
        $pspDocument = PspDocument::find($filename);
        $file=public_path()."/";
        $file .=$pspDocument->ruta;
        if(file_exists($file)) {
            return response()->download($file);
        }
        else{
            return redirect()->back()->with('warning', 'No existe el archivo a descargar');
        }    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(pspDocumentEditRequest $request, $id)
    {
        try {
            $pspDocument = PspDocument::find($id);
            $pspDocument->idtipoestado  = 4;
            $pspDocument->save();
            if(isset($request['ruta']) && $request['ruta'] != ""){
                if(file_exists($pspDocument->ruta)){
                    unlink($pspDocument->ruta);
                }
                $destinationPath = 'uploads/pspDocuments/'; // upload path
                $extension = $request['ruta']->getClientOriginalExtension();
                $filename = $pspDocument->id.'.'.$extension; 
                $request['ruta']->move($destinationPath, $filename);
                $pspDocument->ruta = $destinationPath.$filename;
                $pspDocument->save();
            }
            return redirect()->route('pspDocument.index')->with('success', 'Se ha subido el documento exitosamente');
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
        //
    }

    public function mail($id)
    {        
        try {
            $pspDocument = PspDocument::find($id);
            $stud = Student::where('IdUsuario',$pspDocument->idstudent)->first();
            $student = Tutstudent::where('id_usuario',$stud->IdUsuario)->first();

            $now = Carbon::now();
            $fecha = $pspDocument->fecha_limite;
            $datetime1 = new DateTime(($now));
            $datetime2 = new DateTime(($fecha));
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%R%a days');
            //dd($days);
           /*  Mail::send('emails.notifyDatelimit', ['user' => $student ], function ($m) use ($student) {
                $m->from('hello@app.com', 'Supervisor de PSP');
                $m->to($student->correo)->subject('Recordatorio de fecha limite para entrega de documento!');
            });*/
            $hoy                = Carbon::now();
            $fechaLimite        = Carbon::parse($pspDocument->fecha_limite);
            $diasRestantes      = $hoy->diffInDays($fechaLimite);
            
                $mail = $student->correo;
                Mail::send('emails.notifyDatelimit', compact('diasRestantes'), function($m) use($mail){
                    $m->subject('Notificacion de fecha limite');
                    $m->to($mail);
                });
            
             return redirect()->back()->with('success', 'Notificacon Enviada');
        } catch (Exception $e){
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        } 
    }

    public function search($id)
    {
        //$students = Student::where('IdUsuario',Auth::User()->IdUsuario)->get();
        //$student  =$students->first();
        $student = Student::find($id);
        $pspstudent = PspStudent::where('idalumno',$student->IdAlumno)->first(); 
        $pspdocuments = PspDocument::where('idstudent',$id)->get();

        $data = [
            'pspdocuments'    =>  $pspdocuments,
        ];
        $data['student'] = $pspstudent;

        return view('psp.pspDocument.search', $data);       

    }


    public function check($id)
    {
        $pspDocument    = pspDocument::find($id);
        /*$students = Student::where('IdUsuario',Auth::User()->IdUsuario)->get();
        $student  =$students->first();*/

        $data = [
            'pspDocument'    =>  $pspDocument,
        ];
        //$data['student'] = $students->first();
        return view('psp.pspDocument.check', $data);
    }

    public function updateC(pspDocumentRevRequest $request, $id)
    {
        try {
            $pspDocument = PspDocument::find($id);
            $pspDocument->observaciones  = $request['observaciones'];
            $pspDocument->idtipoestado  = 5;
            $pspDocument->save();
            return redirect()->route('pspDocument.search',$pspDocument->idstudent)->with('success', 'Se ha registrado la observacion exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }

    }


}
