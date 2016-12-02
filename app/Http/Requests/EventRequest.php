<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class EventRequest extends Request
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
            'nombre' => 'regex:/[a-zA-Z0-9,.!-?áéíóú ]+$/u|required|max:200',
            'ubicacion' => 'regex:/[a-zA-Z0-9,.!-?áéíóú ]+$/u|required|max:100',
            'fecha' => 'required|date|after:today',
            'hora' => 'required',
            'duracion' => 'required|numeric',
            'descripcion' => 'regex:/[a-zA-Z0-9,.!-?áéíóú ]+$/u|required|max:2000',
            'tipo' => 'required|numeric',
            'grupo' => 'required|numeric',
            'imagen' => 'image',
        ];
    }
}
