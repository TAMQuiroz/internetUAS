<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class GroupRequest extends Request
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
            'nombre'        => 'regex:/[a-zA-Z0-9,.!-?áéíóú ]+$/u|required|max:100',
            'descripcion'   => 'regex:/[a-zA-Z0-9,.!-?áéíóú ]+$/u|required|max:500',
            'lider'         => 'required|numeric',
            'imagen'        => 'image',
        ];
    }
}
