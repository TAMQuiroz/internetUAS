<?php

namespace Intranet\Http\Controllers\Tutorship\Parameter;
use Intranet\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intranet\Http\Requests;
use Intranet\Http\Requests\ParameterRequest;
use Intranet\Models\Parameter;
use Illuminate\Support\Facades\Session;
use Intranet\Http\Services\User\PasswordService;
use DateTime;

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

        $today = date('d-m-Y'); 
        $futureDay = date('d-m-Y', strtotime($today . '+185 day'));
        $data = [
            'duration'      => 0,
            'startDate'     => $today,
            'endDate'       => $today,
            'numberDays'    => 1,
        ];

        if ($parameters) {
            $format     = 'd-m-Y'; 
            $duration   = ($parameters->duracionCita) ? 
                            $parameters->duracionCita : 0;
            $startDate  = ($parameters->start_date) ? 
                            date($format, strtotime($parameters->start_date)) : $today;
            $endDate    = ($parameters->end_date) ? 
                            date($format, strtotime($parameters->end_date)) : $today;
            $numberDays = ($parameters->number_days) ? 
                            $parameters->number_days : 1;
            $data       = [
                'duration'      => $duration,
                'startDate'     => $startDate,
                'endDate'       => $endDate,
                'numberDays'    => $numberDays,
                'futureDay'     => $futureDay,
            ];
        }

        return view('tutorship.settings.index', $data);
    }

    public function updateDuration(ParameterRequest $request)
    {
        $format     = 'd-m-Y';
        $startDate  = DateTime::createFromFormat($format, $request['startDate']);
        $endDate    = DateTime::createFromFormat($format, $request['endDate']);

        try {
            $mayorId    = Session::get('faculty-code');
            $parameters = Parameter::where('id_especialidad', $mayorId)->first();
            if ($parameters) {
                $parameters->duracionCita   = $request['duration'];
                $parameters->start_date     = $startDate;
                $parameters->end_date       = $endDate;
                $parameters->number_days    = $request['numberDays'];
                $parameters->save();
            } else {
                $newParameters = new Parameter;
                $newParameters->duracionCita    = $request['duration'];
                $newParameters->start_date      = $startDate;
                $newParameters->end_date        = $endDate;
                $newParameters->number_days     = $request['numberDays'];
                $newParameters->id_especialidad = $mayorId;
                $newParameters->save();
            }
            return redirect()->route('parametro.index.duration')->with('success', 'La duración de la cita se ha actualizado exitosamente');
        } catch (Exception $e) {
            return redirect()->route('parametro.index.duration')->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
