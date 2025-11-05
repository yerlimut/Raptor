<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'            => 'required|string|min:2|max:50|regex:/^[\pL\s]+$/u',
            'apellido'          => 'required|string|min:2|max:50|regex:/^[\pL\s]+$/u',
            'tipoDocumento'     => 'required|in:CC,TI,CE,PA',
            'numeroDocumento'   => 'required|digits_between:6,12|unique:clientes,numeroDocumento,',
            'telefono'          => 'required|regex:/^[0-9]{7,15}$/',
            'correoElectronico' => 'required|email:rfc,dns|unique:clientes,correoElectronico,',
            'direccion'         => 'required|string|max:150',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required'        => 'El nombre es obligatorio.',
            'nombre.min'             => 'El nombre debe tener al menos 2 caracteres.',
            'nombre.max'             => 'El nombre no puede superar los 50 caracteres.',
            'nombre.regex'           => 'El nombre solo puede contener letras y espacios.',

            'apellido.required'      => 'El apellido es obligatorio.',
            'apellido.min'           => 'El apellido debe tener al menos 2 caracteres.',
            'apellido.max'           => 'El apellido no puede superar los 50 caracteres.',
            'apellido.regex'         => 'El apellido solo puede contener letras y espacios.',

            'tipoDocumento.required' => 'El tipo de documento es obligatorio.',
            'tipoDocumento.in'       => 'El tipo de documento debe ser CC, TI, CE o PA.',

            'numeroDocumento.required' => 'El número de documento es obligatorio.',
            'numeroDocumento.digits_between' => 'El documento debe tener entre 6 y 12 dígitos.',
            'numeroDocumento.unique' => 'Este documento ya está registrado.',

            'telefono.required'      => 'El teléfono es obligatorio.',
            'telefono.regex'         => 'El teléfono debe tener entre 7 y 15 dígitos.',

            'correoElectronico.required' => 'El correo es obligatorio.',
            'correoElectronico.email'    => 'Debe ingresar un correo válido.',
            'correoElectronico.unique'   => 'Este correo ya está registrado.',


            'direccion.required' => 'la direccion es obligatorio.',
            'direccion.max'          => 'La dirección no puede superar los 150 caracteres.',
        ];
    }
}
