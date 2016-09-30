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
            'nombre' => 'required|max:50',
            'ubicacion' => 'required|max:100',
            'fecha' => 'required|date',
            'hora' => 'required',
            'duracion' => 'required|numeric',
            'tipo' => 'required|numeric',
            'grupo' => 'required|numeric',
            'imagen' => 'image',
        ];
    }
}
