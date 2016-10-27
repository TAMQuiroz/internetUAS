<?php

namespace Intranet\Http\Controllers\Tutorship\Parameter;
use Intranet\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intranet\Http\Requests;
use Intranet\Models\Parameter;
use Illuminate\Support\Facades\Session;
use Intranet\Http\Services\User\PasswordService;

class ParameterController extends Controller
{
    protected $passwordService;

    public function __construct() {        
        $this->passwordService = new PasswordService;
    }

    public function indexDuration()
    {
        $mayorId    = Session::get('faculty-code');
        $parameters = Parameter::where('id_especialidad', $mayorId)->first();

        $data = [
            'duration' => 0
        ];

        if ($parameters) {
            $data = [
                'duration' => $parameters->duracionCita
            ];
        }

        return view('tutorship.settings.index', $data);
    }

    public function updateDuration(Request $request)
    {
        try {
            $mayorId = Session::get('faculty-code');

            $parameters = Parameter::where('id_especialidad', $mayorId)->first();
            if ($parameters) {
                $parameters->duracionCita   = $request['duration'];
                $parameters->save();
            } else {
                $newParameters = new Parameter;
                $newParameters->duracionCita    = $request['duration'];
                $newParameters->id_especialidad = $mayorId;
                $newParameters->save();
            }
            return redirect()->route('parametro.index.duration')->with('success', 'El parámetro se ha actualizado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
