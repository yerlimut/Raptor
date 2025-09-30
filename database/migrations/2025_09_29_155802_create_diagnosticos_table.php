<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->id();
            
            $table->string('descripcion');
            $table->date('fechaDiagnostico');
            $table->enum('estado', ['pendiente', 'en proceso', 'completado'])->nullable();
            $table->enum('tipo', ['preventivo', 'correctivo', 'inspeccion'])->nullable();

            $table->unsignedBigInteger('idMoto');
            $table->foreign('idMoto')->references('id')->on('motos');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('diagnosticos');
    }
};
