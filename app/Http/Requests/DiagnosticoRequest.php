<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiagnosticoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'descripcion'      => 'required|string|min:5|max:255|regex:/^[\pL\pN\s\.,-]+$/u',
            'fechaDiagnostico' => 'required|date|before_or_equal:today',
            'estado'           => 'required|in:pendiente,en proceso,completado',
            'tipo'             => 'required|in:preventivo,correctivo,inspeccion',
            'idMoto'           => 'required|exists:motos,id',
        ];
    }

    public function messages(): array
    {
        return [
            // Descripción
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.min'      => 'La descripción debe tener al menos 5 caracteres.',
            'descripcion.max'      => 'La descripción no puede superar los 255 caracteres.',
            'descripcion.regex'    => 'La descripción solo puede contener letras, números, espacios y signos de puntuación básicos.',

            // Fecha
            'fechaDiagnostico.required'        => 'La fecha del diagnóstico es obligatoria.',
            'fechaDiagnostico.date'            => 'Debe ingresar una fecha válida.',
            'fechaDiagnostico.before_or_equal' => 'La fecha del diagnóstico no puede ser futura.',

            // Estado
            'estado.required' => 'El estado es obligatorio.',
            'estado.in'       => 'El estado debe ser: pendiente, en proceso o completado.',

            // Tipo
            'tipo.required' => 'El tipo de diagnóstico es obligatorio.',
            'tipo.in'       => 'El tipo debe ser: preventivo, correctivo o inspeccion.',

            // Moto
            'idMoto.required' => 'Debe seleccionar la moto a diagnosticar.',
            'idMoto.exists'   => 'La moto seleccionada no existe en el sistema.',
        ];
    }
}
