<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('preordenes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idOrden');
            $table->unsignedBigInteger('idMecanico');
            $table->unsignedBigInteger('idMoto');
            
            $table->string('descripcion')->nullable();
            $table->decimal('saldo',10,2);
        

            $table->foreign('idOrden')->references('id')->on('ordenTrabajos');
            $table->foreign('idMoto')->references('id')->on('motos');
            $table->foreign('idMecanico')->references('id')->on('mecanicos');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('preordenes');
    }
};
