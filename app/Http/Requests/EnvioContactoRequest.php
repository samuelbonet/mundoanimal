<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnvioContactoRequest extends FormRequest
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
