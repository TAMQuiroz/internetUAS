<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class TutstudentRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    

    public function rules()
    {
        return [
            'nombre'        => 'required|max:50',
            'app'        => 'required|max:50',
            'apm'        => 'required|max:50',
            'codigo'        => 'required|digits:8',
            'correo'        => 'required|email',            
        ];
    }
}
