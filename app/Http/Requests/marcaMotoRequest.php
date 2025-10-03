<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarcaMotoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cambiar si implementas roles
    }

    public function rules(): array
    {
        return [
            'nombreMarca' => 'required|string|min:2|max:50|unique:marcaMotos,nombreMarca|regex:/^[\pL\s\-]+$/u',
        ];
    }

    public function messages(): array
    {
        return [
            // Nombre Marca
            'nombreMarca.required' => 'El nombre de la marca es obligatorio.',
            'nombreMarca.string'   => 'El nombre de la marca debe ser un texto válido.',
            'nombreMarca.min'      => 'El nombre de la marca debe tener al menos 2 caracteres.',
            'nombreMarca.max'      => 'El nombre de la marca no puede superar los 50 caracteres.',
            'nombreMarca.unique'   => 'Ya existe una marca registrada con este nombre.',
            'nombreMarca.regex'    => 'El nombre de la marca solo puede contener letras, espacios y guiones.',
        ];
    }
}
