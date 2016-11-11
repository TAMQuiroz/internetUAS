<?php

namespace Intranet\Http\Controllers\Investigation\Investigator;

use Illuminate\Http\Request;

use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;

use Intranet\Http\Services\User\PasswordService;

use Intranet\Models\Faculty;
use Intranet\Models\Area;
use Intranet\Models\User;
use Intranet\Models\Investigator;

use Intranet\Http\Requests\InvestigatorRequest;

use Auth;

class InvestigatorController extends Controller
{
    public function __construct() {
        $this->passwordService = new PasswordService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = $request->all();

        $investigadores = Investigator::getFiltered($filters);

        $data = [
            'investigadores'    =>  $investigadores,
        ];

        return view('investigation.investigator.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidades     = Faculty::orderBy('nombre', 'asc')->lists('nombre', 'IdEspecialidad');
        $areas              = Area::orderBy('nombre', 'asc')->lists('nombre','id');

        if($areas->isEmpty()){
            return redirect()->back()->with('warning','Primero debe crear areas');
        }

        $data = [
            'especialidades'    =>  $especialidades,
            'areas'             =>  $areas,
        ];

        return view('investigation.investigator.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvestigatorRequest $request)
    {
        try {
            //Crear usuario
            $usuario = new User;
            $usuario->Usuario       = $request['correo'];
            $usuario->Contrasena    = bcrypt(123);
            $usuario->IdPerfil      = 5;
            
            $usuario->save();

            //Crear investigador
            $investigator                   = new Investigator;
            $investigator->nombre           = $request['nombre'];
            $investigator->ape_paterno      = $request['apellido_paterno'];
            $investigator->ape_materno      = $request['apellido_materno'];
            $investigator->correo           = $request['correo'];
            $investigator->celular          = $request['celular'];
            $investigator->id_especialidad  = $request['especialidad'];
            $investigator->id_area          = $request['area'];
            $investigator->id_usuario       = $usuario->IdUsuario;
            $investigator->Vigente          = 1;

            $investigator->save();

            //Enviar correo
            if ($usuario) {
                $this->passwordService->sendSetPasswordLink($usuario, $request['correo']);
            }
            
            return redirect()->route('investigador.index')->with('success', 'El investigador se ha registrado exitosamente');
        }catch (Exception $e){
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
        $investigador     = Investigator::find($id);

        $data = [
            'investigador'    =>  $investigador,
        ];

        return view('investigation.investigator.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $investigador       = Investigator::find($id);
        $especialidades     = Faculty::orderBy('nombre', 'asc')->lists('nombre', 'IdEspecialidad');
        $areas              = Area::orderBy('nombre', 'asc')->lists('nombre','id');

        $data = [
            'especialidades'    =>  $especialidades,
            'areas'             =>  $areas,
            'investigador'      =>  $investigador,
        ];

        return view('investigation.investigator.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InvestigatorRequest $request, $id)
    {
        try {
            //Crear investigador
            $investigador                   = Investigator::find($id);
            $investigador->nombre           = $request['nombre'];
            $investigador->ape_paterno      = $request['apellido_paterno'];
            $investigador->ape_materno      = $request['apellido_materno'];
            $investigador->correo           = $request['correo'];
            $investigador->celular          = $request['celular'];
            $investigador->id_especialidad  = $request['especialidad'];
            $investigador->id_area          = $request['area'];

            $investigador->save();

            //Crear usuario
            $usuario            = User::find($investigador->id_usuario);
            $usuario->Usuario   = $request['correo'];
            $usuario->IdPerfil  = 5;
            
            $usuario->save();

            return redirect()->route('investigador.show',$id)->with('success', 'El investigador se ha actualizado exitosamente');
        } catch (Exception $e){
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
            $investigador   = Investigator::find($id);
            $user           = User::find($investigador->id_usuario);
            
            //Restricciones

            $investigador->delete();
            $user->delete();

            return redirect()->route('investigador.index')->with('success', 'El investigador se ha eliminado exitosamente');
        } catch (Exception $e){
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }   
    }
}
