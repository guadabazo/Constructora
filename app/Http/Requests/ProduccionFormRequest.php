<?php

namespace ApoloConstructora\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduccionFormRequest extends FormRequest
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
            'Cantidad'=>'required|numeric',
            'Tipo'=>'required|max:20'
        ];
    }
}