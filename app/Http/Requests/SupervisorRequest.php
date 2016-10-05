<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class SupervisorRequest extends Request
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
            'codigo' => 'required|digits:8',
            'nombres' => 'regex:/^[\pL\s\-]+$/u|required|max:50',
            'apPaterno' => 'regex:/^[\pL\s\-]+$/u|required|max:50',
            'apMaterno' => 'regex:/^[\pL\s\-]+$/u|required|max:50',
            'direccion' => 'regex:/^[\pL\s\-]+$/u|required|max:50',
            'correo' => 'required|email',
            'telefono' => 'required|digits:9',
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
