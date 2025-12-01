<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepuestoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'                 => 'required|string|min:3|max:100|',
            'marca'                  => 'required|string|min:2|max:50|regex:/^[\pL\s0-9\-\.\,]+$/u',
            'precio'                 => 'required|numeric|min:100|max:10000000',
            'stock'                  => 'required|integer|min:0|max:9999',
            'idCategoria'            => 'required|exists:categoriaRepuestos,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del repuesto es obligatorio.',
            'nombre.min'      => 'El nombre debe tener al menos 3 caracteres.',
            'nombre.max'      => 'El nombre no puede superar 100 caracteres.',
            'nombre.regex'    => 'El nombre solo puede contener letras, números y algunos símbolos (- , .).',

            'marca.required'  => 'La marca es obligatoria.',
            'marca.min'       => 'La marca debe tener al menos 2 caracteres.',
            'marca.max'       => 'La marca no puede superar 50 caracteres.',
            'marca.regex'     => 'La marca solo puede contener letras, números y algunos símbolos (- , .).',


            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric'  => 'El precio debe ser un número.',
            'precio.min'      => 'El precio mínimo permitido es 100.',
            'precio.max'      => 'El precio máximo permitido es 10,000,000.',

            'stock.required'  => 'El stock es obligatorio.',
            'stock.integer'   => 'El stock debe ser un número entero.',
            'stock.min'       => 'El stock no puede ser negativo.',
            'stock.max'       => 'El stock máximo permitido es 9999.',

            'idCategoria.required'=> 'Debe seleccionar una categoría.',
            'idCategoria.exists'  => 'La categoría seleccionada no existe.',
        ];
    }
}
