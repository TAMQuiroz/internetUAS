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
            'nombre' => 'regex:/^[\pL\s\-]+$/u|required|max:50',
            'ubicacion' => 'regex:/^[\pL\s\-]+$/u|required|max:50',
            'fecha' => 'required|date|after:today',
            'hora' => 'required',
            'duracion' => 'required|numeric',
            'descripcion' => 'required|max:200',
            'tipo' => 'required|numeric',
            'grupo' => 'required|numeric',
            'imagen' => 'image',
        ];
    }
}
