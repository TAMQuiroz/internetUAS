<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class pspProcessEditRequest extends Request
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
            'Tamaño_Maximo_de_Archivo' => 'required|numeric',
            'Numero_maximo_de_Plantillas' => 'required|numeric',
            'Numero_maximo_de_Fases' => 'required|numeric',
        ];
    }
}
