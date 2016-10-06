<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class ProjectRequest extends Request
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
            'nombre'            =>  'required|max:100',
            'num_entregables'   =>  'required|numeric|min:1',
            'fecha_ini'         =>  'required|date|after:today',
            'fecha_fin'         =>  'required|date|after:fecha_ini',
            'grupo'             =>  'required|numeric',
            'area'              =>  'required|numeric',
            'descripcion'       =>  'required|max:100',
        ];
    }
}
