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
        Schema::create('corrales', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('granjas_id');
            $table->foreign('granjas_id')->references('id')->on('granjas')->onDelete('cascade');
            $table->string('disponibilidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corrales');
    }
};
