<?php

namespace Intranet\Http\Controllers\Psp\Phase;

use Illuminate\Http\Request;

use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;

use Intranet\Http\Services\User\PasswordService;
use Intranet\Http\Services\User\UserService;

use Intranet\Models\Faculty;
use Intranet\Models\Teacher;
use Intranet\Models\User;
use Intranet\Models\Phase;

use Intranet\Http\Requests\PhaseRequest;

use Auth;

class PhaseController extends Controller
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

        $Phasees = Phase::get();

        $data = [
            'Phasees'    =>  $Phasees,
        ];
        return view('psp.Phase.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('psp.Phase.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhaseRequest $request)
    {
        try {

            $Phase                   = new Phase;
            $Phase->numero          = $request['numero'];
            $Phase->descripcion           = $request['nombres'];
            $Phase->fecha_inicio      = $request['fecha_inicio'];
            $Phase->fecha_fin      = $request['fecha_fin'];
            $Phase->save();

            return redirect()->route('Phase.index')->with('success', 'La fase se ha registrado exitosamente');
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
        $Phase       = Phase::find($id);

        $data = [
            'Phase'      =>  $Phase,
        ];
        return view('psp.Phase.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Phase       = Phase::find($id);

        $data = [
            'Phase'      =>  $Phase,
        ];
        return view('psp.Phase.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhaseRequest $request, $id)
    {
        try {
            //Crear 
            $Phase                   = Phase::find($id);
            $Phase->numero           = $request['numero'];
            $Phase->descripcion           = $request['descripcion'];
            $Phase->fecha_inicio      = $request['fecha_inicio'];
            $Phase->fecha_fin      = $request['fecha_fin'];            
            $Phase->save();

            return redirect()->route('Phase.index')->with('success', 'La fase se ha actualizado exitosamente');
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
            $Phase   = Phase::find($id);
            $user         = User::find($Phase->idUser);
            
            //Restricciones

            $Phase->delete();
            $user->delete();

            return redirect()->route('Phase.index')->with('success', 'La fase se ha eliminado exitosamente');
        } catch (Exception $e){
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }  
    }
}
