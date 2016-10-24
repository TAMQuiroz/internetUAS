<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class PhaseRequest extends Request
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
            'numero' => 'required|digits:1',
            'descripcion' => 'regex:/^[\pL\s\-]+$/u|required|max:100',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date'   ,         
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
