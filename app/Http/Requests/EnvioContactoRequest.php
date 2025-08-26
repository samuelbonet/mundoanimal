<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnvioContactoRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para la solicitud
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Para obtener las reglas de validación
     *
     * @return array<string, 
     */
    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string'],
            'apellido' => ['required', 'string'],
            'correo' => ['required', 'email'],
            'mensaje' => ['required', 'string'],
        ];
    }


    public function attributes() 
    {
        return [
            'correo' => 'correo electrónico'
        ];
    }


    public function messages() 
    {
        return [
            'correo.email' => 'El campo :attribute tiene formato erróneo.'
        ];
    }
}
