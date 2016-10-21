<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

use Intranet\Models\Project;

class DeliverableRequest extends Request
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
        $proyecto = Project::find($this->request->get('id_proyecto'));

        return [
            'nombre'            =>  'regex:/^[\pL\s\-]+$/u|required|max:50',
            'fecha_ini'         =>  'required|date|after:'.$proyecto->fecha_ini.'|before:fecha_fin',
            'fecha_fin'         =>  'required|date|after:fecha_ini|before:'.$proyecto->fecha_fin,
        ];
    }
}
