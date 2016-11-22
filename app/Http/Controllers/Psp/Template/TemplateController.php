<?php 

namespace Intranet\Http\Controllers\Psp\Template;

use Illuminate\Http\Request;
use Auth;
use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;
use Intranet\Models\Template;
use Intranet\Http\Requests\TemplateRequest;
use Intranet\Http\Requests\TemplateEditRequest;
use Intranet\Models\Teacher;
use Intranet\Models\User;
use Intranet\Models\PspDocument;
use Intranet\Models\PspStudent;
use Intranet\Models\Phase;
use Intranet\Models\Student;
use Intranet\Models\Supervisor;
use Intranet\Models\PspProcessxTeacher;
use Intranet\Models\PspProcess;
use DB;

class TemplateController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $filters = $request->all();

        $templates = null;
        if(Auth::User()->IdPerfil==3){  
                $templates = Template::getFiltered($filters);
            } else{
                $teacher = Teacher::where('IdUsuario',Auth::User()->IdUsuario)->first(); 
                $procxt= PspProcessxTeacher::where('iddocente',$teacher->IdDocente)->get(); 
                $proc = array(); 
                $r = count($procxt);   
                if($r>0){
                foreach($procxt as $p){
                    $proc2=null;                
                    $proc2=Phase::where('idpspprocess',$p->idpspprocess)->get();
                    $r2 = count($proc2);  
                    if($proc2!=null && $r2>0){
                        foreach($proc2 as $p2){ 
                            if($p2!=null){
                                //$proc3=Template::where('idphase',$p2->id)->get();
                                $proc3=Template::getFiltered2($filters,$p2->id);
                                //dd($proc3);
                                foreach($proc3 as $p3){ 
                                    if($p3!=null){
                                        $proc[]=Template::find($p3->id);
                                    }
                                }                                
                            }                            
                        }
                    }
                }
                $templates =$proc;
            }
        }
        $data = [
            'templates'    =>  $templates,
        ];
        //$data['phases'] = Phase::get();
        return view('psp.template.index', $data);
        //return view('template.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::User()->IdPerfil==3){  
                $Phaseses = Phase::get();
            } else {
                $teacher = Teacher::where('IdUsuario',Auth::User()->IdUsuario)->first(); 
                $procxt= PspProcessxTeacher::where('iddocente',$teacher->IdDocente)->get(); 
                $proc = array(); 
                $r = count($procxt);   
                if($r>0){
                foreach($procxt as $p){
                    $proc2=null;                
                    $proc2=Phase::where('idpspprocess',$p->idpspprocess)->get();
                    $r2 = count($proc2);  
                    if($proc2!=null && $r2>0){
                        foreach($proc2 as $p2){ 
                            if($p2!=null){
                                $proc[]=Phase::find($p2->id);
                            }
                        }
                    }
                }
                $Phaseses=$proc;
            }
        }
        $data['phases'] = $Phaseses;
        return view('psp.template.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TemplateRequest $request)
    {
        try {
            $template = new Template;
            $phase         = Phase::find($request['fase']);
            $template->idphase       = $request['fase']; 
            $template->numerofase = $phase->numero;
            //$data['phases'] = Phase::get();
            //$template->idTipoEstado  = 1;
            if(Auth::User()->IdPerfil==6){
                $supervisors = Supervisor::where('iduser',Auth::User()->IdUsuario)->get();  
                $supervisor  =$supervisors->first();             
                $template->idsupervisor  = $supervisor->id;

            }
            if(Auth::User()->IdPerfil==2 || Auth::User()->IdPerfil==1){
                $teacher = Teacher::where('IdUsuario',Auth::User()->IdUsuario)->first();  
                //teacher =$teacherss->first();
                if($teacher!=null){
                $template->idprofesor  = $teacher->IdDocente;
                }
            }
            if(Auth::User()->IdPerfil==3){
                //$admin = Admin::where('idUser',Auth::User()->IdUsuario)->first(); 
                $template->idadmin   = Auth::User()->IdUsuario;
            }
            /*
            $template->idProfesor  = Auth::User()->IdUsuario;
            $template->idSupervisor  = null;
            $template->idAdmin  = null;
            */
            $template->titulo  = $request['titulo'];
            if($request['obligatorio']==true)
                $template->idtipoestado  = 1;
            else
                $template->idtipoestado  = 2;
            $proc = array(); 
            $pspproc=PspProcess::find($phase->idpspprocess);
            $size = $request['ruta']->getSize();
            if($pspproc->max_tam_plantilla!=0){
                if($size > ($pspproc->max_tam_plantilla*1024*1024+10486)){
                    return redirect()->back()->with('warning', 'La plantilla que se quiere subir supera el tamaño maximo permitido');
                }
            }
            //dd($size);
            $proc2=Phase::where('idpspprocess',$phase->idpspprocess)->get();
            foreach($proc2 as $p2){ 
                if($p2!=null){
                    $proc3=Template::where('idphase',$p2->id)->get();
                        foreach($proc3 as $p3){ 
                            if($p3!=null){
                                $proc[]=Template::find($p3->id);
                            }
                    } 
                }
            }
            if($pspproc->numero_Plantillas!=0){
                if(count($proc)+1>$pspproc->numero_Plantillas)return redirect()->back()->with('warning', 'Se ha alcanzado el numero maximo de plantillas permitido para este proceso');
            }
            $template->save();
            if(isset($request['ruta']) && $request['ruta'] != ""){
                $destinationPath = 'uploads/templates/'; // upload path
                $extension = $request['ruta']->getClientOriginalExtension();
                $filename = $template->id.'.'.$extension; 
                $request['ruta']->move($destinationPath, $filename);

                $template->ruta = $destinationPath.$filename;
                $template->save();

                $pspstudents=PspStudent::where('idpspprocess',$phase->idpspprocess)->get();
                //$pspstudents=Student::where('lleva_psp','t')->get();
                foreach($pspstudents as $psp) {
                    if($psp!=null){
                    $PspDocument = new PspDocument;
                    $PspDocument->idstudent= $psp->idalumno;
                    $PspDocument->idtemplate=$template->id;
                    $PspDocument->titulo_plantilla=$template->titulo;
                    $PspDocument->ruta_plantilla=$template->ruta;
                    $PspDocument->idtipoestado=3;
                    $PspDocument->es_fisico=0;
                    if($template->idtipoestado  == 1)
                       $PspDocument->es_obligatorio='s';
                   else
                       $PspDocument->es_obligatorio='n';
                    $PspDocument->fecha_limite=Phase::find($request['fase'])->fecha_fin;
                    $PspDocument->numerofase=Phase::find($request['fase'])->numero;
                    $PspDocument->save();
                    }
                }

            }
            return redirect()->route('template.index')->with('success', 'La plantilla se ha registrado exitosamente');
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
        $template     = Template::find($id);

        $data = [
            'template'    =>  $template,
        ];
        if(Auth::User()->IdPerfil==3){  
                $Phaseses = Phase::get();
            } else {
                $Phaseses = Phase::where('idpspprocess',$template->Phase->idpspprocess)->get();
            }
        
        $data['phases'] = $Phaseses;
        return view('psp.template.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TemplateEditRequest $request, $id)
    {
        //$data['phases'] = Phase::get();
        try {
            $template = Template::find($id);
            $template->idphase       = $request['fase'];
            $template->numerofase    = Phase::find($request['fase'])->numero;
            $template->titulo  = $request['titulo'];
            if($request['obligatorio']==true)
                $template->idtipoestado  = 1;
            else
                $template->idtipoestado  = 2;
            $template->save();
            if(isset($request['ruta']) && $request['ruta'] != ""){
                if(file_exists($template->ruta)){
                    unlink($template->ruta);
                }
                $destinationPath = 'uploads/templates/'; // upload path
                $extension = $request['ruta']->getClientOriginalExtension();
                $filename = $template->id.'.'.$extension; 
                $request['ruta']->move($destinationPath, $filename);
                $template->ruta = $destinationPath.$filename;
                $template->save();                               
            }
            $pspdocuments = PspDocument::where('idtemplate',$id)->get();
            //dd($pspdocuments);
                foreach($pspdocuments as $pspdoc) {    
                    $psp=PspDocument::find($pspdoc->id);
                    if($template->idtipoestado  == 1)
                       $psp->es_obligatorio='s';
                   else
                       $psp->es_obligatorio='n';
                    $psp->fecha_limite=Phase::find($template->idphase)->fecha_fin;
                    $psp->numerofase=$template->numerofase;
                    $psp->titulo_plantilla=$template->titulo;
                    $psp->ruta_plantilla=$template->ruta;
                    $psp->save();                    
            } 
            return redirect()->route('template.index')->with('success', 'La plantilla se ha modificado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    public function get($filename){

        $template = Template::find($filename);
        $file=public_path()."/";
        $file .=$template->ruta;
        if(file_exists($file)) {
            return response()->download($file);
        }
        else{
            return redirect()->back()->with('warning', 'No existe el archivo a descargar');
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
            $template   = Template::find($id);
            
            //Restricciones
            if(!empty($template)){
                $template->delete();
                return redirect()->route('template.index')->with('success', 'La plantilla se ha eliminado exitosamente');
            }else{
                return redirect()->route('template.index')->with('success', 'La plantilla se ha eliminado exitosamente');
            }
        } catch (Exception $e){
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        } 
    }
}
