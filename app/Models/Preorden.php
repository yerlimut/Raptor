<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preorden extends Model
{
    use HasFactory;

    protected $table = 'preordenes';

    protected $fillable = [
        'idOrden',
        'idMecanico',
        'saldo',
        'idMoto',
        'descripcion',
    ];

    /**
     * Relación con OrdenTrabajo
     */
    public function ordenTrabajo()
    {
        return $this->belongsTo(OrdenTrabajo::class,'idOrden');
    }
    public function moto()
    {
        return $this->belongsTo(Moto::class, 'idMoto');
    }

    /**
     * Relación con Mecanico
     */
    public function mecanico()
    {
        return $this->belongsTo(Mecanico::class, 'idMecanico');
    }

    /**
     * Relación con Repuesto
     */
    public function repuestos()
{
    return $this->belongsToMany(Repuesto::class, 'preorden_repuesto')
                ->withPivot('cantidad', 'subtotal')
                ->withTimestamps();
}

}
