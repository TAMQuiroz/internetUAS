<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;



class EvaluationRequest extends Request
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
            'nombre'            =>  'required|max:200',
            'descripcion'       =>  'required|max:500',
            'tiempo'            =>  'required|numeric',
            'fecha_inicio'      =>  'required|date|before:fecha_fin|after:today',
            'fecha_fin'         =>  'required|date|after:fecha_inicio',
        ];
    }
}
