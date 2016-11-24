<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class MeetingRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tiporeunion' => 'required',
            'fecha' => 'required|date|after:'.\Carbon\Carbon::yesterday()->format('d-m-Y'),
            'hora_inicio' => 'required',
            'alumno' => 'required',
            'lugar' => 'regex:/^[A-Za-zá-úä-üÁ-Ú0-9\-.,!¡¿?; ]+$/u|required|max:100',
        ];
    }
    public function messages()
    {
        return [
        ];
    }
}