<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = [
        'nombre',
        'apellido',
        'tipoDocumento',
        'numeroDocumento',
        'telefono',
        'correoElectronico',
        'direccion'

    ];


    public function moto()
    {
        return $this->hasMany(Moto::class, 'idcliente');
    }
}
