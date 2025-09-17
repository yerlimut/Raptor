<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function cliente() {
        return $this->BelongsTo(Cliente::class,'idCliente');

    }
    public function marcaMoto(){
        return $this->belongsTo(marcaMoto::class, 'idMarca');
    }
        
    }

