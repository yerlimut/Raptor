<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('preordenes', function (Blueprint $table) {
            $table->id('idPreorden');
            $table->unsignedBigInteger('idOrden');
            $table->unsignedBigInteger('idMecanico');
            $table->unsignedBigInteger('idRepuesto');
            $table->string('descripcion')->nullable();

            $table->foreign('idOrden')->references('id')->on('ordenTrabajos');
            $table->foreign('idMecanico')->references('id')->on('mecanicos');
            $table->foreign('idRepuesto')->references('id')->on('repuestos');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('preordenes');
    }
};
