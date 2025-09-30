<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mecanico extends Model
{
    protected $table = 'mecanicos';
    protected $fillable = [
        'nombre',
        'apellido',
        'tipoDocumento',
        'numeroDocumento',
        'telefono',
        'email',
        'especialidad',
                             
    ];
    public function preorden (){
        return $this->hasMany(Preorden::class);
    }
}

