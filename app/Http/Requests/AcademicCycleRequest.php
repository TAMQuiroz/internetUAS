<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;
use Intranet\Http\Requests\AcademicCycleRequest;


class AcademicCycleRequest extends Request
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
            'anio' => 'required|min:4|max:5',
            'numberC' => 'required|max:2|regex:/^[0-2]/',
        ];
    }
}
