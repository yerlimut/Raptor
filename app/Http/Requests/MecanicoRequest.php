<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MecanicoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'       => 'required|string|min:2|max:50|regex:/^[\pL\s]+$/u',
            'apellido'     => 'required|string|min:2|max:50|regex:/^[\pL\s]+$/u',
            'especialidad' => 'required|string|min:3|max:100',
            'telefono'     => 'required|regex:/^[0-9]{7,15}$/',
            'email'        => 'required|email|max:100',
            'direccion'    => 'required|string|max:255',
            'tipoDocumento'=> 'required|string|max:10',
            'numeroDocumento' => 'required|string|min:5|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required'       => 'El nombre es obligatorio.',
            'nombre.min'            => 'El nombre debe tener al menos 2 caracteres.',
            'nombre.max'            => 'El nombre no puede superar 50 caracteres.',
            'nombre.regex'          => 'El nombre solo puede contener letras y espacios.',

            'apellido.required'     => 'El apellido es obligatorio.',
            'apellido.min'          => 'El apellido debe tener al menos 2 caracteres.',
            'apellido.max'          => 'El apellido no puede superar 50 caracteres.',
            'apellido.regex'        => 'El apellido solo puede contener letras y espacios.',

            'especialidad.required' => 'La especialidad es obligatoria.',
            'especialidad.min'      => 'La especialidad debe tener mínimo 3 caracteres.',
            'especialidad.max'      => 'La especialidad no puede superar 100 caracteres.',

            'telefono.required'     => 'El teléfono es obligatorio.',
            'telefono.regex'        => 'El teléfono debe contener entre 7 y 15 dígitos numéricos.',

            'email.required'        => 'El correo electrónico es obligatorio.',
            'email.email'           => 'El correo electrónico debe ser válido.',
            'email.max'             => 'El correo electrónico no puede superar 100 caracteres.',

            'direccion.required'    => 'La dirección es obligatoria.',
            'direccion.max'         => 'La dirección no puede superar los 255 caracteres.',

            'tipoDocumento.required'=> 'El tipo de documento es obligatorio.',
            'tipoDocumento.max'     => 'El tipo de documento no puede superar los 10 caracteres.',

            'numeroDocumento.required'=> 'El número de documento es obligatorio.',
            'numeroDocumento.min'   => 'El número de documento debe tener al menos 5 caracteres.',
            'numeroDocumento.max'   => 'El número de documento no puede superar los 20 caracteres.',
        ];
    }
}
