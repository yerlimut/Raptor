<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('preorden_repuesto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('preorden_id');
            $table->unsignedBigInteger('repuesto_id');
            $table->integer('cantidad')->default(1);
            $table->decimal('subtotal', 10, 2)->default(0);
            $table->timestamps();

            $table->foreign('preorden_id')->references('id')->on('preordenes')->onDelete('cascade');
            $table->foreign('repuesto_id')->references('id')->on('repuestos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('preorden_repuesto');
    }
};
