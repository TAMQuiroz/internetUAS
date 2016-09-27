<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class InvestigatorRequest extends Request
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
            'apellido_paterno' => 'regex:/^[\pL\s\-]+$/u|required|max:50',
            'apellido_materno' => 'regex:/^[\pL\s\-]+$/u|required|max:50',
            'correo' => 'required|email',
            'celular' => 'required|digits:9',
            'especialidad' => 'numeric|required',
            'area' => 'numeric|required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
        ];
    }
}
