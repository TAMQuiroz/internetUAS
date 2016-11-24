<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class DeleteMeetingRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    

    public function rules()
    {
        return [
            'id'        => 'required',
            'motivo'     => 'required',          
        ];
    }
}
