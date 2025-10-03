<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdenTrabajoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'descripcion' => 'required|string|min:5|max:255',
            'fecha'       => 'required|date|after_or_equal:today',
            'estado'      => 'required|string|in:pendiente,en_progreso,finalizado',
            'mecanico_id' => 'required|exists:mecanicos,id',
            'moto_id'     => 'required|exists:motos,id',
        ];
    }

    public function messages(): array
    {
        return [
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.min'      => 'La descripción debe tener al menos 5 caracteres.',
            'descripcion.max'      => 'La descripción no puede superar 255 caracteres.',

            'fecha.required'       => 'La fecha es obligatoria.',
            'fecha.date'           => 'Debe ingresar una fecha válida.',
            'fecha.after_or_equal' => 'La fecha no puede ser anterior al día de hoy.',

            'estado.required'      => 'El estado es obligatorio.',
            'estado.in'            => 'El estado debe ser: pendiente, en_progreso o finalizado.',

            'mecanico_id.required' => 'Debe seleccionar un mecánico.',
            'mecanico_id.exists'   => 'El mecánico seleccionado no existe.',

            'moto_id.required'     => 'Debe seleccionar una moto.',
            'moto_id.exists'       => 'La moto seleccionada no existe.',
        ];
    }
}
