<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class TopicRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    

    public function rules()
    {
        return [
            'nombre'        => 'regex:/^[\pL\s\-]+$/u|required|max:50',          
        ];
    }
}
