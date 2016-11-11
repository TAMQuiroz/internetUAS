<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class MeetingEditRequest extends Request
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
            'lugar' => 'regex:/^[A-Za-zá-úä-üÁ-Ú0-9\-.,!¡¿?; ]+$/u|required|max:100',
            'observaciones' => 'regex:/^[A-Za-zá-úä-üÁ-Ú0-9\-.,!¡¿?; ]+$/u|required|max:100',
            'retroalimentacion' => 'regex:/^[A-Za-zá-úä-üÁ-Ú0-9\-.,!¡¿?; ]+$/u|required|max:100',
            'idtipoestado' => 'required',
        ];
    }

    public function messages()
    {
        return [
        ];
    }
}
