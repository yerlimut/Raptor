<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MotoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'placa'      => 'required|string|regex:/^[A-Z]{3}[0-9]{3}$/|',
            'modelo'     => 'required|string|max:50',
            'color'      => 'required|string|max:30',
            'idMarca'   => 'required|exists:marcaMotos,id',
            'idCliente' => 'required|exists:clientes,id',
            'año'        => 'required|',
        ];
    }

    public function messages(): array
    {
        return [
            'placa.required' => 'La placa es obligatoria.',
            'placa.regex'    => 'La placa debe tener el formato válido (ej: ABC123).',
            'placa.unique'   => 'Esta placa ya está registrada.',

            'modelo.required'=> 'El modelo es obligatorio.',
            'modelo.max'     => 'El modelo no puede superar 50 caracteres.',

            'color.required' => 'El color es obligatorio.',
            'color.max'      => 'El color no puede superar 30 caracteres.',

            'idMarca.required'=> 'Debe seleccionar una marca.',
            'idMarca.exists'  => 'La marca seleccionada no existe.',

            'idCliente.required'=> 'Debe seleccionar un cliente.',
            'idCliente.exists'  => 'El cliente seleccionado no existe.',

            'año.required' => 'El año es obligatorio.',
            'año.date_format' => 'El año debe tener el formato correcto (ej: 2023).',
        ];
    }
}
