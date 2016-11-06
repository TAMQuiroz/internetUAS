<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class ParameterRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    

    public function rules()
    {
        return [
            'duration'      => 'required',
            'startDate'     => 'required',
            'endDate'       => 'required',
            'numberDays'    => 'numeric|required',          
        ];
    }
}
