<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class AreaRequest extends Request
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
            'nombre'        => 'regex:/^[\pL\s\-]+$/u|required|max:50',
            'descripcion'   => 'required|max:100',
        ];
    }
}
