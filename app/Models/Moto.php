<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moto extends Model
{
    protected $table = 'motos';

    protected $fillable = [
        'modelo',
        'año',
        'placa',
        'idCliente',
        'idMarca'
    ];

    // 🔹 Relación con Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }

    // 🔹 Relación con Marca
    public function marca()
    {
        return $this->belongsTo(MarcaMoto::class, 'idMarca');
    }

    // 🔹 Relación con Inventario (una moto puede tener varios inventarios)
    public function inventario()
    {
        return $this->hasMany(Inventario::class, 'idMoto');
    }

    // 🔹 Relación con Diagnóstico (una moto puede tener varios diagnósticos)
    public function diagnostico()
    {
        return $this->hasMany(Diagnostico::class, 'idMoto');
    }

    public function ordenesTrabajo()
{
    return $this->hasMany(OrdenTrabajo::class, 'idMoto');

}
public function preordenes()
{
    return $this->hasMany(Preorden::class, 'idMoto');
}

}
