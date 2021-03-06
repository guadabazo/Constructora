<?php

namespace ApoloConstructora\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaFormRequest extends FormRequest
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
            'Nombre'=>'required|max:20',
            'Apellido_Paterno'=>'required|max:20',
            'Apellido_Materno'=>'required|max:20',
            'Tipo_P'=>'required|numeric'
        ];
    }
}
