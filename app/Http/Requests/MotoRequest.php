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
            'placa'      => 'required|string|regex:/^[A-Z]{3}[0-9]{2}[A-Z]{1}$/|unique:motos,placa',
            'modelo'     => 'required|string|max:50',
            'idMarca'    => 'required|exists:marcaMotos,id',
            'idCliente'  => 'required|exists:clientes,id',
            'año'        => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'placa.required' => 'La placa es obligatoria.',
            'placa.regex'    => 'La placa debe tener el formato válido para motos (ej: ABC12D).',
            'placa.unique'   => 'Esta placa ya está registrada.',

            'modelo.required'=> 'El modelo es obligatorio.',
            'modelo.max'     => 'El modelo no puede superar 50 caracteres.',

            'idMarca.required'=> 'Debe seleccionar una marca.',
            'idMarca.exists'  => 'La marca seleccionada no existe.',

            'idCliente.required'=> 'Debe seleccionar un cliente.',
            'idCliente.exists'  => 'El cliente seleccionado no existe.',

            'año.required' => 'El año es obligatorio.',
            'año.date'     => 'Debe ingresar una fecha válida para el año.',
        ];
    }
}
