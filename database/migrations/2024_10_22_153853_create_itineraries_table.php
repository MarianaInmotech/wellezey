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
        Schema::create('itineraries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reserve_id')->constrained()->onDelete('cascade');  // Relación con reserva
            $table->string('departure_city', 3);  // Código IATA ciudad de salida
            $table->string('arrival_city', 3);    // Código IATA ciudad de llegada
            $table->dateTime('departure_time');   // Fecha/hora de salida
            $table->dateTime('arrival_time');     // Fecha/hora de llegada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itineraries');
    }
};
