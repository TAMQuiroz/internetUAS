<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class InscriptionEditRequest extends Request
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
           'recomendaciones'           =>'required|max:100',
        ];
    }
}
