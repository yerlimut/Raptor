<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->dateTime('fechaRegistro');
            $table->enum('estadoGeneral',['Bueno', 'Regular', 'Malo']);
            $table->enum('estadoInventario',['En taller', 'Entregado', 'Pendiente'])->default('En taller');
            $table->unsignedBigInteger('idMoto');
            $table->foreign('idMoto')->references('id')->on('motos');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
