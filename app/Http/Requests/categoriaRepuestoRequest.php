<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRepuestoRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para realizar esta solicitud.
     */
    public function authorize(): bool
    {
        return true; // <- Cambiar según tu lógica de autenticación
    }

    /**
     * Reglas de validación.
     */
    public function rules(): array
    {
        return [
            'nombreCategoria' => 'required|string|max:50|unique:categoriaRepuestos,nombreCategoria',
        ];
    }

    /**
     * Mensajes personalizados.
     */
    public function messages(): array
    {
        return [
            'nombreCategoria.required' => 'El nombre de la categoría es obligatorio.',
            'nombreCategoria.string'   => 'El nombre de la categoría debe ser texto.',
            'nombreCategoria.max'      => 'El nombre de la categoría no puede superar los 50 caracteres.',
            'nombreCategoria.unique'   => 'Esta categoría ya existe en el sistema.',
        ];
    }
}
