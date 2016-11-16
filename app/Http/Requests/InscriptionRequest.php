<?php

namespace Intranet\Http\Requests;

use Intranet\Http\Requests\Request;

class InscriptionRequest extends Request
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
            'activ_formativas'          =>'regex:/^[\pL\s\-]+$/u|required|max:1000',
            'actividad_economica'       =>'regex:/^[\pL\s\-]+$/u|required|max:200', 
            'cond_seguridad_area'       =>'regex:/^[\pL\s\-]+$/u|required|max:200',
            'correo_jefe_directo'       =>'required|email',
            //'debe_modificarse'          =>'required|digits:1', 
            'direccion_empresa'         =>'regex:/^[\pL\s\-]+$/u|required|max:500', 
            'distrito_empresa'          =>'regex:/^[\pL\s\-]+$/u|required|max:200', 
            'equi_del_practicante'      =>'regex:/^[\pL\s\-]+$/u|required|max:200',
            'equipamiento_area'         =>'regex:/^[\pL\s\-]+$/u|required|max:200', 
            'fecha_inicio'              =>'required|date', 
            'fecha_recep_convenio'      =>'required|date',
            'fecha_termino'             =>'required|date', 
            'jefe_directo_aux'          =>'regex:/^[\pL\s\-]+$/u|required|max:200', 
            'nombre_area'               =>'regex:/^[\pL\s\-]+$/u|required|max:200', 
            'personal_area'             =>'regex:/^[\pL\s\-]+$/u|required|max:200', 
            'puesto'                    =>'regex:/^[\pL\s\-]+$/u|required|max:200',
            'razon_social'              =>'regex:/^[\pL\s\-]+$/u|required|max:200', 
            //'recomendaciones'           =>'regex:/^[\pL\s\-]+$/u|required|max:200', 
            'telef_jefe_directo'        =>'required|digits:9', 
            'ubicacion_area'            =>'regex:/^[\pL\s\-]+$/u|required|max:200',
            //'terminos'                  =>'required',
            ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
        ];
    }
}
