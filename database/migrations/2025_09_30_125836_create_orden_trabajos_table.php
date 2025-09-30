<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ordenTrabajos', function (Blueprint $table) {
            $table->id('idOrden');
            
            $table->date('fechaInicio');
            $table->date('fechaFin')->nullable();
            $table->enum('estado', ['pendiente', 'en proceso', 'finalizado', 'cancelado'])
                  ->default('pendiente');

            $table->unsignedBigInteger('idDiagnostico');
            $table->foreign('idDiagnostico')->references('id')->on('diagnosticos');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ordenTrabajos');
    }
};
