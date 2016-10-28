<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class FreeHourRequest extends Request
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
            'hora_ini' => 'required|numeric|min:8|max:21',
        ];
    }
}
