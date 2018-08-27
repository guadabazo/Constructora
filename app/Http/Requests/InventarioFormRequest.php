<?php

namespace ApoloConstructora\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventarioFormRequest extends FormRequest
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
            'CantidadProyecto'=>'required|numeric',
            'CantidadDotacion'=>'required|numeric',
            'CantidadHerramienta'=>'required|numeric',
            'CantidadMaterial'=>'required|numeric',
            'ProducionTotal'=>'required|numeric',
            'Nro_proyecto'=>'required|numeric',
            'Id_dotacion'=>'required|numeric',
            'Codigo_Herramienta'=>'required|numeric',
            'Codigo_Material'=>'required|numeric',
            'Nro_Produccion'=>'required|numeric',
            'Tipo_Produccion'=>'required|numeric'

        ];
    }
}
