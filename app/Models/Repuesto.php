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

    public function categoria(){
        return $this->belongsTo(categoriaRepuesto::class,'idCategoria');
    }
    public function preordenes()
{
    return $this->belongsToMany(Preorden::class, 'preorden_repuesto')
                ->withPivot('cantidad', 'subtotal')
                ->withTimestamps();
}

}
