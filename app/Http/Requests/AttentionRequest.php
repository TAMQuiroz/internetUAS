<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class AttentionRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    

    public function rules()
    {
        return [
            'alumno'     => 'required',
            'tema'       => 'required',           
        ];
    }
}
