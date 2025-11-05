<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrdenTrabajo extends Model
{
    protected $table = 'ordenTrabajos';

    protected $fillable = [
        'fechaInicio',
        'fechaFin',
        'estado',
        'idDiagnostico',
        'idMoto'
    ];

    public function diagnostico()
    {
        return $this->belongsTo(Diagnostico::class, 'idDiagnostico');
    }
    public function preorden()
    {
        return $this->hasMany(Preorden::class);
    }
    public function moto()
{
    return $this->belongsTo(Moto::class, 'idMoto');
}

}
