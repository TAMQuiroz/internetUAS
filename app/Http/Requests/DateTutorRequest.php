<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class DateTutorRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    

    public function rules()
    {
        return [
            'id'        => 'required',
            'dayDate'   => 'date|required',       
            'hourId'    => 'required',
            'topicId'   => 'required',            
        ];
    }
}
