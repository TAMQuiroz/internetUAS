<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class TemplateRequest extends Request
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
            'fase'        => 'required',
            'titulo'   => 'regex:/^[\pL\s\-]+$/u|required|max:100',
            'obligatorio'    => 'bool',
            'ruta'   => 'file',
        ];
    }
    public function messages()
    {
        return [
        ];
    }
}
