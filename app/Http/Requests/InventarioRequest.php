<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Permitir validación siempre, cámbialo si tienes roles
    }

    public function rules(): array
    {
        return [
            'descripcion'      => 'required|string|min:5|max:255|regex:/^[\pL\pN\s\.,-]+$/u',
            'fechaRegistro' => 'required|date|before_or_equal:now',
            'estadoGeneral'    => 'required|in:Bueno,Regular,Malo',
            'estadoInventario' => 'required|in:En taller,Entregado,Pendiente',
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
            'descripcion.regex'    => 'La descripción solo puede contener letras, números, espacios y puntuación básica.',

            // Fecha
            'fechaRegistro.required'        => 'La fecha y hora de registro son obligatorias.',
            'fechaRegistro.date'            => 'Debe ingresar una fecha válida.',
            'fechaRegistro.before_or_equal' => 'La fecha y hora no pueden ser futuras.',

            // Estado General
            'estadoGeneral.required' => 'El estado general es obligatorio.',
            'estadoGeneral.in'       => 'El estado general debe ser: Bueno, Regular o Malo.',

            // Estado Inventario
            'estadoInventario.required' => 'El estado de inventario es obligatorio.',
            'estadoInventario.in'       => 'El estado de inventario debe ser: En taller, Entregado o Pendiente.',

            // Moto
            'idMoto.required' => 'La moto  es obligatoria.',
            'idMoto.exists'   => 'La moto seleccionada no existe en el sistema.',
        ];
    }
}
