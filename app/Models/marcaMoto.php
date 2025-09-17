<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class marcaMoto extends Model
{
    protected $table = "marcaMotos";

    protected $fillable=[
        'nombreMarca'
    ];

    public function moto(){
        return $this->hasMany(Moto::class);


    }

}