<?php

namespace Intranet\Http\Controllers\Psp\Supervisor;

use Illuminate\Http\Request;

use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;

use Intranet\Http\Services\User\PasswordService;
use Intranet\Http\Services\User\UserService;

use Intranet\Models\Faculty;
use Intranet\Models\Teacher;
use Intranet\Models\User;
use Intranet\Models\Supervisor;

use Intranet\Http\Requests\SupervisorRequest;

use Auth;

class SupervisorController extends Controller
{
    public function __construct() {
        $this->userService = new UserService;
        $this->passwordService = new PasswordService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $supervisores = Supervisor::get();

        $data = [
            'supervisores'    =>  $supervisores,
        ];
        return view('psp.supervisor.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('psp.supervisor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupervisorRequest $request)
    {
        try {
            //Crear usuario
            $usuario = new User;
            $usuario->Usuario       = $request['codigo'];
            $usuario->Contrasena    = bcrypt(123);
            $usuario->IdPerfil      = 6;    //Perfil segun la tabla PROFILE de la BD antigua
            
            $usuario->save();

            //Crear investigador
            $supervisor                   = new Supervisor;
            $supervisor->codigo_trabajador          = $request['codigo'];
            $supervisor->nombres           = $request['nombres'];
            $supervisor->apellido_paterno      = $request['apellido_paterno'];
            $supervisor->apellido_materno      = $request['apellido_materno'];
            $supervisor->correo           = $request['correo'];
            $supervisor->telefono          = $request['celular'];
            $supervisor->direccion          = $request['direccion'];
            $supervisor->IdUser       = $usuario->IdUsuario;
            $supervisor->Vigente    = 1;

            $userId = Auth::User()->IdUsuario;
            $profileId = Auth::User()->IdPerfil;
            $teacher=null;
            //si idperfil 1 o 2
            switch ($profileId) {
                case 1:
                    $teacher       = Teacher::find($userId);
                    break;
                case 2:
                    $teacher       = Teacher::find($userId);
                    break;
                default: $supervisor->IdFaculty       = 1;
            }

            if($teacher==null){
                $supervisor->IdFaculty       = 1;    
            }else{
                $supervisor->IdFaculty       = $teacher->IdEspecialidad;
            }
            $supervisor->save();

            //Enviar correo
            if ($usuario) {
                $this->passwordService->sendSetPasswordLink($usuario, $request['correo']);
            }
            
            return redirect()->route('supervisor.index')->with('success', 'El supervisor se ha registrado exitosamente');
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
        $supervisor       = Supervisor::find($id);

        $data = [
            'supervisor'      =>  $supervisor,
        ];
        return view('psp.supervisor.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supervisor       = Supervisor::find($id);

        $data = [
            'supervisor'      =>  $supervisor,
        ];
        return view('psp.supervisor.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupervisorRequest $request, $id)
    {
        try {
            //Crear 
            $supervisor                   = Supervisor::find($id);
            $supervisor->codigo_trabajador           = $request['codigo'];
            $supervisor->nombres           = $request['nombres'];
            $supervisor->apellido_paterno      = $request['apellido_paterno'];
            $supervisor->apellido_materno      = $request['apellido_materno'];
            $supervisor->correo           = $request['correo'];
            $supervisor->direccion           = $request['direccion'];
            $supervisor->telefono          = $request['celular'];
            
            $supervisor->save();

            return redirect()->route('supervisor.index')->with('success', 'El supervisor se ha actualizado exitosamente');
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
            $supervisor   = Supervisor::find($id);
            $user         = User::find($supervisor->idUser);
            
            //Restricciones

            $supervisor->delete();
            $user->delete();

            return redirect()->route('supervisor.index')->with('success', 'El supervisor se ha eliminado exitosamente');
        } catch (Exception $e){
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }  
    }
}
