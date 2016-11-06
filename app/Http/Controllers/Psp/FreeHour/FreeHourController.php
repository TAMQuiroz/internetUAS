<?php namespace Intranet\Http\Controllers\Psp\FreeHour;

use Illuminate\Http\Request;
use Auth;
use Intranet\Http\Requests;
use Intranet\Models\FreeHour;
use Intranet\Models\Supervisor;
use Intranet\Models\Student;
use Intranet\Http\Controllers\Controller;
use Intranet\Http\Requests\FreeHourRequest;

class FreeHourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supervisor = Supervisor::where('iduser',Auth::User()->IdUsuario)->get()->first();

        $freeHours = FreeHour::where('idsupervisor',$supervisor->id)->get();

        $data = [
            'freeHours'    =>  $freeHours,
        ];

        return view('psp.freeHour.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Primero hay que analizar si el supervisor puede crear mas disponibilidades
        //El maximo de disponibilidades es A/S, donde A = cantidad de alumnos en psp y S = cantidad de supervisores 
        $a = Student::where('lleva_psp',1)->count();
        $s = Supervisor::count();

        $supervisor = Supervisor::where('iduser',Auth::User()->IdUsuario)->get()->first();
        $cantDisp = FreeHour::where('idsupervisor',$supervisor->id)->count();

        $maximum = $a/$s;

        if($cantDisp < $maximum){
            return view('psp.freeHour.create');    
        }else{
            return redirect()->route('freeHour.index')->with('warning','Ha llegado al maximo de disponibildades para registrar. Maximo: '.$maximum);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FreeHourRequest $request)
    {
        //
        try {
            $freeHour = new FreeHour;
            $freeHour->fecha = $request['fecha'];
            $freeHour->hora_ini = $request['hora_ini'];
            $freeHour->cantidad = 1;
            $supervisor = Supervisor::where('iduser',Auth::User()->IdUsuario)->get()->first();            
            $freeHour->idsupervisor = $supervisor->id;
            $freeHour->save();
            return redirect()->route('freeHour.index')->with('success','La disponibilidad se ha registrado exitosamente');

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
        $freeHour = FreeHour::find($id);

        $data = [
            'freeHour' => $freeHour,
        ];

        return view('psp.freeHour.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $freeHour = FreeHour::find($id);

        $data = [
            'freeHour' => $freeHour,
        ];

        return view('psp.freeHour.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FreeHourRequest $request, $id)
    {
        //
        try {
            $freeHour = FreeHour::find($id);
            $freeHour->fecha = $request['fecha'];
            $freeHour->hora_ini = $request['hora_ini'];
            $freeHour->save();

            return redirect()->route('freeHour.show',$id)->with('success','La disponibilidad se ha actualizado exitosamente');
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
            $freeHour = FreeHour::find($id);
            $freeHour->delete();
            return redirect()->route('freeHour.index')->with('success','La disponibilidad se ha eliminado exitosamente');

        } catch (Exception $e) {
            return redirect()->back()->with('warning','Ocurrio un error al realizar la accion');
        }
    }

}
