<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lotes', function (Blueprint $table) {//agregar dependecia con la tabla de datosnaci
            $table->id();
            $table->string('Nombre');
            $table->unsignedBigInteger('id_corral');
            $table->foreign('id_corral')->references('id')->on('corrales')->onDelete('cascade');
            $table->unsignedBigInteger('id_Datos')->nullable();
            $table->foreign('id_Datos')->references('id')->on('nacimientos');
            $table->integer('Cantidad_Porcinos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotes');
    }
};
