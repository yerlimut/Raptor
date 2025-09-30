<?php

namespace App\Models;

use Fidry\CpuCoreCounter\Diagnoser;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    protected $table = 'diagnosticos';
    protected $fillable = [
        'descripcion',
        'fechaDiagnostico',
        'estado',
        'tipo',
        'idMoto',
    ];
    public function motos(){
        return $this->belongsTo(Moto::class,'idMoto');
    }
    public function ordenTrabajo(){
        return $this->hasMany(Diagnostico::class);
    }
}



   
        
