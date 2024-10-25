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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_departure');
            $table->time('time_of_departure');
            $table->date('date_of_arrival');
            $table->time('time_of_arrival');
            $table->string('marketing_carrier');  // Aerolínea
            $table->string('flight_number');  // # de vuelo
            $table->string('departure_city', 3);  // Código IATA ciudad de salida
            $table->string('arrival_city', 3);    // Código IATA ciudad de llegada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
