<?php namespace Intranet\Http\Controllers\Psp\PspGroup;

use Illuminate\Http\Request;
use Auth;
use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;
use Intranet\Models\PspGroup;
use Intranet\Models\Student;
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
        $pspGroups = PspGroup::get();

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
        return view('psp.pspGroup.create');
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
        //Pendiente de modificar!!
        try {
            //idPerfil Alum 7
            $student = Student::where('IdUsuario',Auth::User()->IdUsuario)->get()->first();
            $student->idPspGroup = $request['id'];            
            $student->save();
            return redirect()->route('pspGroup.index')->with('success','Elegiste el grupo');
        } catch (Exception $e) {
            return redirect()->back()->with('warning','Ocurrio un error al realizar la accion');
        }
    }

    public function selectGroupCreate(){
        $pspGroups = PspGroup::get();

        $data = [
            'pspGroups' => $pspGroups,
        ];
        return view('psp.pspGroup.selectGroup',$data);
    }
}
