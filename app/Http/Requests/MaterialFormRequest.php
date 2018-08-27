<?php

namespace ApoloConstructora\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialFormRequest extends FormRequest
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
            'Nombre'=>'required|max:50',
            'Cantidad'=>'required|numeric',
            'ID_Unidad_Medida'=>'required|numeric',
            'Depo_Numero'=>'required|numeric',
            'Tipo'=>'numeric'
        ];
    }
}
