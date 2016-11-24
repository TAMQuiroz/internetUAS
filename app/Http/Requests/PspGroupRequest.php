<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class PspGroupRequest extends Request
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
            'numero' => 'required|numeric|min:1|max:9',
            'descripcion' => 'regex:/^[A-Za-zá-úä-üÁ-Ú0-9\-.,!¡¿?; ]+$/u|required|max:100',
            'Proceso_de_Psp' => 'required',
            //
        ];
    }

    public function messages()
    {
        # code...
        return[
        ];
    }
}
