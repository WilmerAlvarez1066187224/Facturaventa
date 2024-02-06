<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
            'direccion' => 'required',
            'cedula' => 'required',

        ];
    } public function messages()
    {
        return [

            'nombre.required'=>'El nombre es requerido',
            'apellido.required'=>'El apellido es requerido',
            'telefono.required'=>'El telefono es requerido',
            'correo.required'=>'El correo es requerido',
            'direccion.required'=>'La direccion es requerida',
            'cedula.required'=>'La cedula es requerida',
            
            
        ];
    }
}
