<?php

namespace App\Http\Requests\Proveedor;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'cedula' => 'required|unique:proveedores,cedula|string',
            'ruc' => 'required|unique:proveedores,ruc|string',
            'razonsocial' => 'required|unique:proveedores,razonsocial|string',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'direccion' => 'required|string',
            'telefono' => 'required|numeric',
            'email' => 'required|unique:proveedores,email|email',
        ];
    }

    public function messages()
    {
        return[
            'cedula.required'=>'Este campo es requerido',//Funciones para validar
            'cedula.unique'=>'Este campo ya existe',
            'ruc.required'=>'Este campo es requerido',
            'ruc.unique'=>'Este campo ya existe',
            'razonsocial.required'=>'Este campo es requerido',//Funciones para validar
            'nombre.required'=>'Este campo es requerido',//Funciones para validar
            'apellido.required'=>'Este campo es requerido',//Funciones para validar
            'direccion.required'=>'Este campo es requerido',//Funciones para validar
            'telefono.required'=>'Este campo es requerido',//Funciones para validar
            'email.required'=>'Este campo es requerido',
            'email.unique'=>'Este campo ya existe',
        ];
    }
}
