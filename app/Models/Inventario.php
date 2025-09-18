<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table='inventarios';
    protected $fillable=[
        'descripcion',
        'fechaRegistro',
        'estadoGeneral',
        'estadoInventario',
        'idMoto'
        
    ];

    public function motos(){
        return $this->belongsTo(Moto::class,'idMoto');
    }
    
}
