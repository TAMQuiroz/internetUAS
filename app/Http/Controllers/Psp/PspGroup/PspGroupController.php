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

class PspGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pspGroups = PspGroup::orderBy('numero','asc')->get();

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
        //   
        $groupNum = pspGroup::count() + 1;
        $data['groupNum']  = $groupNum;        
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
                       
            if(Auth::User()->IdPerfil==2){
                $teacher = Teacher::where('IdUsuario',Auth::User()->IdUsuario)->first();                
                $procxt= PspProcessxTeacher::where('iddocente',$teacher->IdDocente)->get()->first(); 
                //dd($procxt);
                $pspGroup->idpspprocess = $procxt->idpspprocess;
            }
            
            $pspGroup->numero = $request['numero'];
            $pspGroup->descripcion = $request['descripcion'];
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
            $pspGroups = PspGroup::get();
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
