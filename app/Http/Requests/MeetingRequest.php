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
            'fecha' => 'required|date|after:'.\Carbon\Carbon::yesterday(),
            'hora_inicio' => 'required|numeric|min:8|max:21',
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