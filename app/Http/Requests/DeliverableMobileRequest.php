<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

use Intranet\Models\Project;

class DeliverableMobileRequest extends Request
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
        $proyecto = Project::find($this->only('id_proyecto'))->first();
        
        return [
            'fecha_inicio'         =>  'required|date|after:'.$proyecto->fecha_ini.'|before:fecha_fin',
            'fecha_limite'         =>  'required|date|after:fecha_ini|before:'.$proyecto->fecha_fin,
        ];
    }
}
