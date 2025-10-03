<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreordenRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cambia si implementas roles/permisos
    }

    public function rules(): array
    {
        return [
            'idOrden'    => 'required|exists:ordenTrabajos,id',
            'idMecanico' => 'required|exists:mecanicos,id',
            'idRepuesto' => 'required|exists:repuestos,id',
            'descripcion'=> 'required|string|min:5|max:255|regex:/^[\pL\pN\s\.,-]+$/u',
        ];
    }

    public function messages(): array
    {
        return [
            // Orden
            'idOrden.required' => 'Debe seleccionar una orden de trabajo.',
            'idOrden.exists'   => 'La orden de trabajo seleccionada no existe en el sistema.',

            // Mecánico
            'idMecanico.required' => 'Debe asignar un mecánico.',
            'idMecanico.exists'   => 'El mecánico seleccionado no existe en el sistema.',

            // Repuesto
            'idRepuesto.required' => 'Debe seleccionar un repuesto.',
            'idRepuesto.exists'   => 'El repuesto seleccionado no existe en el sistema.',

            // Descripción
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.string'   => 'La descripción debe ser un texto válido.',
            'descripcion.min'      => 'La descripción debe tener al menos 5 caracteres.',
            'descripcion.max'      => 'La descripción no puede superar los 255 caracteres.',
            'descripcion.regex'    => 'La descripción solo puede contener letras, números, espacios y puntuación básica.',
        ];
    }
}
