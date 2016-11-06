<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class ProjectMobileRequest extends Request
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
            'num_entregables'   =>  'required|numeric|min:1',
            'fecha_ini'         =>  'required|date|after:today',
            'fecha_fin'         =>  'required|date|after:fecha_ini',
        ];
    }
}
