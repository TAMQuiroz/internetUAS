<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class PspGroupEditRequest extends Request
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
            'descripcion' => 'regex:/^[A-Za-zá-úä-üÁ-Ú0-9\-.,!¡¿?; ]+$/u|required|max:100',
        ];
    }

    public function messages()
    {
        # code...
        return[
        ];
    }
}
