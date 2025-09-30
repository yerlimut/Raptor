<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    protected $table ="repuestos";
    protected $fillable=[
        'nombre',
        'marca',
        'precio',
        'stock',
        'idCategoria'
        
    ];

    public function categoriaRepuesto(){
        return $this->belongsTo(categoriaRepuesto::class,'idCategoria');
    }
    public function preorden (){
        return $this->hasMany(Preorden::class);
    }
}
