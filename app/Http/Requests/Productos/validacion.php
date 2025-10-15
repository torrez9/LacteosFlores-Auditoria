<?php

namespace App\Http\Requests\Productos;

use Illuminate\Foundation\Http\FormRequest;

class validacion extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'descripcion' => 'required|string',
            'cantidadprod' => 'required|numeric',
            'precioventa' => 'required|numeric',
            'idproveedor' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return[
            'descripcion.required'=>'Este campo es requerido',
            'cantidadprod.required'=>'Este campo es requerido',
            'precioventa.required'=>'Este campo es requerido',//Funciones para validar
            'idproveedor.required'=>'Este campo es requerido',
        ];
    }

}
