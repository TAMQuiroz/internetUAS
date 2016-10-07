<?php

namespace Intranet\Http\Controllers\Tutorship\Reason;

use Intranet\Http\Controllers\Controller;
use Intranet\Models\Reason;
use Illuminate\Http\Request;
use Intranet\Http\Requests;
use Intranet\Http\Requests\ReasonRequest;

class ReasonController extends Controller{
    
    public function index()
    {
         $reasons = Reason::get();
        $data = [
            'reasons'    =>  $reasons,
        ];
        return view('tutorship.reason.index', $data);
    }

    
    public function create()
    {
        return view('tutorship.reason.create');
    }

    
    public function store(ReasonRequest $request)
    {
        try {
            $motivo = new Reason;
            $motivo->tipo       = $request['tipo'];            
            $motivo->nombre       = $request['nombre']; 
            $motivo->save();
            return redirect()->route('motivo.index')->with('success', 'El motivo se ha registrado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    
    public function show($id)
    {
       //
    }

    
    public function edit($id)
    {
        $reason       = Reason::find($id);
        $data = [
            'reason'      =>  $reason,
        ];
        return view('tutorship.reason.edit', $data);
    }

    public function update(ReasonRequest $request, $id)
    {
        try {
            $reason = Reason::find($id);
            $reason->nombre       = $request['nombre'];            
            $reason->tipo       = $request['tipo'];            
            $reason->save();
            return redirect()->route('motivo.index', $id)->with('success', 'El motivo se ha actualizado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    
    public function destroy($id)
    {
        try {
            $reason   = Reason::find($id);
            $message = "";
            // if(count($area->investigators)){
            //     return redirect()->back()->with('warning', 'Esta area esta asignada a investigadores');
            // }
            $reason->delete();
            return redirect()->route('motivo.index')->with('success', 'El motivo se ha eliminado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
