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
            'placa'      => 'required|string|regex:/^[A-Z]{3}[0-9]{3}$/|unique:motos,placa,' ,
            'modelo'     => 'required|string|max:50',
            'color'      => 'required|string|max:30',
            'marca_id'   => 'required|exists:marcaMotos,id',
            'cliente_id' => 'required|exists:clientes,id',
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

            'marca_id.required'=> 'Debe seleccionar una marca.',
            'marca_id.exists'  => 'La marca seleccionada no existe.',

            'cliente_id.required'=> 'Debe seleccionar un cliente.',
            'cliente_id.exists'  => 'El cliente seleccionado no existe.',
        ];
    }
}
