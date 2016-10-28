<?php

namespace Intranet\Http\Controllers\Psp\PspDocument;

use Illuminate\Http\Request;
use Intranet\Models\PspDocument;
use Intranet\Http\Controllers\Controller;
use Intranet\Http\Requests\pspDocumentRevRequest;
use Intranet\Http\Requests\pspDocumentEditRequest;
use Intranet\Http\Requests;
use Intranet\Models\Template;
use Intranet\Models\Student;
use Carbon\Carbon;
use Auth;

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
        $pspdocuments = PspDocument::where('idStudent',$student->IdAlumno)->get();

        $data = [
            'pspdocuments'    =>  $pspdocuments,
        ];
        $data['student'] = $students->first();

        //$data['groups'] = $this->groupService->retrieveAll();
        return view('psp.pspDocument.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        $data = [
            'pspDocument'    =>  $pspDocument,
        ];
        $data['student'] = $students->first();
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
            $pspDocument->idTipoEstado  = 4;
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

    public function search($id)
    {
        //$students = Student::where('IdUsuario',Auth::User()->IdUsuario)->get();
        //$student  =$students->first();
        $student = Student::find($id);
        $pspdocuments = PspDocument::where('idStudent',$id)->get();

        $data = [
            'pspdocuments'    =>  $pspdocuments,
        ];
        $data['student'] = $student;

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
            $pspDocument->idTipoEstado  = 5;
            $pspDocument->save();
            return redirect()->route('pspDocument.search',$pspDocument->idStudent)->with('success', 'Se ha registrado la observacion exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }

    }


}
