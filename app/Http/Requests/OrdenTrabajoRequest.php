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
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date|after_or_equal:fechaInicio',
            'estado' => 'required|string|in:pendiente,en proceso,finalizado,cancelado',
            'idDiagnostico' => 'required|exists:diagnosticos,id',
            'idMoto' => 'required|exists:motos,id',
        ];
    }

    public function messages(): array
    {
        return [
            'fechaInicio.required' => 'La fecha de inicio es obligatoria.',
            'fechaFin.required' => 'La fecha de fin es obligatoria.',
            'fechaFin.after_or_equal' => 'La fecha de fin debe ser igual o posterior a la fecha de inicio.',
            'estado.required' => 'Debe seleccionar un estado.',
            'estado.in' => 'El estado seleccionado no es válido.',
            'idDiagnostico.required' => 'Debe seleccionar un diagnóstico.',
            'idDiagnostico.exists' => 'El diagnóstico seleccionado no existe.',
            'idMoto.required' => 'Debe seleccionar una moto.',
            'idMoto.exists' => 'La moto seleccionada no existe.',
        ];
    }
}
