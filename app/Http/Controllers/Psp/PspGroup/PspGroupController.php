<?php namespace Intranet\Http\Controllers\Psp\PspGroup;

use Illuminate\Http\Request;
use Auth;
use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;
use Intranet\Models\PspGroup;
use Intranet\Models\Student;
use Intranet\Models\PspStudent;
use Intranet\Models\Teacher;
use Intranet\Models\PspProcessxTeacher;
use Intranet\Models\PspProcess;
use Intranet\Http\Requests\PspGroupRequest;

use Illuminate\Support\Facades\DB;

class PspGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pspGroups=null;
        
        if(Auth::User()->IdPerfil==3){  
                $pspGroups = PspGroup::orderBy('numero','asc')->get();
                $pspGroups = DB::table('pspgroups')->join('pspprocesses','pspgroups.idpspprocess','=','pspprocesses.id')->join('Curso','pspprocesses.idcurso','=','Curso.IdCurso')->select('pspgroups.id', 'pspgroups.idpspprocess','pspgroups.numero','pspgroups.descripcion','Curso.Nombre')->where('pspgroups.deleted_at',null)->orderBy('Curso.Nombre','asc')->orderBy('numero','asc')->get();
            } 
        else {
            $teacher = Teacher::where('IdUsuario',Auth::User()->IdUsuario)->first(); 

            $pspGroups = DB::table('pspgroups')->join('pspprocessesxdocente','pspprocessesxdocente.idpspprocess','=','pspgroups.idpspprocess')->join('pspprocesses','pspprocessesxdocente.idpspprocess','=','pspprocesses.id')->join('Curso','pspprocesses.idcurso','=','Curso.IdCurso')->select('pspgroups.id', 'pspgroups.idpspprocess','pspgroups.numero','pspgroups.descripcion','Curso.Nombre')->where('pspprocessesxdocente.iddocente',$teacher->IdDocente)->where('pspgroups.deleted_at',null)->orderBy('numero','asc')->get();


        }
        $data = [
            'pspGroups' => $pspGroups,
        ];
        
        return view('psp.pspGroup.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proc=null;
        if(Auth::User()->IdPerfil==3){  
                $proc = PspProcess::get();
        } 
        else {
            $teacher = Teacher::where('IdUsuario',Auth::User()->IdUsuario)->first(); 
            $procxt= PspProcessxTeacher::where('iddocente',$teacher->IdDocente)->get(); 
            $proc = array(); 
            $r = count($procxt);   
            if($r>0){
                foreach($procxt as $p){
                    $proc[]=PspProcess::find($p->idpspprocess);
                }
            }
        }

        //$groupNum = pspGroup::count() + 1;

        $data =[
            //'groupNum' => $groupNum,
            'pspproc'    =>  $proc,
            ];        
        //dd($procesos);
        return view('psp.pspGroup.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PspGroupRequest $request)
    {
        //
        try {            
            $pspGroup = new pspGroup;
            $pspGroup->numero = $request['numero'];
            $pspGroup->descripcion = $request['descripcion'];
            $pspGroup->idpspprocess = $request['Proceso_de_Psp'];    

            $pspGroups = PspGroup::where('idpspprocess',$request['Proceso_de_Psp'])->get();
            if($pspGroups!=null){
                foreach($pspGroups as $group){
                    if($group->numero==$pspGroup->numero && $group->idpspprocess==$pspGroup->idpspprocess){
                        return redirect()->back()->with('warning', 'Ya existe una grupo con el mismo número dentro del Proceso');
                    }
                }       
            }     
            $pspGroup->save();

            return redirect()->route('pspGroup.index')->with('success','El grupo se ha registrado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning','Ocurrio un error al realizar la accion');
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
        $pspGroup = PspGroup::find($id);

        $data = [
            'pspGroup' => $pspGroup,
        ];

        return view('psp.pspGroup.show',$data);
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
        $pspGroup = PspGroup::find($id);

        $data = [
            'pspGroup' => $pspGroup,
        ];

        return view('psp.pspGroup.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PspGroupRequest $request, $id)
    {
        //
        try {
            $pspGroup = PspGroup::find($id);
            $pspGroup->numero = $request['numero'];
            $pspGroup->descripcion = $request['descripcion'];
            $pspGroup->save();

            return redirect()->route('pspGroup.show',$id)->with('success','El grupo se ha actualizado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning','Ocurrio un error al realizar la accion');
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
        try {
            $pspGroup = PspGroup::find($id);
            $pspGroup->delete();

            return redirect()->route('pspGroup.index')->with('success','El grupo se ha eliminado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning','Ocurrio un error al realizar la accion');
        }
    }

    public function selectGroupStore(Request $request)
    {        
        try {            
            $student = Student::where('IdUsuario',Auth::User()->IdUsuario)->get()->first();            
            $pspGroup = PspGroup::find($request['id']);
            $pspStudent = PspStudent::where('idalumno',$student->IdAlumno)->get()->first();            
            $pspStudent->idPspGroup = $request['id'];            
            $pspStudent->save();
            return redirect()->route('index.ourFaculty',$pspStudent->idespecialidad)->with('success','Elegiste el grupo: '.$pspGroup->numero.' '.$pspGroup->descripcion);
        } catch (Exception $e) {
            return redirect()->back()->with('warning','Ocurrio un error al realizar la accion');
        }
    }

    public function selectGroupCreate(){

        $student = Student::where('IdUsuario',Auth::User()->IdUsuario)->get()->first();
        $pspStudent = PspStudent::where('idalumno',$student->IdAlumno)->get()->first();
        

        if($pspStudent->idpspgroup==NULL){
            $pspGroups = PspGroup::where('idpspprocess',$pspStudent->idpspprocess)->get();
            $data = [
                'pspGroups' => $pspGroups,
                'idFaculty' => $pspStudent->idespecialidad,
            ];
            //dd($data);
            return view('psp.pspGroup.selectGroup',$data);
        }else{
            $pspgroup = PspGroup::find($pspStudent->idpspgroup);
            return redirect()->back()->with('warning','Ya selecciono el grupo: '.$pspgroup->numero.' '.$pspgroup->descripcion);
        }
        
    }
}
